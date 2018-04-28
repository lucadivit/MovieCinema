<?php


class VSetup extends View {
    
    
    /**
     * @access private
     * @var array $error_msg array dei messaggi di errore
     */
    private $error_msg = array('username' => "L'username non può contenere simboli. Es user:'prova','prova4',... ",
        'host'=>"l'host può contenere sono caratteri",
        
        'email' => 'La mail deve essere del tipo: prova@dominio.it sono ammessi: .,_,-',
        'password'=>'La password deve essere compresa tra gli 8 e i 30 caratteri e deve contenere almeno una lettera maiuscola e un numero oppure le password immesse non coincidono',
        'nome' => 'Il nome deve contenere solo lettere',
        'cognome' => 'Il cognome deve contenere solo lettere');
    
      /**
     * @access private
     * @var array $dati_errati array dei dati errati
     */
    private $dati_errati = array();
    
    
    /**
     * Questa funzione si occupa di recuperare il valore del controllore dall'array $_REQUEST, inviato tramite form.
     * Restituisce il valore del controllore o FALSE se non esiste.
     * @access public
     * @return String valore del controller
     */
     public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
    
    
     /**
     * Questa funzione si occupa di recuperare i valori delle tariffe dall'array $_REQUEST, inviati tramite form.
     * Restituisce un array associativo con i valori delle tariffe.
     * @access public
     * @return array valori delle tariffe
     */
    public function getTariffe() {
        $dati_richiesti = array('prezzo_adulto', 'prezzo_ridotto');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
/**
     * Questa funzione si occupa di recuperare i dati di registrazione dell'admin dall'array $_REQUEST, inviati tramite form.
     * Restituisce un array associativo con i dati di registrazione dell'admin.
     * @access public
     * @return array array associativo con i dati di registrazione dell'admin
     */
    public function getDatiAdmin() {
        $dati_richiesti = array('username', 'nome', 'cognome', 'email', 'password', 'password_1', 'data_nascita');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
    
    /**
     * Questa funzione si occupa di recuperare i dati del db
     * @access public
     * @return array 
     */
     public function getDatiDB() {
        $dati_richiesti = array('host', 'password', 'password_1', 'userid', 'nomedb', 'hostmail', 'usermail', 'passmail');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
    /**
     * validazione dati db
     * @return boolean
     */
      private function validazione_Dati_DB() {
        $datiDaValidare= $this->getDatiDB();
        
        $this->validazione_nome($datiDaValidare['host']);
        $this->validazione_nome($datiDaValidare['userid']);
        $this->validazione_nome($datiDaValidare['nomedb']);
        $this->validazione_password($datiDaValidare['password'], $datiDaValidare['password_1']);

        if (in_array(TRUE, $this->dati_errati) || (!$datiDaValidare['host'] && !$datiDaValidare['userid'] && !$datiDaValidare['nomedb'] && !$datiDaValidare['password'] && !$datiDaValidare['password_1'])) {
            return FALSE;
        } else {
            
            return TRUE;
        }
        
    }
    
  
    /**
     * Questa funzione si occupa di passare alle funzioni di validazione  i dati richiesti per la registrazione dell'admin ed effettua un controllo per verificare
     * che tutto sia andato a buon fine.
     * @access private
     * @return boolean  TRUE se non ci sono errori di validazione FALSE altrimenti.
     */
     private function validazione_Dati() {
        $datiDaValidare= $this->getDatiAdmin();
        
        $this->validazione_mail($datiDaValidare['email']);
        $this->validazione_username($datiDaValidare['username']);
        $this->validazione_nome($datiDaValidare['nome']);
        $this->validazione_cognome($datiDaValidare['cognome']);
       // $this->validazione_password($datiDaValidare['password'], $datiDaValidare['password_1']);

        if (in_array(TRUE, $this->dati_errati) || (!$datiDaValidare['username'] && !$datiDaValidare['nome'] && !$datiDaValidare['cognome'] && !$datiDaValidare['email'])) {
            return FALSE;
        } else {
            
            return TRUE;
        }
        
    }
    
/**
     * Questo metodo si occupa di restituire i dati di registrazione dell'admin sottoposti a VALIDAZIONE. In caso
     * di errore la funzione visualizzerà un template di errore altrimenti restituirà i dati.
     * @access public
     * @return mixed|array dati di modifica della registrazione
     */
  public function getDatiAdminValidi() {
        $utente_valido = $this->validazione_Dati();
        if (!$utente_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiAdmin());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            $this->set_template("Registrazione_Admin");
            return FALSE;
        } else {

            return $this->getDatiAdmin();
        }
    }

    
    /**
     * dati validati del db
     * @return boolean
     */
     public function getDatiDBValidi() {
        $utente_valido = $this->validazione_Dati_DB();
        if (!$utente_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiDB());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            $this->set_template("Db_Setup");
            return FALSE;
        } else {

            return $this->getDatiDB();
        }
    }

    
    
    
    /**
     * Questa funzione fa uso di metodi di librerie smarty per visualizzare la prima pagina della funzionalità di installazione
     * @return mixed template passo uno di installazione
     */
    public function impostapaginapasso1(){
        $formadmin = $this->fetch('./smarty/smarty-dir/templates/Db_Setup.tpl');
        $this->assign('form', $formadmin);
        $tpl= $this->fetch('./smarty/smarty-dir/templates/Home_Setup.tpl');
        return $tpl;
    }
    
    
    
    /**
     * Questa funzione fa uso di metodi di librerie smarty per visualizzare la seconda pagina della funzionalità di installazione
     * @return mixed template passo due di installazione
     */
    public function impostapaginapasso2() {
        $admin = $this->fetch('./smarty/smarty-dir/templates/Registrazione_Admin.tpl');
       return $admin;
    }
    
    public function impostapasso3() {
        $tariffe = $this->fetch('./smarty/smarty-dir/templates/Inserisci_tariffe.tpl');
       return $tariffe;
    }
  
    
    
    /**
     * Questa funzione fa uso di metodi di librerie smarty per visualizzare la pagina finale della funzionalità di installazione
     * @return mixed template passo finale di installazione
     */
    public function impstapassofinale() {
         $benvenuto = $this->fetch('./smarty/smarty-dir/templates/Benvenuto.tpl');
       return $benvenuto;
    }
    
    
    /**
     * Questa funzione valida la password controllando se rispetta il match. Essa deve avere almeno una lettera maiuscola, almeno un numero
     * e deve superare gli 8 caratteri
     * @access private
     * @param String $password passwrod dell'utente
     */
        private function validazione_password($password, $password_1) {
        $pattern = '/^(?=.*[A-Z])(?=.*[0-9])[[:alpha:]].{8,}$/';

        if (!preg_match($pattern, $password) || $password!=$password_1) {
            $this->dati_errati['password'] = TRUE;
           
        } else {
            $this->dati_errati['password'] = FALSE;
           
        }
    }

    
    /**
     * Questa funzione valida l'username controllando se rispetta il match e se non è gia presente tra gli utenti.
     * Essa deve essere composta da più di una lettera, può essere alfanumerica ma non può contenere simboli
     * @access private
     * @param String $username username dell'utente
     */
        private function validazione_username($username) {
        $pattern = '/^[[:alpha:][:digit:]]{1,}$/';
               if (!preg_match($pattern, $username)) {
            $this->dati_errati['username'] = TRUE;
        } else {
            $this->dati_errati['username'] = FALSE;
        }
        }
    
        
        
    /**
     * Questa funzione valida la mail controllando se rispetta il match. Essa può contenere numeri, lettere maiuscole e minuscole e accetta ,
     * di simboli, solo: "_","-",".". Inoltre il dominio può essere solo it o com.
     * @access private
     * @param String $mail mail dell'utente
     */
     private function validazione_mail($mail) {
        $pattern = '/^([a-zA-Z0-9_\.-]+)@\w+\.it|com$/';
       
        if (!preg_match($pattern, $mail)) {
            $this->dati_errati['email'] = TRUE;
        } else {
            $this->dati_errati['email'] = FALSE;
        }
        }


    /**
     * Questa funzione valida il nome controllando se rispetta il match. Esso può contenere solo lettere, spazi, e "'". Deve 
     * inoltre essere superiore ad 1 carattere
     * @access private
     * @param String $nome nome dell'utente
     */
    private function validazione_nome($nome) {
        $pattern = '/^[[:alpha:][:space:]\']{1,}$/';
        if (!preg_match($pattern, $nome)) {
            $this->dati_errati['nome'] = TRUE;
        } else {
            $this->dati_errati['nome'] = FALSE;
        }
    }

    
    /**
     * Questa funzione valida il cognome controllando se rispetta il match. Esso può contenere solo lettere, spazi, e "'". Deve 
     * inoltre essere superiore ad 1 carattere
     * @access private
     * @param String $cognome nome dell'utente
     */
    private function validazione_cognome($cognome) {
        $pattern = '/^[[:alpha:][:space:]\']{1,}$/';
        if (!preg_match($pattern, $cognome)) {
            $this->dati_errati['cognome'] = TRUE;
        } else {
            $this->dati_errati['cognome'] = FALSE;
        }
    }

    
    

        }