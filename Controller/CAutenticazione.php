<?php

/**
 * CAutenticazione si occupa di
 * manipolare oggetti che concernono l'autenticazione
 * @author Luca & Valentina
 * @package Task
 * @category Autenticazione
 */


class CAutenticazione {

    /**
     * Permette di smistare tra i task relativi all'autenticazione
     * @return type
     */
    public function smista() {
       
        $view = USingleton::getInstaces('VAutenticazione');
        switch ($view->getTask()) {
            
             case 'listautenti':
                return $view->pubblicalista();
                break;

            case 'autorizzazioni':
                return $this->smistaAccessi();
                break;
            case'logintpl':
                return $view->processaTemplate('Login');
                break;
            case 'logout':
                return $this->logout();
                break;
            case 'home':
                return $view->impostapagprincipale();
                break;
            case 'modulorecuperodati':
                return $view->processaTemplate('modulo_di_recupero');
                break;
            case 'recuperodati':
                return $this->inviaDatiRegistrazione();
                break;
            case 'tplhomeadmin':
                return $view->processaTemplate('Ricerca_utenti');
                break;
            
             case 'logged':
                return $this->UtenteLoggedIn();
                break;
        }
    }
    
    
     /**
     * Questa funzione restituisce tutti gli utenti registrati che si trovano nel database tramite opportune chiamate. Se 
     * la tabella utenti è vuota la funzione restituisce false, altrimenti inserisce i risultati in un array associativo.
     * @access public
     * @return boolean|array Gli utenti registrati
     */
     public function listautenti(){
        $f_utenti=USingleton::getInstaces('FUtente');
        $lista=$f_utenti->cerca_nel_db();
        if($lista){
            return $lista;
        }
        else{
        return FALSE;
       
        }
       
    }
    
    
    /**
     * Questa funzione si occupa di riconoscere che tipo di utente si è loggato facendo un controllo sulla sessione. 
     * Restituirà "admin" se si è loggato un amministratore, "user" se si è loggato un utente, e "home" se non esiste ancora una 
     * sessione attiva (cioè se non esiste un PHPSESSID nell'array superglobale $_COOKIE)
     * @access public
     * @return string tipo di utente loggato
     */
    public function UtenteLoggedIn() {
        $u_cookie = USingleton::getInstaces('UCookie');

        $controllo = $u_cookie->check_sessione_attiva();
        if ($controllo == FALSE) {
            $f_ut = USingleton::getInstaces('FUtente');
            $f_ad = USingleton::getInstaces('FAmministratore');
            $u_sess = USingleton::getInstaces('USession');
            $username = $u_sess->getusernamesess();
            if($f_ut->cerca_nel_db($username)==FALSE){
            
                return 'admin';
            }else{
                return 'user';
            }
           

        } elseif ($controllo == TRUE) {
            return 'home';
        }
    }

    /**
     * Funzione che permette di effettuare il logout: elimina tutti i cookie relativi alla sessione.
     * @author Luca & Valentina
     */
    public function logout() {
        $sessione = USingleton::getInstaces('USession');
        $cookie = USingleton::getInstaces('UCookie');
        $sessione->distruggi_sessione();
        $cookie->eliminaCookie('cookieCheck');
        $Home = USingleton::getInstaces('VHome');
        return $Home->impostapagprincipale();
    }

   
    /**
     * La funzione permette di fare il login facendo dei controlli al database (per verificare se un utente è registrato o meno).
     * Se è registrato la funzione distingue che tipo di utente si sta loggando (amministratore o utente) e in base al tipo
     * imposta pagine diverse. Se un utente non è presente o inserisce dati sbagliati, reindirizzerà ad un template
     * d'errore.
     * @access public
     * @return mixed
     */
    
   
    public function smistaAccessi() {

        $view = USingleton::getInstaces('VAutenticazione');
        $Home = USingleton::getInstaces('VHome');
        $username = $view->getUsername();


        //print_r($username);
        $password = $view->getPassword();
        $f_amministratore = USingleton::getInstaces('FAmministratore');
        $f_utente = USingleton::getInstaces('FUtente');
        $ut = $f_utente->cerca_nel_db($username);
       
        $admin = $f_amministratore->cerca_nel_db($username);
        if ($ut != FALSE) {

            if ($username == $ut[0]['username'] && $password == $ut[0]['password']) {

                $session = USingleton::getInstaces('USession');
                $cookie = USingleton::getInstaces('UCookie');
                $cookie->setCookie('sess', 'act');
                $session->imposta_valore('username', $username);
               
                if ($ut[0]['stato'] == 'attivo') {
                    return $Home->impostapaginautente();
                } else {
                    return $Home->impostapaginaprimoaccesso();
                }
            } else {
                return $Home->impostapaginaerrore();
            }
            if ($username == $ut[0]['username'] && $password != $ut[0]['password']) {
                return $Home->impostapaginaerrore();
            }
            if ($username != $ut[0]['username'] && $password != $ut[0]['password']) {
                return $Home->impostapaginaerrore();
            }
        } elseif ($admin != FALSE) {
            for ($i = 0; $i < count($admin); $i++) {
                if ($username == $admin[$i]['username'] && $password == $admin[$i]['password']) {
                    $session = USingleton::getInstaces('USession');
                    $session->imposta_valore('username', $username);
                    //$session->startsessione();
                    $cookie = USingleton::getInstaces('UCookie');
                    $cookie->setCookie();
                    return $Home->impostapaginaadmin();
                }
            }
        } else {
            return $Home->impostapaginaerrore();
        }
        for ($i = 0; $i < count($admin); $i++) {
            if ($username == $admin[$i]['username'] && $password != $admin[$i]['password']) {
                return $Home->impostapaginaerrore();
            }
            if ($username != $admin[$i]['username'] && $password != $admin[$i]['password']) {
                return $Home->impostapaginaerrore();
            }
        }
    }

    
    
    /**
     * Questa funzione permette il recupero dei dati di registrazione. Il recupero dei dati di registrazione da parte di un utente
     * prevede che si debba recuperare o l'username o la password, NON entrambi. In ogni caso bisogna inserire la propria mail
     * di registrazione. Ad esempio se si deve recuperare la password, bisogna inserire la mail e l'username. Se invece si vuol
     * recuperare l'username, si deve inserire l'email e la password.
     * @access public
     */
    public function inviaDatiRegistrazione() {
        //BISOGNA PRIMA IMPLEMENTARE PHPMAILER
        $view = USingleton::getInstaces('VAutenticazione');
        $username = $view->getUsername();
        $password = $view->getPassword();
        $email = $view->getEmail();
                        $mail = USingleton::getInstaces('UMail');

        if ($username != NULL && $password == NULL) {//CIOE SI STA RECUPERANDO LA PASSWORD
            $password_recuperata = $this->estraiPassword($username, $email);
            if (!$password_recuperata) {
                echo 'Utente non trovato!';
            } else {
                if (!$mail->mailinvio($email, 'Recupero Credenziali', "\n La tua password e': " . $password_recuperata . "\n Lo staff di Cinema On Line")) {
                    echo "Si è verificato un problema con l'email! Riprova più tardi!";
                } else {
                    echo "Ti abbiamo inviato un'email con le tue credenziali!";
                }
            }
        } elseif ($password != NULL && $username == NULL) {//CIOE SI STA RECUPERANDO L'USERNAME
            $username_recuperato = $this->estraiUsername($password, $email);
            if (!$username_recuperato) {
                echo 'Utente non trovato!';
            } else {
                if (!$mail->sendmess($email, 'Recupero Credenziali', "\n Il tuo username e': " . $username_recuperato . "\n Lo staff di Cinema On Line")) {
                    echo "Si è verificato un problema con l'email! Riprova più tardi!";
                } else {
                    echo "Ti abbiamo inviato un'email con le tue credenziali!";
                }
            }
        }
    }

    
    /**
     * Questa funzione si occupa di verificare la presenza nel database di un determinato username e, in caso positivo, lo restituisce
     * Se esso non è presente la funzione restituisce FALSE. In ingresso prende l'email e la password dell'utente in modo da poter
     * restituire uno, ed un solo, risultato.
     * @access public
     * @param String $password la password dell'utente
     * @param String $email l'email dell'utente
     * @return boolean|String l'Username dell'utente
     */
    
    public function estraiUsername($password, $email) {
        $f_utente = USingleton::getInstaces('FUtente');
        $f_amministratore = USingleton::getInstaces('FAmministratore');
        $parametri = array(array(0 => 'password', 1 => '=', 2 => $password), array(0 => 'email', 1 => '=', 2 => $email));
        $username_user = $f_utente->cerca_nel_db(NULL, $parametri);
        $username_admin = $f_amministratore->cerca_nel_db(NULL, $parametri);
        if ($username_admin == NULL && $username_user == NULL) {
            return FALSE;
        } elseif ($username_admin != NULL && $username_user == NULL) {
            return $username_admin[0]['username'];
        } elseif ($username_admin == NULL && $username_user != NULL) {
            return $username_user[0]['username'];
            
        }
    }

    
      /**
     * Questa funzione si occupa di verificare la presenza, nel database, di un username. In caso positivo, cioè che esiste ed è presente
     * nel database, essa restituirà la password associata a quell'utente. In caso contrario restituirà FALSE.
     * @access public
     * @param String $username l'username dell'utente
     * @param String $email l'email dell' utente
     * @return boolean|String la password dell'utente
     */
    public function estraiPassword($username, $email) {
        $f_utente = USingleton::getInstaces('FUtente');
        $f_amministratore = USingleton::getInstaces('FAmministratore');
        $user_pass = $f_utente->cerca_nel_db($username);

        $user_mail = $user_pass[0]['email'];

        $admin_pass = $f_amministratore->cerca_nel_db($username);
        $admin_mail = $admin_pass[0]['email'];
        if ($user_pass == NULL && $admin_pass == NULL) {
            return FALSE;
        } elseif ($user_pass != NULL && $admin_pass == NULL) {
            if ($user_mail == $email) {
                return $user_pass[0]['password'];
            } else {
                return FALSE;
            }
        } elseif ($admin_pass != NULL && $user_pass == NULL) {
            if ($admin_mail == $email) {
                return $admin_pass[0]['password'];
            } else {
                return FALSE;
            }
        }
    }

    /**
     * Recupera l'username dell'utente loggato.
     * @access public
     * @return String l'username dell'utente in sessione
     */
    public function ciaoutente() {
        $u_sess=  USingleton::getInstaces('USession');
        return $u_sess->leggi_valore('username');
    }
    
    
}
