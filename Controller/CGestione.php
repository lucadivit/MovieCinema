<?php
/**
 * CGestione si occupa di manipolare oggetti che concernono la gestione generale dell'applicativo web
 * @author Luca & Valentina
 * @package Controller
 * @category Gestione
 */
class CGestione {

    
     /**
     * Questa funzione smista le attività in base al task ricevuto
     * @acces public
     * @return mixed
     */
    public function smista() {

        $view = USingleton::getInstaces('VGestione');
        switch ($view->getTask()) {
            
            
             case 'chisiamo':
                return $view->fetch('./smarty/smarty-dir/templates/chisiamo.tpl');
                break;
         
            case 'mostratitoli':
                //return $view->mostraDatiFilm();
                return $view->TitoliDaVisualizzare('ElencoFilm');
                break;
			case 'mostratitolidamodificare':
                return $view->TitoliDaVisualizzare('Elenco_modifica_film');
                break;

            case 'elencocancellafilm':
                return $view->TitoliDaCancellare();
                break;
            
            case 'impostafilm':
                //return $view->mostraDatiFilm();
                return $view->mostraFilm();
                break;

            case 'mostracommenti':
                return $view->mostracommenti();
                break;

            case 'salatpl':
                //$viewGS = USingleton::getInstaces('VGestioneSale');
                //return $viewGS->ImpostaDatiInSala();
                return $view->ImpostaDatiInSala();
                break;

            case 'impostafilmsala':
                return $this->impostaFilmSala();
                break;

            case 'mostraorari':
                //$viewGS = USingleton::getInstaces('VGestioneSale');
                //return $viewGS->mostraDati();
                return $view->mostraDati();
                break;

            case 'mostrautenti':
                return $view->mostraUtenti();
                break;

            case 'eliminautente':
                return $this->EliminaUtente();
                break;

            case 'mostradatiut':
                return $view->mostraprofiloutente();
                break;

            case 'eliminaproiezione':
                return $this->eliminaProiezione();
                break;
            
            case 'eliminafilm':
                return $this->eliminaFilm();
                break;
            case 'invioemailbroad':
                return $this->emailbroadcast();
                break;
            case 'tplmessadmin':
                return $view->mostraelencoindirizzi();
                break;
          
            case 'tplscrivimailutente':
                return $view->mostraindirizzoutentesingolo();
                break;
            
            case 'disattivaaccount':
            return $this->DisattivaAccount();
            break;
        
            case 'contattaci':
                return $view->estraiadmindaldb();
                //return $view->processaTemplate('Contatti');
                break;
            case'media':
                return $this->mediavoto();
                break;
        }
    }
    
    
     /**
     * Questa funzione restituisce una locandina di un film in base al codice del film
     * @access public
     * @param String $cod_film il codice del film
     * @return mixed la locandina
     */
        public function cercalocandina($cod_film){
        $f_film = USingleton::getInstaces('FFilm');
        $film = $f_film->cerca_nel_db($cod_film);
       
        return $film[0]['locandina'];
        }
        
  /**
     * Questa funzione prende tutti i voti nel database, relativi ad un film, lasciati dagli utenti, e ne restituisce la media
     * @access public
     * @return float la media dei voti
     */
        
    public function mediavoto() {
        $f_comm=  USingleton::getInstaces('FCommento');
        $v_gest= USingleton::getInstaces('VGestione');
        $f_film=  USingleton::getInstaces('FFIlm');
        $codice=$v_gest->getCodice();
    
        $parametri2=array(array(0=>'codice_film', 1=>'=', 2=>$codice));
        $commento=$f_comm->cerca_nel_db(NULL, $parametri2);
        $totale=0;
        
        for($i=0; $i<count($commento); $i++){
            $totale=$totale+($commento[$i]['voto']);
        }
        $media=$totale/count($commento);
        return $media;
    }
    
   
      /**
     * Questa funzione restituisce gli indirizzi email degli admin.
     * @access public
     * @return Array indirizzi mail degli admin
     */
    public function contattaci() {
        $f_admin = USingleton::getInstaces('FAmministratore');
        $admin = $f_admin->cerca_nel_db();
        for ($i = 0; $i < count($admin); $i++) {
            $indirizzi[$i] = $admin[$i]['email'];
        }
        return $indirizzi;
    }

    
     /**
     * Questa funzione restituisce gli username degli admin
     * @access public
     * @return array Username degli admin
     */
    public function contattiadmin() {
        $f_admin = USingleton::getInstaces('FAmministratore');
        $admin = $f_admin->cerca_nel_db();
        for ($i = 0; $i < count($admin); $i++) {
            $nome[$i] = $admin[$i]['username'];
        }
        return $nome;
    }

   
    
     /**
     * Questa funzione ricerca un film in base al suo codice.
     * @access public
     * @return Array restituisce i dati di un film
     */
   public function ricercafilm($chiave) {
        $f_film = USingleton::getInstaces('FFilm');
       return $f_film->cerca_nel_db($chiave);
    }
   

     /**
     * Questa funzione restituisce tutti i film presenti nel database.
     * @access public
     * @return array restituisce un array di array di film
     */
    public function elencofilm() {
        $f_film = USingleton::getInstaces('FFilm');
        $elenco_film = $f_film->cerca_nel_db();
        return $elenco_film;
    }

    
    /**
     * Questa funzione restituisce tutti i commenti relativi ad un film.
     * @access public
     * @return array Array contenente commenti dei film
     */
    public function elencocommenti($codice) {
        $f_comm = USingleton::getInstaces('FCommento');
        $parametri = array(array(0 => 'codice_film', 1 => '=', 2 => $codice));
        $elenco_comm = $f_comm->cerca_nel_db(NULL, $parametri);
        return $elenco_comm;
    }

    
    /**
     * Questa funzione restituisce tutte le informazioni relative alle sale contenute nel database.
     * @access public
     * @return array Array associativo contenente i dati di tutte le sale
     */
   public function datiSala() {
        $f_sala = USingleton::getInstaces('FSala');
        $dati = $f_sala->cerca_nel_db();
        return $dati;
    }

    /**
     * Questa funzione restituisce i dati relativi ad un utente in base al suo username
     * @access public
     * @return array Dati dell'utente
     */
    public function elencoutenti() {
        $f_utente = USingleton::getInstaces('FUtente');
        $view = USingleton::getInstaces('VGestione');
        $username = $view->getRicerca();
        $elenco_utente = $f_utente->cerca_nel_db($username);
        return $elenco_utente;
    }

    
    /**
     * Questa funzione permette di eliminare un utente dal database
     * @access public
     * @return boolean TRUE se l'eliminazione è andata a buon fine FALSE altrimenti
     */
    public function EliminaUtente() {
        $v_gest = USingleton::getInstaces('VGestione');
        $f_utente = USingleton::getInstaces('FUtente');
        $username = $v_gest->getUtente();
        $elimina = $f_utente->elimina_riga($username);
        return $elimina;
    }

    
    
    /**
     * Questa funzione permette ad un utente in sessione di disattivare il proprio account. 
     * Una volta disattivato l'account l'utente verrà cancellato e gli sarà inviata una mail.
     * @access public
     * @return boolean TRUE se l'eliminazione è avvenuta con successo FALSE altrimenti
     */
      public function DisattivaAccount() {
        $view=  USingleton::getInstaces('VGestione');
        $sess = USingleton::getInstaces('USession');
        $f_utente = USingleton::getInstaces('FUtente');
        $f_carta=  USingleton::getInstaces('FCartaDiCredito');
        
        $username = $sess->getusernamesess();
        $datiut=$f_utente->cerca_nel_db($username);
        $email=$datiut[0]['email'];
        $parametri=array(array(0=>'username', 1=>'=', 2=>$username));
        $cerca=$f_carta->cerca_nel_db(NULL, $parametri);
        $elimina = $f_utente->elimina_riga($username);
        $carta=$f_carta->elimina_riga($cerca[0]['numero_carta']);
        if($elimina&&$carta){
            
             $mail = USingleton::getInstaces('UMail');
        if (!$mail->sendmess($email, 'Disattivazione Account', "Ci dispiace che hai deciso di disattivare il tuo account! Non esitare a scriverci la motivazione o eventuali consigli per rendere migliore Movie Cinema! Torna presto a trovarci! \n Lo staff di Cinema On Line")) {
            echo 'errore';
        } else {
            $sess->distruggi_sessione();
            $v_h =USingleton::getInstaces('VHome');
            return $v_h->paginaguest('./smarty/smarty-dir/templates/Menu_Home.tpl');
        }
              
            
        }
        return $elimina;
    }

    
   /**
     * Questa funzione permette di inserire dei film in sala. Ossia prende un film dal database e "lo mette in proiezione" 
     * modificando la tabella "Sala" del database
     * @access public
     * @return mixed
     */
    public function impostaFilmSala() {
                     $f_sala = USingleton::getInstaces('FSala');
        $view = USingleton::getInstaces('VGestione');
        $f_film=  USingleton::getInstaces('FFilm');
        //$viewGS = USingleton::getInstaces('VGestioneSale');
        //$datiSala = $viewGS->getImpostazioniSala();
        $datiSala = $view->getImpostazioniSala();
        if($datiSala){
        $titolo=$datiSala['titolo_film'];
        $parametri=array(array(0=>'titolo', 1=>'=', 2=>$titolo));
        $cerca=$f_film->cerca_nel_db(NULL, $parametri);
        $codice_film=$cerca[0]['codice_film'];
        $datiSala['codice_film']=$codice_film;
        $f_sala->carica_riga($datiSala);
        echo 'Inserimento effettuato!';
        return $view->ImpostaDatiInSala();
       }
    }

    
    /**
     * Questa funzione controlla se un film è presente nel database. Restituisce TRUE se presente FALSE altrimenti 
     * @access public
     * @param array $datiSala i dati della sala quali: codice del film in sala, titolo del film in sala, ecc.
     * @return boolean TRUE se il film è presente, FALSE altrimenti
     */
    public function controllaFilm($datiSala) {
        $f_film = USingleton::getInstaces('FFilm');
        $datiFilm = $f_film->cerca_nel_db($datiSala['codice_film']);
        if ($datiSala['titolo_film'] == $datiFilm[0]['titolo']) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
    /**
     * Questa funzione controlla il numero di biglietti acquistati dall'utente.
     * @access public
     * @return int Il numero di biglietti
     */
    public function NumeroBigliettiAcquistati() {
        $v_gest = USingleton::getInstaces('VGestione');
        $f_utente = USingleton::getInstaces('FUtente');
        $username = $v_gest->getUtente();
        $rigaut = $f_utente->cerca_nel_db($username);
        $numerobiglietti = ($rigaut[0]['numero_biglietti']);
        return $numerobiglietti;
    }

    
     /**
     * Questa funzione controlla se una sala è presente nel database o meno. Una sala è presente nel database se ci
     * sono delle proiezioni. Se è presente la funzione restituisce TRUE, FALSE altrimenti. 
     * @param array $datiSala
     * @access public
     * @return boolean TRUE se la sala è presente, FALSE altrimenti
     */
    public function controllaSala($datiSala) {
        $f_sala = USingleton::getInstaces('FSala');
        $result = $f_sala->cerca_nel_db($datiSala['id_sala']);
        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

      /**
     * Questa funzione fa una ricerca sul database di un utente a partire dal suo username, e ne restituisce tutte le informazioni
     * relative in un array associativo.
     * @access public
     * @return array Informazioni dell'utente
     */
    public function MostraInfoUtente() {
        $f_utente = USingleton::getInstaces('FUtente');
        $v_gest = USingleton::getInstaces('VGestione');
        $username = $v_gest->getUtente();
        $rigaut = $f_utente->cerca_nel_db($username);
        return $rigaut;
    }

      /**
     * Questa funzione elimina una proiezione dal database a partire dall'id della sala in cui essa è in proiezione. L'id è passato
     * dall'amministratore tramite una form
     * @access public
     * @return mixed
     */
    public function eliminaProiezione() {
       $f_sala = USingleton::getInstaces('FSala');
        $view = USingleton::getInstaces('VGestione');
        $id_sala = $view->getIDSala();
        //$viewGS = USingleton::getInstaces('VGestioneSale');
        //$id_sala = $viewGS->getIDSala();
        $f_sala->elimina_riga($id_sala);
        echo 'Eliminato!';
        return $view->ImpostaDatiInSala();
    }

     /**
     * Questa funzione elimina un film dal database. Libera inoltre la sala (eliminando così la proiezione)
     * ed elimina i relativi commenti.
     * @access public
     */
    public function eliminaFilm(){
         $v_gest = USingleton::getInstaces('VGestione');
        $f_film = USingleton::getInstaces('FFilm');
        $f_comm=  USingleton::getInstaces('FCommento');
        $f_sala=  USingleton::getInstaces('FSala');
        $codice = $v_gest->getCodice();
        $parametri=array(array(0=>'codice_film', 1=>'=', 2=>$codice));
        $paramsala=array(array(0=>'codice_film', 1=>'=', 2=>$codice));
        $cerca_commento=$f_comm->cerca_nel_db(NULL, $parametri);
        $cerca_sala=$f_sala->cerca_nel_db(NULL, $paramsala);
        for($i=0; $i<count($cerca_commento); $i++){
            $f_comm->elimina_riga($cerca_commento[$i]['id_commento']);
        }
        for($i=0; $i<count($cerca_sala); $i++){
            $f_sala->elimina_riga($cerca_sala[$i]['id_sala']);
        }
        $f_film->elimina_riga($codice);
    }
    
     /**
     * Questa funzione permete all'amministratore di inviare una mail a tutti gli utenti registrati
     * @access public 
     */
    
    public function emailbroadcast() {
        $v_gest=  USingleton::getInstaces('VGestione');
        $a=$v_gest->getdatiemail();
        $mail = USingleton::getInstaces('UMail');
        $mail->sendmess($a['indirizzi'], $a['oggetto'], $a['bodymess']);
       
    }
    
     /**
     * Questa funzione restituisce tutti gli indirizzi email degli utenti registrati.
     * @access public
     * @return array Indirizzi email
     */
    public function elencoindirizzi(){
        $f_utente=  USingleton::getInstaces('FUtente');
        $indirizzi = $f_utente->restituisci_indirizzi();
        return $indirizzi;

    }
    
    /**
     * Questa funzione rstituisce l'indirizzo e-mail di uno specifico utente.
     * @access public
     * @param String $username l'username dell'utente
     * @return String email utente
     */
    
    public function prendiIndirizzo($username) {
        $f_utente= USingleton::getInstaces('FUtente');
       
        $dati_utente=$f_utente->cerca_nel_db($username);
        return $dati_utente[0]['email'];
        
    }
}
