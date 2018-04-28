<?php

/**
 * Le classi View permettono l'iterazione con l'utente in particolare VGestione si occupa di ciò che concerne la gestione generica del cinema.
 * Estende la classe View
 * @author Luca & Valentina
 * @package View
 * @category Gestione
 */
class VGestione extends View {

    /**
     * @access private
     * @var type 
     */
    private $dati_film = array('titolo', 'autore', 'genere', 'locandina', 'durata', 'trama', 'codice_film');
    private $identificativo_film = array('titolo');
    private $identificativo_user = array('username');
    private $numeroSale = 5;
    private $error_msg = array('film' => 'Non è stato trovato alcun film con il codice inserito.', 'sala' => 'La sala è gia occupata');
    private $dati_errati = array();
    
    
   /**
     * Questa funzione si occupa di prelevare le informazioni relative alle mail inviate.
     * In particolare restituisce in un array associativo: l'oggetto della mail, il corpo della mail, e gli indirizzi.
     * @access public
     * @return array Informazioni sul contenuto della mail.
     */
    public function getdatiemail(){
        $dati_richiesti = array('oggetto', 'bodymess', 'indirizzi');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
   


 /**
     * Questa funzione si occupa di prelevare il codice del film. In particolare
     * restituisce il codice in caso di successo e NULL in caso di fallimento.
     * @return null|String Codice del film
     */
    public function getRicerca() {
        if (isset($_REQUEST['ricerca'])) {
            $codice_film = $_REQUEST['ricerca'];
            return $codice_film;
        } else {
            return NULL;
        }
    }



    /**
     * Questa funzione si occupa di prelevare il codice del film. In particolare
     * restituisce il codice in caso di successo e NULL in caso di fallimento.
     * @access public
     * @return null|String Codice del film
     */
    public function getCodice() {
        if (isset($_REQUEST['codice_film'])) {
            $codice_film = $_REQUEST['codice_film'];
            return $codice_film;
        } else {
            return NULL;
        }
    }

     /**
     * Questa funzione si occupa di prelevare l'username di un utente. In particolare
     * restituisce l'username in caso di successo e NULL in caso di fallimento.
     * @access public
     * @return null|String username dell'utente
     */
    public function getUtente() {
        if (isset($_REQUEST['utente'])) {
            $username = $_REQUEST['utente'];
            return $username;
        } else {
            return NULL;
        }
    }
    
        /**
     * Questa funzione si occupa di estrarre, tramite controllori, dal database, i dati relativi ai contatti dell'admin. Inoltre
     * questi ultimi vengono assegnati al template che viene poi stampato
     * @access public
     * @return mixed template con contatti dell'admin
     */
    public function estraiadmindaldb() {
        $c_gest = USingleton::getInstaces('CGestione');
        $address = $c_gest->contattaci();
        $nomi=$c_gest->contattiadmin();
        $numeroelementi = count($address);
        $this->assign('nomi', $nomi);
        $this->assign('address', $address);
        $this->assign('contatore', $numeroelementi);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Contatti.tpl');
        return $tpl1;
    }

      /**
     * Questa funzione si occupa di prelevare il titolo del film. In particolare
     * restituisce il titolo in caso di successo e NULL in caso di fallimento.
     * @access public
     * @return null|String titolo del film
     */
    public function getTitoloFilm() {
        if (isset($_REQUEST['titolo'])) {
            $titolo = $_REQUEST['titolo'];
            return $titolo;
        } else {
            return NULL;
        }
    }
    
    
    /**
     * Questa funzione si occupa di prelevare, tramite controllori, dal database, tutti gli utenti registrati. Vengono inseriti
     * in un array associativo e restituiti.
     * @access public
     * @return array elenco degli utenti
     */
    public function estraiutentidaldb() {
        $c_gest = USingleton::getInstaces('CGestione');
        $elenco_utenti = $c_gest->elencoutenti();
        return $elenco_utenti;
    }
    
     /**
     * Questa funzione si occupa di prelevare, tramite controllori, dal database, tutti i film in esso presenti. Vengono inseriti
     * in un array associativo e restituiti.
     * @access public
     * @return array elenco dei film nel database
     */

    public function estraiFilmDalBD() {
        $c_gest = USingleton::getInstaces('CGestione');
        $elenco_film = $c_gest->elencofilm();
        return $elenco_film;
    }

    
    /**
     * Questa funzione si occupa di prelevare, tramite i controllori, dal database, tutti i commenti relativi ad uno ed un solo film.
     * GLi inserisce in un array associativo e lo restituisce.
     * @access public
     * @param String $codice codice del film
     * @return array elenco dei commenti del film
     */
    public function estraicommenti($codice) {
        $c_gest = USingleton::getInstaces('CGestione');
        $elenco_comm = $c_gest->elencocommenti($codice);

        return $elenco_comm;
    }

    
     /**
     * Questa funzione si occupa di assegnare un elenco di commenti relativi ad uno ed un solo film,
     * al template che viene poi stampato.
     * @access public
     * @param type $elenco_comm commenti relativi ad uno ed un solo film
     * @return mixed template dei commenti di un film
     */
    public function mostraCommenti($elenco_comm) {

        $app = array();
        for ($i = 0; $i < count($elenco_comm); $i++) {
            $app[$i] = $elenco_comm[$i]['commento'];
        }
        $this->assign('elenco_comm', $app);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Commenti.tpl');
        return $tpl1;
    }

    
      /**
     * Questa funzione si occupa di assegnare e stampare il template con tutti gli utenti con
     * il relativo numero di biglietti acquistati.
     * @access public
     * @return template con utenti e biglietti acquistati
     */
    public function mostraUtenti() {
        $elenco_user = $this->estraiutentidaldb();
        $c_gest = USingleton::getInstaces('CGestione');
        $biglietti = $c_gest->NumeroBigliettiAcquistati();
        $this->assign('biglietti', $biglietti);
        $this->assign('Utente', $elenco_user[0]);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Gestione_utente.tpl');
        return $tpl1;
    }
    
/**
     * Questa funzione si occupa di assegnare al template, i dati relativi al profilo di un utente
     * come nome, cognome, email, ecc. Infine viene stampato.
     * @access public
     * @return mixed template profilo utente
     */
    public function mostraprofiloutente() {
        $c_gest = USingleton::getInstaces('CGestione');

        $dati = $c_gest->MostraInfoUtente();
        $this->assign('dati', $dati[0]);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Informazioni_Utente.tpl');
        return $tpl1;
    }
/**
     * Questa funzione si occupa di restituire tutti e i soli titoli dei film in un array. Se sono presenti dei film, ne restituisce i titoli,
     * FALSE in caso contrario
     * @access public
     * @return boolean| array titoli dei film
     */
    public function mostraTitoli() {
        $elenco_film = $this->estraiFilmDalBD();
        $elenco_titoli = array();
        $i = 0;
        if (isset($elenco_film)) {
            foreach ($elenco_film as $elenco_film) {
                foreach ($this->identificativo_film as $key) {
                    $elenco_titoli[$i] = $elenco_film[$key];
                }
                $i++;
            }
            return $elenco_titoli;
        } else {
            return FALSE;
        }
    }

      /**
     * Questa funzione assegna e stampa i titoli dei film.
     * @access public
     * @param type $tpl
     * @return mixed template dei titoli
     */
    public function TitoliDaVisualizzare($tpl) {
    $c_gest=  USingleton::getInstaces('CGestione');
        $elenco_film=$c_gest->elencofilm();
        $elenco_titoli=  $this->mostraTitoli();
 //$this->assign('Titolo', $primo);
  $this->assign('elenco', $elenco_film);

        $numeroelementi=count($elenco_titoli);
        $this->assign('Titolo', $elenco_titoli);
        $this->assign('contatore', $numeroelementi);
        //$this->assign('i', $i=0);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/'.$tpl.'.tpl');
        return $tpl1;
        // print_r($elenco_titoli[0]);

        }
     
 
   /**
     * Questa funzione assegna e stampa i dati dei film al template con lo scopo di
     * eliminarli selezionandone uno.
     * @access public
     * @return mixed template di eliminazione
     */
    public function TitoliDaCancellare() {
           $dati_film = $this->estraiFilmDalBD();
          
        $this->assign('dati', $dati_film);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Elenco_Film_Delete.tpl');
        return $tpl1;

    }
    
    /*
     * elenco film
     */
    public function mostraDatiFilm() {
        $elenco_film = $this->estraiFilmDalBD();
        $datiFilm = array();
        $i = 0;
        foreach ($elenco_film as $elenco_film) {
            foreach ($this->dati_film as $key) {
                $datiFilm[$i][$key] = $elenco_film[$key];
            }
            $i++;
        }
    }

    /**
     * Questa funzione si occupa di assegnare e stampare il template con i dati relativi ad un film
     * come i suoi commenti, la sua media di voti, ecc.
     * @access public
     * @return mixed template con dati film
     */
    public function mostraFilm() {

        $c_gest = USingleton::getInstaces('CGestione');
        $codice_film=  $this->getCodice();
        $datiFilm = $c_gest->ricercafilm($codice_film);
        $elenco_commenti = $this->estraicommenti($datiFilm[0]['codice_film']);
        $this->mostraCommenti($elenco_commenti);
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->getusernamesess();
        $this->assign('username', $username);
        $this->assign('datiFilm', $datiFilm[0]);
        $commento = $this->fetch('./smarty/smarty-dir/templates/Commenti.tpl');
        $this->assign('Commento', $commento);
         $stella=$c_gest->mediavoto();
        
        $media=number_format($stella, 1);
        $this->assign('media', $media);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Registrazione_Film_Avvenuta.tpl');
        return $tpl1;
    }

   /**
     * Questa funzione si occupa di assegnare e stampare i dati delle proiezioni come i suoi orari,
     * la locandina del film, ecc.
     * @access public
     * @return mixed template dati delle proiezioni
     */
    public function mostraDati() {
        $c_gest = USingleton::getInstaces('CGestione');
        $elenco_film = $this->estraiDatiSalaDalDB();
        $this->impostaDatiTemplate('datiFilm', $elenco_film);
        $locandine = array();
        foreach ($elenco_film as $value) {
            $locandine[$value['codice_film']]=$c_gest->cercalocandina($value['codice_film']);
        }
       
        $this->impostaDatiTemplate('locandina', $locandine);
        $tpl1 = $this->processaTemplate('./smarty/smarty-dir/templates/Orari_proiezioni');
        return $tpl1;
    }
    
     /**
     * Questa funzione permette di recuperare, tramite i controllori, i dati relativi alla sala con uno specifico film in proiezione
     *  Infine i dati vengono restituiti in un array associativo.
     * @access public
     * @return array dati sala proiezione
     */

    public function estraiDatiDalDB() {
        $c_gest = USingleton::getInstaces('CGestione');
        $titolo_film = $_REQUEST['titolo'];
        $dati = $c_gest->datiSala($titolo_film);
        return $dati;
    }

     /**
     * Questa funzione si occupa di restituire, tramite l'ausilio dei controllori, tutti i dati relativi a tutte le sale nel database.
     * Una sala esiste nel database nel momento in cui vi si inserisce una proiezione.
     * @access public
     * @return array Array associativo con i dati delle sale
     */
    public function estraiDatiSalaDalDB() {
        $c_gest = USingleton::getInstaces('CGestione');
        $dati = $c_gest->datiSala();
        return $dati;
    }

    /**
     * Questa funzione si occupa di restituire le impostazioni VALIDATE di una proiezione. In caso
     * di successo essi vengono inseriti e restituiti in un array associativo. In caso di fallimento viene stampato il template d'errore
     * e viene restituito FALSE
     * @access public
     * @return boolean|array dati della sala validati
     */
    public function getImpostazioniSala() {
        $datiForm = $this->ImpostazioniSala();
        $this->validazioneSala($datiForm);
        if (in_array('TRUE', $this->dati_errati)) {
            $this->impostaProiezioneError();
            return FALSE;
        } else {
            return $datiForm;
        }
    }

    
     /**
     * Questa funzione si occupa di restituire le impostazioni di una proiezione.
     * @access public
     * @return array dati della sala
     */
    public function ImpostazioniSala() {
        $datiSala = array('id_sala', 'codice_film', 'titolo_film', 'orario1', 'orario2', 'orario3');
        $datiForm = array();
        foreach ($datiSala as $key) {
            if (isset($_REQUEST[$key])) {
                $datiForm[$key] = $_REQUEST[$key];
            } else {
                $datiForm[$key] = NULL;
            }
        }
        return $datiForm;
    }
    

    
     /**
     * Questa funzione si occupa di impostare il template per l'impostazione dei film in una sala, ovvero per inserire una
     * proiezione. 
     * @access public
     * @return mixed template di inserimento proiezioni
     */
    public function ImpostaDatiInSala() {
       $elenco_film = $this->estraiFilmDalBD();
        $datiFilmInSala = $this->estraiDatiSalaDalDB();
        $elenco_titoli = array();
        $i = 0;
        
        if($elenco_film){
        foreach ($elenco_film as $elenco_film) {
            $elenco_titoli[$i] = $elenco_film['titolo'];
            //$elenco_codici[$i] = $elenco_film['codice_film'];
          $elenco_locandine[$elenco_film['titolo']] = $elenco_film['locandina'];
            $i++;
        }
      
        $this->impostaDatiTemplate('locandine',$elenco_locandine);
        $this->impostaDatiTemplate('datiFilm', $datiFilmInSala);
        //$this->impostaDatiTemplate('elenco_codici', $elenco_codici);
        $this->impostaDatiTemplate('elenco_titoli', $elenco_titoli);
        $this->impostaDatiTemplate('numeroSale', $this->numeroSale);
        return $this->processaTemplate('Imposta_film_sala');
        
        }else{
            return "Non sono presenti film in programmazione";
        }
    }

/**
     * Questa funzione si occupa di recuperare l'ID di una sala. In caso di successo lo
     * restituisce, in caso di fallimento restituisce NULL.
     * @access public
     * @return null|String id della sala
     */
    public function getIDSala() {
        if (isset($_REQUEST['id_sala'])) {
            $IDSala = $_REQUEST['id_sala'];
            return $IDSala;
        } else {
            return NULL;
        }
    }
    
     /**
     * Questa funzione assegna e stampa tutti gli indirizzi mail degli utenti registrati
     * @access public
     * @return mixed template delle mail degli utenti registrati
     */
    public function mostraelencoindirizzi() {
        $c_gest=  USingleton::getInstaces('CGestione');
        $elenco=$c_gest->elencoindirizzi();
        
        $numeroelementi=count($elenco);
        $this->assign('elenco', $elenco);
        $this->assign('contatore', $numeroelementi );
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Email_Admin_tutti.tpl');
        return $tpl1;
        
    }

   /**
     * Questa funzione si occupa di impostare il template di errore relativo al non corretto inserimento dei dati nella registrazione
     * di una proiezione. 
     * @access public
     * @return mixed template d'errore di registrazione della proiezione.
     */
    public function impostaProiezioneError() {
        $elenco_film = $this->estraiFilmDalBD();
        $datiFilmInSala = $this->estraiDatiSalaDalDB();
        $elenco_titoli = array();
        $elenco_codici = array();
        $elenco_locandine = array();
        $i = 0;
        foreach ($elenco_film as $elenco_film) {
            $elenco_titoli[$i] = $elenco_film['titolo'];
            $elenco_codici[$i] = $elenco_film['codice_film'];
            $elenco_locandine[$elenco_film['titolo']] = $elenco_film['locandina'];
            $i++;
        }
        $this->impostaDatiTemplate('locandine',$elenco_locandine);
        $this->impostaDatiTemplate('datiFilm', $datiFilmInSala);
        $this->impostaDatiTemplate('elenco_codici', $elenco_codici);
        $this->impostaDatiTemplate('elenco_titoli', $elenco_titoli);
        $this->impostaDatiTemplate('numeroSale', $this->numeroSale);
        $this->impostaDatiTemplate('error_msg', $this->error_msg);
        $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
        return $this->set_template('Imposta_film_sala_error');
    }

     /**
     * Questa funzione si occupa di validare i dati di una sala che si sta inserendo. In particolare verifica se una sala esiste
     * già o meno usando i controllori per comunicare con il database.
     * @access public
     * @param array $datiSala dati della sala da inserire
     */
    
    public function validazioneSala($datiSala) {
        $c_gest = USingleton::getInstaces('CGestione');
        if (!$c_gest->controllaSala($datiSala)) {
            $this->dati_errati['sala'] = 'FALSE';
        } else {
            $this->dati_errati['sala'] = 'TRUE';
        }
    }

    
     /**
     * Questa funzione si occupa di validare i dati di una sala che si sta inserendo. In particolare verifica se il film e il codice 
     * sono stati correttamente inseriti usando i controllori per comunicare con il database.
     * @access public
     * @param array $datiSala dati della sala da inserire
     */
    public function validazioneFilm($datiSala) {
        $c_gest = USingleton::getInstaces('CGestione');
        if ($c_gest->controllaFilm($datiSala)) {
            $this->dati_errati['film'] = 'FALSE';
        } else {
            $this->dati_errati['film'] = 'TRUE';
        }
    }
    
    
     /**
     * Questa funzione permette di recuperare tramite i controllori, l'indirizzo mail di un utente e di assegnarlo 
     * al template. Quindi viene mostrato il template che permette l'invio di una mail al singolo utente.
     * @access public
     * @return mixed template di invio mail
     */
    public function mostraindirizzoutentesingolo(){
        $v_g=  USingleton::getInstaces('VGestione');
        $c_gest=  USingleton::getInstaces('CGestione');
        $username=$v_g->getRicerca();
        $indirizzo=$c_gest->prendiIndirizzo($username);
        $this->assign('username', $username);
        $this->assign('indirizzo',$indirizzo);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Email_Admin_Utente.tpl');
        return $tpl1;
    }

}
