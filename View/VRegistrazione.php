<?php

/**
 * Le classi View permettono l'interazione con l'utente in particolare VRegistrazione si occupa di ciò che concerne, appunto, la registrazione.
 * Estende la classe View
 * @author Luca & Valentina
 * @package View
 * @category Registrazione
 */
class VRegistrazione extends View {

    
    /**
     * @access private
     * @var array $error_msg array dei messaggi d'errore
     */
      private $error_msg = array('username' => "L'username non può contenere simboli. Es user:'prova','prova4',... ",
        'useresistente'=>"Username già in uso!",
        'emailesistente'=>"Questa e-mail è già associata ad un account!",
        'email' => 'La mail deve essere del tipo: prova@dominio.it sono ammessi: .,_,-',
        'password'=>'La password deve essere compresa tra gli 8 e i 30 caratteri e deve contenere almeno una lettera maiuscola e un numero',
        'nome' => 'Il nome deve contenere solo lettere',
        'cognome' => 'Il cognome deve contenere solo lettere',
        'numero_carta'=>'Numero di carta non valido',
        'credit_validation_value' => 'Inserire CVV valido',
        'data_scadenza' => 'Data inserita non valida');
      
      /**
     * @access private
     * @var array $dati_errati array dei dati errati nella validazione
     */
    private $dati_errati = array();
    
    
    /**
     * Questo metodo si occupa di recuperare i dati inerenti le tariffe. Li restituisce sotto
     * forma di array associativo
     * @access public
     * @return array dati delle tariffe
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
     * Questo metodo si occupa di recuperare i dati inerenti la registrazione come username,
     * nome, cognome, ecc Li restituisce sotto forma di array associativo
     * @access public
     * @return array dati di registrazione
     */
    public function getDatiRegistrazioneUtente() {
        $dati_richiesti = array('username', 'nome', 'cognome', 'email', 'sesso', 'data_nascita', 'citta', 'provincia', 'CAP');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
    
    
    /**
     * Questo metodo si occupa di recuperare i dati inerenti la modifica dei dati utente come username,
     * nome, cognome, ecc Li restituisce sotto forma di array associativo
     * @access public
     * @return array dati di modifica della registrazione
     */
    
    public function getDatiModificaUtente() {
        $dati_richiesti = array('username', 'nome', 'cognome', 'password', 'email', 'sesso', 'data_nascita', 'citta', 'provincia', 'CAP');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
    
     /**
     * Questo metodo si occupa di restituire i dati inerenti la modifica dei dati di registrazione sottoposti a VALIDAZIONE. In caso
     * di errore la funzione visualizzerà un template di errore altrimenti restituirà i dati.
     * @access public
     * @return mixed|array dati di modifica della registrazione
     */
    public function getDatiModificaUtenteValidi() {
        $utente_valido = $this->validazione_ModificaUtente();
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        $datiutente = $c_reg->mostradatiutente();
        
        if (!$utente_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiModificaUtente());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            $this->assign('datiutente', $datiutente[0]);
            $tpl=$this->set_template("Modifica_Utente_Error");
            return $tpl;
        } else {
            $a=$this->getDatiModificaUtente();
            return $a;
        }
    }
    
    /**
     * Questa funzione si occupa di passare alle funzioni di validazione  i dati richiesti per la modifica
     *  dei dati di un utente ed effettua un controllo per verificare che tutto sia andato a buon fine.
     * @access private
     * @return boolean  TRUE se non ci sono errori di validazione FALSE altrimenti.
     */
     private function validazione_ModificaUtente() {
        
        $datiDaValidare= $this->getDatiModificaUtente();
       
        $this->validazione_mail($datiDaValidare['email']);
        $this->validazione_username($datiDaValidare['username']);
        $this->validazione_nome($datiDaValidare['nome']);
        $this->validazione_cognome($datiDaValidare['cognome']);
        $this->validazione_password($datiDaValidare['password']);

        if (in_array("TRUE", $this->dati_errati)) {//Se e presente un TRUE vuol dire che ci sono errori di validazione
            return FALSE; //Se ci sono errori di validazione restituisci falso
        } else {
            return TRUE;
        }
    }
    
  
      /**
     * Questa funzione si occupa di prelevare e restituire la nuova password inserita dopo il primo accesso.
     * @access public
     * @return String password
     */
    public function getnuovapassword(){
        $v_aut=  USingleton::getInstaces('VAutenticazione');
        $password=$v_aut->getPassword();
        return $password;
    }
    
    
     /**
     * Questa funzione si occupa di passare alla funzione di validazione la nuova password inserita dopo il primo accesso.
     * @access public
     * @return boolean TRUE se ha superato la validazione FALSE altrimenti
     */
    public function getpasswordvalida(){
       
        $password=  $this->getnuovapassword();
        $this->validazione_password($password);
        
        return $this->dati_errati['password'];
    }
    
    
       /**
     * Questa funzione permette di stampare il template di errore inerente al primo
     * accesso.
     * @access public
     */
    public function cambiopassworderrore(){
      $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
      $this->impostaDatiTemplate('error_msg', $this->error_msg);
      $this->set_template("Primo_Accesso_Error");
 }

 
 
    /**
     * Questo metodo si occupa di recuperare i dati inerenti la registrazione della carta di credito come username,
     * numero carta, cvv, ecc. Li restituisce sotto forma di array associativo
     * @access public
     * @return array dati di registrazione della carta di credito
     */
 public function getDatiRegistrazioneCarta() {
        $dati_richiesti = array('username', 'numero_carta', 'data_scadenza', 'credit_validation_value');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key])) {//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
            } else {
                $dati_form[$key] = NULL;
            }
        }
        

        return $dati_form;
    }

    
    /**
     * permette all'utente loggato la registrazione della carta 
     * @return type
     */
    public function getprov(){
$V_aut=USingleton::getInstaces('VAutenticazione');
$user=$V_aut->getUsername();
        $this->assign('user', $user);
        $tpl1=  $this->fetch('./smarty/smarty-dir/templates/Registrazione_carta.tpl');
        return $tpl1;
    }
    
    
      /**
     * Questa funzione stampa il template di avvenuta registrazione della carta
     * di credito
     * @access public
     * @return mixed template di avvenuta registrazione della carta di credito
     */
     public function impostapaginaregcartaavvenuta() {
       
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Registrazione_utente_effettuata.tpl');
     
        return $tpl1;
    }
    
    /**
     * Questa funzione stampa il template che ricordi di registrare la carta
     * di credito la quale permette di fare acquisti
     * @access public
     * @return mixed template di salto registrazione della carta
     */
     public function impostapaginasaltacarta() {
        $menu = $this->fetch('./smarty/smarty-dir/templates/Menu_Home.tpl');
        $this->assign('Menu', $menu);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Registrazione_ricorda_carta.tpl');
     
        return $tpl1;
    }
    
    /**
     * inserimento nuovo amministratore
     * @return type
     */
    public function getDatiAdmin1() {
        $dati_richiesti = array('username', 'nome', 'cognome', 'email', 'password', 'password_1', 'data_nascita');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
    
    
     /**
     * Questo metodo si occupa di recuperare i dati inerenti i commenti. Li restituisce sotto
     * forma di array associativo
     * @access public
     * @return array dati dei commenti
     */
     public function getDatiCommenti() {
        $dati_richiesti = array('codice_film', 'commento', 'voto');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key])) {
                $dati_form[$key] = $_REQUEST[$key];
            } else {
                $dati_form[$key] = NULL;
            }
        }

        return $dati_form;
    }
    
    
      /**
     * Questo metodo si occupa di recuperare i dati inerenti l'amministratore. Li restituisce sotto
     * forma di array associativo
     * @access public
     * @return array dati dell'amministratore
     */
    public function getdatiadmin(){
        $dati_richiesti = array('username', 'password', 'email', 'nome', 'cognome', 'data_nascita');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key])) {
                $dati_form[$key] = $_REQUEST[$key];
            } else {
                $dati_form[$key] = NULL;
            }
        }

        return $dati_form;
    }
    
    //NEW
  
    
    
      /**
     * funzione per recuperare i dati dell'amministratore
     * @access public
     * @return mixed template per la modifica dei dati dell'amministratore 
     */
     public function visualizzadatiadmin(){
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        $datiadmin = $c_reg->mostradatiadmin();
        $this->assign('datiadmin', $datiadmin[0]);
        $tpl1=  $this->fetch('./smarty/smarty-dir/templates/Modifica_Admin.tpl');
        return $tpl1;
    }


    
     /**
    *funzione per la modifica dei dati utente
     * @access public
     * @return mixed template per la modifica dei dati dell'utente
     */
        public function visualizzadatiutente(){
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        $datiutente = $c_reg->mostradatiutente();
        
        $this->assign('datiutente', $datiutente[0]);
        $tpl1=  $this->fetch('./smarty/smarty-dir/templates/Modifica_Utente.tpl');
        return $tpl1;
    }
    
    /**
     * Questa funzione permette la modifica dei dati da parte dell'utente. 
     * @access public
     * @return mixed template di errore di modifica dei dati dell'utente
     */
      public function visualizzadatiutenteerror(){
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        $datiutente = $c_reg->mostradatiutente();
        
        $this->assign('datiutente', $datiutente[0]);
        $tpl1=  $this->fetch('./smarty/smarty-dir/templates/Modifica_Utente_Error.tpl');
        return $tpl1;
    }
    
     /**
     * Questa funzione permette la modifica della carta di credito
     * @access public
     * @return mixed template per la modifica dei dati dell'utente
     */
    
     public function visualizzadaticarta(){
         $u_sess=  USingleton::getInstaces('USession');
           $c_reg=  USingleton::getInstaces('CRegistrazione');
        $daticarta = $c_reg->mostradaticarta();
     
        if(!$daticarta){
            $daticarta[0]['username']=$u_sess->leggi_valore('username');
            $daticarta[0]['task']='registracarta';
        }else{
            $daticarta[0]['task']='modificarta';
        }
        $this->assign('daticarta', $daticarta[0]);
        
        $tpl1=  $this->fetch('./smarty/smarty-dir/templates/Modifica_Carta.tpl');
        return $tpl1;
    }
    
    
    
     /**
     * Questa funzione si occupa di passare alle funzioni di validazione  i dati richiesti per la registrazione ed effettua un controllo per verificare
     * che tutto sia andato a buon fine.
     * @access private
     * @return boolean  TRUE se non ci sono errori di validazione FALSE altrimenti.
     */
    private function validazione_DatiUtente() {
        $datiDaValidare= $this->getDatiRegistrazioneUtente();
        print_r($datiDaValidare);
        $this->validazione_mail($datiDaValidare['email']);
        $this->validazione_username($datiDaValidare['username']);
        $this->validazione_nome($datiDaValidare['nome']);
        $this->validazione_cognome($datiDaValidare['cognome']);
        
        
        return $this->gestionedatierrati();
    }
    
    
       /**
     * Questa funzione verifica se nella validazione si sono riscontrati dei problemi.
     * @access public
     * @return boolean FALSE se non ci sono problemi di validazione TRUE altrimenti
     */
    private function gestionedatierrati() {
        $contatore = 0;
        foreach ($this->dati_errati as $elemento) {
            if ($elemento == 'FALSE') {
                $contatore = $contatore + 1;
            }
            //print_r($elemento);
        }
        //print_r($contatore);
        if ($contatore == count($this->dati_errati)) {
            return TRUE;
        } else {
            return FALSE;
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
        $c_reg=  USingleton::getInstaces('CRegistrazione');
       if($c_reg->controllouseresistente($username)){
           $this->dati_errati['username'] = 'useresistente';
        }
        else{
        if (!preg_match($pattern, $username)) {
            $this->dati_errati['username'] = 'username';
        } else {
            $this->dati_errati['username'] = 'FALSE';
        }
        }
        
    }

     /**
     * Questo metodo si occupa di restituire i dati inerenti la registrazione sottoposti a VALIDAZIONE. In caso
     * di errore la funzione visualizzerà un template di errore altrimenti restituirà i dati.
     * @access public
     * @return mixed|array dati registrazione utente
     */
    //I DATI VENGONO PASSATI GIA VALIDATI AL CONTROLLORE
    public function getDatiRegistrazioneUtenteValidi() {
        $utente_valido = $this->validazione_DatiUtente();
        if (!$utente_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiRegistrazioneUtente());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            $this->set_template("Registrazione_utente_error");
            return FALSE;
        } else {

            return $this->getDatiRegistrazioneUtente();
        }
    }

      /**
     * Questo metodo si occupa di restituire i dati inerenti la registrazione della carta di credito sottoposti a VALIDAZIONE. In caso
     * di errore la funzione visualizzerà un template di errore altrimenti restituirà i dati.
     * @access public
     * @return mixed|array dati registrazione carta di credito
     */
    public function getDatiRegistrazioneCartaValidi($logged) {//NB: PER MOTIVI DI SICUREZZA I DATI DELLA CARTA DI CREDITO NON VENGONO 'SALVATI' NELLA FORM MA BISOGNA RINSERIRLI OGNI VOLTA IN CASO DI ERRORE
        if (!$logged) {
            $v_aut = USingleton::getInstaces('VAutenticazione');
            $user = $v_aut->getUsername();
        } else {
            $u_sess = USingleton::getInstaces('USession');
            $user = $u_sess->getusernamesess();
        }
        $this->assign('user', $user);

        $carta_valida = $this->validazione_DatiCarta();
        if (!$carta_valida) {
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            switch ($logged) {
                case 'nolog':
                    $this->set_template("Registrazione_carta_error");
                    break;

                case 'logacq':
                    $v_gest = USingleton::getInstaces('VGestione');
                    $titolo = $v_gest->getCodice();
                    $this->assign('titolo', $titolo);
                    $this->set_template("Carta_Acquisti");
                    break;

                case 'logmod':
                    $u_sess = USingleton::getInstaces('USession');
                    $c_reg = USingleton::getInstaces('CRegistrazione');
                    $daticarta = $c_reg->mostradaticarta();

                    if (!$daticarta) {
                        $daticarta[0]['username'] = $u_sess->leggi_valore('username');
                        $daticarta[0]['task'] = 'registracarta';
                    } else {
                        $daticarta[0]['task'] = 'modificarta';
                    }
                    $this->assign('daticarta', $daticarta[0]);
                    $this->set_template("Modifica_Carta");

                    break;
            }


            return FALSE;
        } else {
            return $this->getDatiRegistrazioneCarta();
        }
    }

    
    
    public function getUpl() {
        if (isset($_REQUEST['upl'])) {
            $username = $_REQUEST['upl'];
            return $username;
        } else {
            return NULL;
        }
    }


    
     /**
     * Questa funzione si occupa di passare alle funzioni di validazione  i dati richiesti per la registrazione della carta di credito
     * ed effettua un controllo per verificare che tutto sia andato a buon fine.
     * @access private
     * @return boolean  TRUE se non ci sono errori di validazione FALSE altrimenti.
     */
 private function validazione_DatiCarta() {
        $datiCarta_daValidare= $this->getDatiRegistrazioneCarta();
      
        $this->validazione_username($datiCarta_daValidare['username']);
        $this->validazione_numeroCarta($datiCarta_daValidare["numero_carta"]);
        $this->validazione_data($datiCarta_daValidare['data_scadenza']);
        $this->validazione_CVV($datiCarta_daValidare["credit_validation_value"]);
        if (in_array("TRUE", $this->dati_errati) || (!$datiCarta_daValidare['numero_carta'] && !$datiCarta_daValidare['data_scadenza'] && !$datiCarta_daValidare["credit_validation_value"])) {
            return FALSE;
        } else {
            
            return TRUE;
        }
    } 

    
    
      /**
     * Questa funzione valida la password controllando se rispetta il match. Essa deve avere almeno una lettera maiuscola, almeno un numero
     * e deve superare gli 8 caratteri e deve essere uguale alla password precedentemente inserita.
     * @access private
     * @param String $password passwrod dell'utente
     */
     private function validazione_password1($password, $password_1) {
        $pattern = '/^(?=.*[A-Z])(?=.*[0-9])[[:alpha:]].{8,}$/';
        if($password && $password_1){  
        if (!preg_match($pattern, $password) || $password!=$password_1) {
            $this->dati_errati['password'] = "TRUE";
           
        } else {
            $this->dati_errati['password'] = "FALSE";
           
        }
        }
        else{
            return "FALSE";
        }
    }

    
    /**
     * Questa funzione valida la password controllando se rispetta il match. Essa deve avere almeno una lettera maiuscola, almeno un numero
     * e deve superare gli 8 caratteri
     * @access private
     * @param String $password passwrod dell'utente
     */
    private function validazione_password($password) {
        $pattern = '/^(?=.*[A-Z])(?=.*[0-9])[[:alpha:]].{8,}$/';

        if (!preg_match($pattern, $password)) {
            $this->dati_errati['password'] = TRUE;
           
        } else {
            $this->dati_errati['password'] = FALSE;
           
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
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        if($c_reg->controllamailesistente($mail)){
            $this->dati_errati['email'] = "emailesistente";
        }
        else{
        
        if (!preg_match($pattern, $mail)) {
            $this->dati_errati['email'] = "email";
        } else {
            $this->dati_errati['email'] = "FALSE";
        }
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
            $this->dati_errati['nome'] = "TRUE";
        } else {
            $this->dati_errati['nome'] = "FALSE";
        }
    }
 /**
     * Questa funzione valida il cognome controllando se rispetta il match. Esso può contenere solo lettere, spazi, e "'". Deve 
     * inoltre essere superiore ad 1 carattere
     * @access private
     * @param String $cognome cognome dell'utente
     */
    private function validazione_cognome($cognome) {
        $pattern = '/^[[:alpha:][:space:]\']{1,}$/';
        if (!preg_match($pattern, $cognome)) {
            $this->dati_errati['cognome'] = "TRUE";
        } else {
            $this->dati_errati['cognome'] = "FALSE";
        }
    }

    
     /**
     * Questa funzione valida il numero di carta di credito controllando se rispetta il match. Esso può contenere solo numeri e deve necessariamente essere
     * di 16 cifre.
     * @access private
     * @param String $numero_carta numero di carta di credito
     */
    private function validazione_numeroCarta($numero_carta) {
        $pattern = '/^[[:digit:]]{16}$/'; //ereg([[:digit:]]){16}$/ elimina gli spazi
        if($numero_carta){
        if (!preg_match($pattern, $numero_carta)) {
            $this->dati_errati['numero_carta'] = "TRUE";
        } else {
            $this->dati_errati['numero_carta'] = "FALSE";
        }
        }else{
             $this->dati_errati['numero_carta'] = "FALSE";

        }
        
   
        
    }
/**
     * Questa funzione valida il CVV della carta di credito controllando se rispetta il match. Esso può contenere solo numeri e deve necessariamente essere
     * o di 3 o di 4 caratteri (dipende dal tipo di carta di credito)
     * @access private
     * @param String $credit_validation_value CVV carta di credito
     */
    private function validazione_CVV($credit_validation_value) {
        $pattern = '/^[[:digit:]]{3,4}$/';
        if($credit_validation_value){
        if (!preg_match($pattern, $credit_validation_value)) {
            $this->dati_errati["credit_validation_value"] = "TRUE";
        } else {
            $this->dati_errati["credit_validation_value"] = "FALSE";
        }
        }else{
            $this->dati_errati["credit_validation_value"] = "FALSE";
        }
    }
    
    /**
     * Questa funzione valida la data di scadenza della carta di credito controllando se esiste effetivamente la data inserita e,
     * se esiste, deve essere inferiore alla data di registrazione
     * @access private
     * @param String $data_scadenza_carta data di scadenza della carta di credito
     */

    private function validazione_data($data_scadenza_carta) {
        if($data_scadenza_carta){
        $data_odierna = mktime(0, 0, 0, date('m'), date('d'), date('y'));
        $data_scadenza_carta=explode('-', $data_scadenza_carta);
        if($data_scadenza_carta[1]==NULL || $data_scadenza_carta[0]==NULL){
            $data_scadenza_carta[2]='00';
            $data_scadenza_carta[1]='00';
            $data_scadenza_carta[0]='0000';
        }
        $data_scadenza=  mktime(0, 0, 0, $data_scadenza_carta[1], $data_scadenza_carta[2], $data_scadenza_carta[0]);
        if ($data_odierna <= $data_scadenza) {//Se la data odierna è minore della data di scadenza
            $this->dati_errati["data_scadenza"] = "FALSE"; //Falso cioe non e scaduta
        } else {
            $this->dati_errati["data_scadenza"] = "TRUE";
        }
        }
        else{
            $this->dati_errati["data_scadenza"] = "FALSE";
        }
    }
    
     




 /**
     * Questa funzione si occupa di recuperare, tramite richiamo ai controllori, i dati di registrazione relativi ad un film e vengono assegnati,
     * tramite metodi nativi delle librerie smarty, al template che viene restituito.
     * @return mixed template con i dati del film
     */


  public function visualizzadatifilm(){
        $c_reg=  USingleton::getInstaces('CRegistrazione');
        $dati_film=$c_reg->recuperadatifilm();
        
        $this->assign('datifilm', $dati_film[0]);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Modifica_Film.tpl');
        return $tpl1;
        
        
    }



/**
     * @access private
     * @var array Array dei messagi di errore 
     */
   private $error_msg2 = array('titolo' => "Il titolo non può contentere caratteri speciali!",
        'autore' => "L'autore non può contentere caratteri speciali e numeri!",
        'durata' => "La durata dev'essere indicata in minuti",
        'genere' => "Il genere non può contentere caratteri speciali e numeri!",
        'codice_film' => 'Il codice può contenere solo numeri e lettere ed il primo carattere deve essere una lettera',
        'trama' => "Non è possibile inserire parole come SELECT, INSERT, CREATE, DELETE, FROM, WHERE, OR, 
AND, LIKE, EXEC, SP_, XP_, SQL, ROWSET, OPEN, BEGIN, END, DECLARE");
   
   
   
    /**
     * @access private
     * @var array array dei dati errati
     */
    private $dati_errati2 = array();

    
    /**
     * Questo metodo si occupa di recuperare i dati inerenti la registrazione dei film inviati con metodi di tipo GET o POST, come titolo,
     * autore, durata, ecc Li restituisce sotto forma di array associativo
     * @access public
     * @return array dati di registrazione dei film
     */
    public function getDatiRegistrazioneFi() {
        $dati_richiesti = array('titolo', 'autore', 'durata', 'genere', 'codice_film', 'trama');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key])) {
                $dati_form[$key] = $_REQUEST[$key];
            } else {
                $dati_form[$key] = NULL;
            }
        }

        return $dati_form;
    }

    
     /**
     * Questo metodo si occupa di restituire i dati inerenti la registrazione di un film sottoposti a VALIDAZIONE. In caso
     * di errore la funzione visualizzerà un template di errore altrimenti restituirà i dati.
     * @access public
     * @return mixed|array dati di registrazione del film
     */
    public function getDatiRegistrazioneFiValidi() {
        $film_valido = $this->validazionefilm();
        if (!$film_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiRegistrazioneFi());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati2);
            $this->impostaDatiTemplate('error_msg', $this->error_msg2);
            $this->set_template("Registrazione_Film_error");
            return FALSE;
        } else {

            return $this->getDatiRegistrazioneFi();
        }
    }

      /**
     * Questa funzione si occupa di passare alle funzioni di validazione  i dati richiesti per la registrazione
     * di un film ed effettua un controllo per verificare che tutto sia andato a buon fine.
     * @access public
     * @return boolean  TRUE se non ci sono errori di validazione FALSE altrimenti.
     */
    private function validazionefilm() {
        $datiDaValidare = $this->getDatiRegistrazioneFi();
      
        $this->validazione_titolo($datiDaValidare['titolo']);
        $this->validazione_autore($datiDaValidare['autore']);
        $this->validazione_durata($datiDaValidare['durata']);
        $this->validazione_genere($datiDaValidare['genere']);
        $this->validazione_codice_film($datiDaValidare['codice_film']);
        $this->validazione_trama($datiDaValidare['trama']);
if (in_array("TRUE", $this->dati_errati2)) {//Se e presente un TRUE vuol dire che ci sono errori di validazione
            return FALSE; //Se ci sono errori di validazione restituisci falso
        } else {
            return TRUE;
        }
    }
    
    /**
     * Questa funzione valida il titolo di un film controllando se rispetta il match. Esso può contenere solo lettere, spazi e "'".
     * Infine puo essere lungo dall' 1 ai 40 caratteri.
     * @access private
     * @param String $titolo titolo del film
     */

    private function validazione_titolo($titolo) {
        $pattern = '/^[[:alpha:][:space:]\']{1,40}$/';

        if (!preg_match($pattern, $titolo)) {
            $this->dati_errati2['titolo'] = "TRUE";
        } else {
            $this->dati_errati2['titolo'] = "FALSE";
        }
    }
    
     /**
     * Questa funzione valida il codice di un film controllando se rispetta il match. Esso può contenere solo lettere, spazi e "'".
     * Esso deve essere composto da almeno un carattere che appartenga a lettere maiuscole e minuscole e numeri,
     * @access private
     * @param String $codice_film codice del film
     */

    private function validazione_codice_film($codice_film) {
        $pattern = '/^([0-9a-zA-Z]\s?)+$/';
        $pattern2='/^([a-zA-Z])$/';

        if (!preg_match($pattern, $codice_film) || !preg_match($pattern2, substr($codice_film, 0,1))) {
            $this->dati_errati2['codice_film'] = "TRUE";
        } else {
            $this->dati_errati2['codice_film'] = "FALSE";
        }
    }

    
      /**
     * Questa funzione valida il genere di un film controllando se rispetta il match.
     * Esso può contenere solo lettere e spazi e può essere composto da uno ad un massimo di venti caratteri
     * @access private
     * @param String $genere genere del film
     */
    private function validazione_genere($genere) {
        $pattern = '/^[[:alpha:][:space:]\']{1,20}$/';
        if (!preg_match($pattern, $genere)) {
            $this->dati_errati2['genere'] = "TRUE";
        } else {
            $this->dati_errati2['genere'] = "FALSE";
        }
    }
    
     /**
     * Questa funzione valida il nome dell'autore di un film controllando se rispetta il match. Esso può contenere solo lettere, spazi e "'".
     * Infine può essere composto da uno ad un massimo di trenta caratteri
     * @access private
     * @param String $autore autore del film
     */

    private function validazione_autore($autore) {
        $pattern = '/^[[:alpha:][:space:]\']{1,30}$/';
        if (!preg_match($pattern, $autore)) {
            $this->dati_errati2['autore'] = "TRUE";
        } else {
            $this->dati_errati2['autore'] = "FALSE";
        }
    }

    
    /**
     * Questa funzione valida la durata di un film controllando se rispetta il match. Essa può contenere solo numeri da un minimo
     * di uno ad un massimo di tre.
     * @access private
     * @param String $durata durata del film
     */
    private function validazione_durata($durata) {
        $pattern = '/^(?=.*[0-9]).{1,3}$/';

        if (!preg_match($pattern, $durata)) {
            $this->dati_errati2['durata'] = "TRUE";
        } else {
            $this->dati_errati2['durata'] = "FALSE";
        }
    }
    
     /**
     * Questa funzione valida la trama di un film controllando se rispetta il match. Essa non può contenere parole chiave di codice MySQL
     * @access private
     * @param String $trama trama del film
     */

    private function validazione_trama($trama) {
        $pattern = '/^.*\b(SELECT|select|INSERT|insert|CREATE|create|DELETE|delete|FROM|from|WHERE|where|OR|or|AND|and|LIKE|like|EXEC|exec|SP_|sp_|XP_|xp_|SQL|sql|ROWSET|rowset|OPEN|open|BEGIN|begin|END|end|DECLARE|declare)\b.*$/';
        if (preg_match($pattern, $trama)) {
            $this->dati_errati2['trama'] = "TRUE";
        } else {
            $this->dati_errati2['trama'] = "FALSE";
        }
    }
                

/**
 * Validazione dati dell'amministratore
 * @return type
 */
private function validazione_Datiadmin() {
        $datiDaValidare= $this->getDatiAdmin1();
        
        $this->validazione_mail($datiDaValidare['email']);
        $this->validazione_username($datiDaValidare['username']);
        $this->validazione_nome($datiDaValidare['nome']);
        $this->validazione_cognome($datiDaValidare['cognome']);
        $this->validazione_password1($datiDaValidare['password'], $datiDaValidare['password_1']);

                return $this->gestionedatierrati();
        }
    
/**
 * Imposta i messaggi di errore sul template relativo all'inserimento di un nuovo amministratore o 
 * ne restituisce i dati validati
 * @return boolean || @return array 
 * 
 */
  public function getDatiAdminValidi() {
        $utente_valido = $this->validazione_Datiadmin();
        if (!$utente_valido) {
            $this->impostaDatiTemplate('dati_registrazione', $this->getDatiAdmin1());
            $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
            $this->impostaDatiTemplate('error_msg', $this->error_msg);
            $this->set_template("Aggiungi_admin");
            return FALSE;
        } else {

            return $this->getDatiAdmin1();
        }
    }







}
