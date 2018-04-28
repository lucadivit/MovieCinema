<?php

/**
 * In particolare CRegistrazione si occupa di
 * manipolare oggetti che concernono la registrazione dell'utente
 * @author Luca & Valentina
 * @package Controller
 * @category Registrazione
 */
class CRegistrazione {

    /**
     * @access private
     */
    private $username;
    private $password;
    private $email;
    private $errore;

  
    /**
     * Smista le attività in base al task ricevuto
     * @author Luca & Valentina
     * @access public
     * @return type
     */
    public function smista() {
        $view = USingleton::getInstaces('VRegistrazione');
        switch ($view->getTask()) {
            case 'registrazionetpl':
                return $view->processaTemplate('Registrazione_utente');
                break;

            case 'registracarta':
                return $this->creaCarta();
                break;

            case 'registrautente':
                return $this->creaUtente();
                break;

            
            case 'registracommento':
                return $this->creaCommento();
                break;

            case'filmtpl':
                return $view->processaTemplate('Registrazione_Film');
                break;
            case 'modificaadmin':
                return $this->modificaAdmin();
                break;

            case 'modificautente':
                return $this->modificaUtente();
                break;

            case 'modificarta':
                return $this->modificaCarta();
                break;
                
            case 'modificafilmtpl':
                return $view->visualizzadatifilm();
                break;
            case 'modificafilm':
                return $this->modificafilm();
                break;    
                
            case 'aggiungiadmin':
                return $view->processaTemplate('Aggiungi_admin');
                break;   
                
            case 'creaadmin':
                return $this->creadmin();
                break;
            case 'recuperadatiadmin':
                return $view->visualizzadatiadmin();
                break;

            case 'modificautentetpl':
                return $view->visualizzadatiutente();
                break;

            case 'modificautenteok':
                return $this->modificautente();
                break;

            case 'modificacartatpl':
                return $view->visualizzadaticarta();
                break;

            case 'modificacartaok':
                return $this->modificacarta();
                break;

            case 'creafilm':
                return $this->CreaFilm();
                break;

           
            case 'cambiapassword':
           
                return $this->primoaccesso();
                break;
            case 'saltaproceduracarta':
                return $view->impostapaginasaltacarta();
                break;
            case 'tariffetpl':
                return $view->processaTemplate('Inserisci_tariffe');
                break;
            case 'registratariffe':
                return $this->registratariffe();
                break;
            case 'maxposti':
                return $this->maxposti();
                break;
            
        }
    }

    /**
     * Funzione che permette all'amministratore principale di aggiungere ulteriori amministratori.
     * @return boolean|string
     */
 public function creadmin(){
      $view = USingleton::getInstaces('VRegistrazione');
      $mail=  USingleton::getInstaces('UMail');
      $datiadmin = $view->getDatiAdminValidi();
      if($datiadmin){
          $f_ad=  USingleton::getInstaces('FAmministratore');
          unset($datiadmin['password_1']);
          $f_ad->carica_riga($datiadmin);
          $mail->sendmess($datiadmin['email'], 'Attivazione Account', 'Ciao '.$datiadmin['username']."\n Sei stato aggiunto come amministratore! \n Le tue credenziali sono le seguenti:\n username: ".$datiadmin['username']."\n password:".$datiadmin['password']." \n Puoi cambiare le tue credenziali dopo aver effettuato l'accesso.");
          return "amministratore inserito correttamente";
      }
      else{
          return FALSE;
      }

 }
 
  /**
     * Questa funzione preleva tutti i dati di un determinato film in base al suo codice
     * @access public
     * @return array dati del film
     */
 public function recuperadatifilm() {
        $v_gest=  USingleton::getInstaces('VGestione');
        $f_film=  USingleton::getInstaces('FFilm');
        $codice=$v_gest->getCodice();
        $film=$f_film->cerca_nel_db($codice);
        return $film;
    }
    


/**
     * Stampa i posti disponibili per un determinato film
     * @access public i posti disponibili per un film
     */
     public function maxposti() {
        $f_sala=  USingleton::getInstaces('FSala');
        $f_film=  USingleton::getInstaces('FFilm');
        $v_gest=  USingleton::getInstaces('VGestione');
        $titolo=$v_gest->getTitoloFilm();
        $parametri=array(array(0=>'titolo_film', 1=>'=', 2=>$titolo));
        $film=$f_film->cerca_nel_db(NULL, $parametri);
        $id_film=$f_film[0]['codice_film'];
        $sala=$f_sala->cerca_nel_db($id_film);
        
    }
    
    /**
     * Questa funzione permette all'amministratore di impostare le tariffe dei biglietti. 
     * @return string|boolean 
     */
    public function registratariffe() {
        $v_reg=  USingleton::getInstaces('VRegistrazione');
        $f_tar=  USingleton::getInstaces('FTariffe');
        $tariffe=$v_reg-> getTariffe();
        $cerca=$f_tar->cerca_nel_db('0');
        
        if(!$cerca){
            $f_tar->carica_riga($tariffe);
        }else{
        $inserimento=array('prezzo_adulto', 'prezzo_ridotto');
        $inserimento['prezzo_adulto']=$f_tar->modifica('prezzo_adulto', $tariffe['prezzo_adulto'], 'id_tariffa', '0');
        $inserimento['prezzo_ridotto']=$f_tar->modifica('prezzo_ridotto', $tariffe['prezzo_ridotto'], 'id_tariffa', '0');
        
        return 'modifica effettuata!';
        }
    }
    
    
    
     /**
     * Funzione che impedisce l'esistenza di due username uguali dato che l'username è chiave primaria 
      * sia della tabella utente, sia della tabella amministratore.
     * 
     * @access public
     * @param String $username l'username dell'utente
     * @return boolean TRUE se l-username esiste , FALSE altrimenti.
     */
  public function controllouseresistente($username) {
      $f_utente=  USingleton::getInstaces('FUtente');
      $f_amministratore=  USingleton::getInstaces('FAmministratore');
      $us_ad=$f_amministratore->cerca_nel_db($username);
      $us_ut=$f_utente->cerca_nel_db($username);
      //echo 'utente';      print_r($us_ut);
     // echo 'admin';      print_r($us_ad);
      if($us_ad!=NULL || $us_ut!=NULL){
          return TRUE;
      }else{
          return FALSE;
      }
  }
        
  
   /**
    * La funzione impedisce che si possa utilizzare uno stesso indirizzo e-mail per più account
     * @access public
     * @param String $email mail dell-utente
     * @return boolean TRUE se la mail esiste FALSE altrimenti
     */
     public function controllamailesistente($email) {
      $f_utente=  USingleton::getInstaces('FUtente');
      $f_amministratore=  USingleton::getInstaces('FAmministratore');
      $us_ad=$f_amministratore->cerca_nel_db(NULL,array(0 => array(0 => "email", 1 => '=', 2 => $email)));
      $us_ut=$f_utente->cerca_nel_db(NULL,array(0 => array(0 => "email", 1 => '=', 2 => $email)));
      if($us_ad!=NULL || $us_ut!=NULL){
          return TRUE;
      }else{
          return FALSE;
      }
  }

  
    /**
     * Questa funzione permette l'inserimento dei commenti.
     * Oltre al commento si inserirà anche un voto da 1 a 5.
     * @access public
     * @return mixed teplate relativo ad un film
     */
    public function creaCommento() {

        $view = USingleton::getInstaces('VRegistrazione');
        $v_gest = USingleton::getInstaces('VGestione');
        $dati_commento = $view->getDatiCommenti();
        $f_comm = USingleton::getInstaces('FCommento');
        $f_comm->carica_riga($dati_commento);


        return $v_gest->mostraFilm();
    }

    
    /**
     * Questa funzione genera un codice casuale che sarà inviato per email ad un utente registrato e sarà utilizzato
     * come password per il primo accesso.
     * @access public
     * @return string codice casuale per il primo accesso
     */
    public function codiceregistrazione() {
        $stringa = '1234567890ABCDEFGHILMNOPQRSTUVZabcdefghilmnopqrstuvz!@&%';
        $dimstringa = strlen($stringa); //dimensione della stringa
        $codicecasuale = '';
        for ($i = 0; $i < 20; $i++) { //ho messo varchar(20) sul db
            $codicecasuale .= $stringa[mt_rand(0, $dimstringa - 1)];
        }
        return $codicecasuale;
    }

    
        /**
     * Questa funzione permette ad un utente di passare dallo stato "non attivo" allo stato "attivo"
     *  e di effettuare il suo primo accesso (attraverso l'inserimento
     * di un codice calcolato in maniera casuale e spedito per email). successivamente al primo accesso
     * l'utente sarà obbligato a modificare la password.
     * @access public
     * @return mixed template della home dell'utente in caso di successo template d'errore in caso di fallimento
     */
    public function primoaccesso() {
        $f_utente = USingleton::getInstaces('FUtente');
        $sess = USingleton::getInstaces('USession');
        $v_reg = USingleton::getInstaces('VRegistrazione');
        $Home = USingleton::getInstaces('VHome');
        $checkpassword = $v_reg->getpasswordvalida(); //true o false
        if (!$checkpassword) {
            $password = $v_reg->getnuovapassword();
            $username = $sess->getusernamesess();
            $utente = $f_utente->cerca_nel_db($username);
            $modifica = $f_utente->modifica('password', $password, 'username', $username);
            if ($modifica) {
                $f_utente->modifica('stato', 'attivo', 'username', $username);
                $mail = USingleton::getInstaces('UMail');
                if (!$mail->sendmess($utente[0]['email'], 'Attivazione Account', 'Benvenuto ' . $username . "!\n La registrazione è avvenuta con successo! \n Lo staff di Cinema On Line")) {
                    echo 'errore';
                } else {

                    return $Home->impostapaginautente();
                }
            }
        }else{
            $v_reg->cambiopassworderrore();
        }
       
    }

    /**
     * Inserisce l'utente sul database con lo stato "non attivo". Successivamente alla registrazione sarà inviata un'email con 
     * la password utile solo per il primo accesso
     * @author Luca & Valentina
     */
    public function creaUtente() {
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_registrazione_utente = $view->getDatiRegistrazioneUtenteValidi();
        if($dati_registrazione_utente){

        $provacodice = $this->codiceregistrazione();
        //print_r($dati_registrazione_utente);
        $dati_registrazione_utente['password'] = $provacodice;
        $mail = USingleton::getInstaces('UMail');
        if (!$mail->sendmess($dati_registrazione_utente['email'], 'Attivazione Account', 'Ciao '.$dati_registrazione_utente['username']."\n La password per il primo accesso e' la seguente: ".$provacodice."\n Lo staff di Cinema On Line")) {
            echo 'errore! Riprova più tardi';
        } else {
            echo '';
        }
        //$utente = new EUtente();
        $f_utente = USingleton::getInstaces('FUtente');
        $f_amministratore = USingleton::getInstaces('FAmministratore');
        $reg_utente = FALSE;
        $result = $f_utente->cerca_nel_db($dati_registrazione_utente['username']);
        $result_2 = $f_amministratore->cerca_nel_db($dati_registrazione_utente['username']);
        if (!$result && !$result_2) {//Se non ci sono risultati vuol dire che non ci sono utenti con l username inserito quindi si puo caricare
           
                $f_utente->carica_riga($dati_registrazione_utente); //Inserisce l'utente nel DB di DEFAULT non attivo
                //$tplcarta = $view->processaTemplate('Registrazione_carta');



                $tplcarta = $view->getprov();
                //$reg_carta = $this->creaCarta();
                $reg_utente = TRUE;
                //$utente->genera_Codice_Attivazione();
                //Funzione per inviare la mail di attivazione
                return $tplcarta;
        }
        }
    }

    /**
     * Inserisce una nuova carta di credito, relativa ad un utente, nel database. Ovviamente la registrazione della carta
     * non va a buon fine se esiste già la carta inserita nel database. Se un utente non registra la carta non si possono
     * effettuare acquisti nel sito.
     * @return boolean|mixed
     */
    public function creaCarta() {
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_registrazione_carta = $view->getDatiRegistrazioneCartaValidi('nolog');
        $f_carta = USingleton::getInstaces('FCartaDiCredito');
        $result = $f_carta->cerca_nel_db($dati_registrazione_carta['numero_carta']);
      
        if (!$result && $dati_registrazione_carta) {
            $f_carta->carica_riga($dati_registrazione_carta);
            $ok=$view->impostapaginaregcartaavvenuta();
            
            return $ok;
            
        } else{
            return FALSE;
        }
        
    }



    public function modificaAdmin() {
        $v_reg = USingleton::getInstaces('VRegistrazione');
        $f_admin = USingleton::getInstaces('FAmministratore');
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');
        $f_admin->elimina_riga($username);
        $dati_nuovi_admin = $v_reg->getdatiadmin();
        $f_admin->carica_riga($dati_nuovi_admin);
        echo 'modifica effettuata!';
        return $v_reg->visualizzadatiadmin();
    }

    public function modificautente() {

        $f_ut = USingleton::getInstaces('FUtente');
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_cambiati = $view->getDatiModificaUtenteValidi();
        if($dati_cambiati){
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');
        $modifica = array('password', 'nome', 'cognome', 'citta', 'provincia', 'CAP', 'email', 'sesso', 'data_nascita');
        $modifica['password'] = $f_ut->modifica('password', $dati_cambiati['password'], 'username', $username);
        $modifica['nome'] = $f_ut->modifica('nome', $dati_cambiati['nome'], 'username', $username);
        $modifica['cognome'] = $f_ut->modifica('cognome', $dati_cambiati['cognome'], 'username', $username);
        $modifica['citta'] = $f_ut->modifica('citta', $dati_cambiati['citta'], 'username', $username);
        $modifica['provincia'] = $f_ut->modifica('provincia', $dati_cambiati['provincia'], 'username', $username);
        $modifica['CAP'] = $f_ut->modifica('CAP', $dati_cambiati['CAP'], 'username', $username);
        $modifica['email'] = $f_ut->modifica('email', $dati_cambiati['email'], 'username', $username);
        $modifica['sesso'] = $f_ut->modifica('sesso', $dati_cambiati['sesso'], 'username', $username);
        $modifica['data_nascia'] = $f_ut->modifica('data_nascita', $dati_cambiati['data_nascita'], 'username', $username);
        echo 'modifica effettuata!';
        return $view->visualizzadatiutente();
        }

        return $modifica;
    }

    public function modificacarta() {

        $f_ut = USingleton::getInstaces('FCartaDiCredito');
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_cambiati = $view->getDatiRegistrazioneCartaValidi('logmod');
        if($dati_cambiati){
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');

        if($f_ut->modifica('numero_carta', $dati_cambiati['numero_carta'], 'username', $username) &&
        $f_ut->modifica('data_scadenza', $dati_cambiati['data_scadenza'], 'username', $username) &&
        $f_ut->modifica('credit_validation_value', $dati_cambiati['credit_validation_value'], 'username', $username)){
         echo 'Dati modificati!';   
        }
        
        return $view->visualizzadaticarta();
        }else{
            return FALSE;
        }
    }

    //NEW
    public function mostradatiadmin() {

        $f_admin = USingleton::getInstaces('FAmministratore');
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');
        $var = $f_admin->cerca_nel_db($username);
        return $var;
    }

    public function mostradatiutente() {

        $f_utente = USingleton::getInstaces('FUtente');
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');
        $var = $f_utente->cerca_nel_db($username);
        
        return $var;
    }

    public function mostradaticarta() {

        $f_carta = USingleton::getInstaces('FCartaDiCredito');
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->leggi_valore('username');
        $parametri = array(array(0 => 'username', 1 => '=', 2 => $username));
        $var = $f_carta->cerca_nel_db(NULL, $parametri);
        
        return $var;
    }
    
    
    
       public function modificafilm(){
        
    /* $f_film = USingleton::getInstaces('FFilm');
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_registrazione_film = $view->getDatiRegistrazioneFi();
        $f_film->elimina_riga($dati_registrazione_film['codice_film']);
        return $this->CreaFilm();
     * 
     */
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_registrazione_film = $view->getDatiRegistrazioneFi();
        $f_film = USingleton::getInstaces('FFilm');
        $film=$f_film->cerca_nel_db($dati_registrazione_film['codice_film']);
        
        if (!empty($_FILES["file"])) {
            
            $modifica = array('titolo', 'autore', 'durata', 'genere', 'codice_film', 'trama', 'locandina');

        $modifica['titolo'] = $f_film->modifica('titolo', $dati_registrazione_film['titolo'], 'codice_film', $film[0]['codice_film']);
        $modifica['autore'] = $f_film->modifica('autore', $dati_registrazione_film['autore'], 'codice_film', $film[0]['codice_film']);
        $modifica['durata'] = $f_film->modifica('durata', $dati_registrazione_film['durata'], 'codice_film', $film[0]['codice_film']);
        $modifica['genere'] = $f_film->modifica('genere', $dati_registrazione_film['genere'], 'codice_film', $film[0]['codice_film']);
        $modifica['trama'] = $f_film->modifica('trama', $dati_registrazione_film['trama'], 'codice_film', $film[0]['codice_film']);
        $dati_registrazione_film['locandina'] = $_FILES['file']['name'];
        $modifica['locandina'] = $f_film->modifica('locandina', $dati_registrazione_film['locandina'], 'codice_film', $film[0]['codice_film']);

            //$dati_registrazione_film['locandina'] = $_FILES['file']['name'];
            //$f_film->carica_riga($dati_registrazione_film);
            if ($_FILES["file"]["error"] == 0) {
                $estensione = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

                if ($estensione == "png" || $estensione == "jpg" || $estensione == "gif" || $estensione == "JPG" || $estensione == "PNG" || $estensione == "GIF") {
                    if ($_FILES["file"]["size"] < 1000000) {

                        // $risultato = move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . CRegistrazione::getcont(). "." . $estensione);
                        $risultato = move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . $_FILES["file"]["name"]);
                        if ($risultato) {

                            echo "File spostato con successo!";
                        } else {
                            die("Errore imprevisto durante lo spostamento dell'immagine! :(");
                        }
                    } else {
                        die("Il file selezionato è troppo grande, non deve superare 1MB!");
                    }
                } else {
                    die("Estensione non consentita! Hai cercato di caricare un file ." . $estensione . "!");
                }
            } else {
                die("Errore imprevisto durante il caricamento dell'immagine!");
            }
          
        } elseif(empty($_FILES["file"])) { 
           
           // $modifica = array('titolo', 'autore', 'durata', 'genere', 'codice_film', 'trama');
        $f_film->modifica('titolo', $dati_registrazione_film['titolo'], 'codice_film', $film[0]['codice_film']);
        $f_film->modifica('autore', $dati_registrazione_film['autore'], 'codice_film', $film[0]['codice_film']);
        $f_film->modifica('durata', $dati_registrazione_film['durata'], 'codice_film', $film[0]['codice_film']);
        $f_film->modifica('genere', $dati_registrazione_film['genere'], 'codice_film', $film[0]['codice_film']);
        $f_film->modifica('trama', $dati_registrazione_film['trama'], 'codice_film', $film[0]['codice_film']);
      

        }
        
         echo 'modifica effettuata!';
    return $view->visualizzadatifilm();
    
         // return $modifica;
       /* $modifica = array('titolo', 'autore', 'durata', 'genere', 'codice_film', 'trama');

        $modifica['titolo'] = $f_film->modifica('titolo', $dati_registrazione_film['titolo'], 'codice_film', $film);
        $modifica['autore'] = $f_film->modifica('autore', $dati_registrazione_film['autore'], 'codice_film', $film);
        $modifica['durata'] = $f_film->modifica('durata', $dati_registrazione_film['durata'], 'codice_film', $film);
        $modifica['genere'] = $f_film->modifica('genere', $dati_registrazione_film['genere'], 'codice_film', $film);
        $modifica['trama'] = $f_film->modifica('trama', $dati_registrazione_film['trama'], 'codice_film', $film);

        return $modifica;
      * 
      */
    }
    
    
    
    
    

    public function CreaFilm() {
        $view = USingleton::getInstaces('VRegistrazione');
        $dati_registrazione_film = $view->getDatiRegistrazioneFiValidi();
        $f_film = USingleton::getInstaces('FFilm');
if($dati_registrazione_film){

        if (!empty($_FILES["file"])) {
            $dati_registrazione_film['locandina'] = $_FILES['file']['name'];
            $f_film->carica_riga($dati_registrazione_film);
            if ($_FILES["file"]["error"] == 0) {
                $estensione = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

                if ($estensione == "png" || $estensione == "jpg" || $estensione == "gif" || $estensione == "JPG" || $estensione == "PNG" || $estensione == "GIF") {
                    if ($_FILES["file"]["size"] < 1000000) {

                        // $risultato = move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . CRegistrazione::getcont(). "." . $estensione);

                        $risultato = move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . $_FILES["file"]["name"]);
                        if ($risultato) {

                            echo "Registrazione del film avvenuta con successo!";
                        } else {
                            die("Errore imprevisto durante lo spostamento dell'immagine! :(");
                        }
                    } else {
                        die("Il file selezionato è troppo grande, non deve superare 1MB!");
                    }
                } else {
                    die("Estensione non consentita! Hai cercato di caricare un file ." . $estensione . "!");
                }
            } else {
                die("Errore imprevisto durante il caricamento dell'immagine!");
            }
        } else {
            die("Nessun file selezionato.");
        }
    }
    }
}
