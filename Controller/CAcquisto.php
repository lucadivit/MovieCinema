<?php


/**
 * CAcquisto si occupa di manipolare oggetti che concernono l'acquisto
 * @package Controller
 * @category Acquisto
 * @author Luca & Valentina
 */
class CAcquisto {

     /**
     *@access private
     * @var String $mess_acquisto messaggio email relativo all'acquisto che si invia all'utente
     */
    private $mess_acquisto;
    
    /**
     * Questa funzione smista, tramite il task, le varie richieste inerenti l'acquisto.
     * @access public
     * @return mixed 
     */
    public function smista() {
        $view = USingleton::getInstaces('VAcquisto');
        switch ($view->getTask()) {
            case 'sendacquisto':
                return $view->impostaPaginaDiAcquisto();
                break;

            case 'prendipostidisponibili':
                return $this->calcolaposti();
                break;
            case 'inviacquisto':
                return $this->inviacquisto();
                break;
            
            case 'elencoacquisti':
                $v_gest=  USingleton::getInstaces('VGestione');
                return $v_gest->TitoliDaVisualizzare('Elenco_Acquisto');
                break;
            
            case 'tornacquisto':
                return $view->getcartatpl();
                break;
            case 'visualizzatariffe':
                return $view->impostapaginatariffe();
                break;
            
            case 'preventivo':
               return $this->preventivo();
                break;
            
        }
    }

    /**
     * Questa funzione preleva, attraverso apposite chiamate al database, le tariffe degli spettacoli
     * @access public
     * @return float tariffe spettacoli
     */
    public function prelevatariffe(){
        $f_tar=  USingleton::getInstaces('FTariffe');
        $tariffa=$f_tar->cerca_nel_db('0');
        return $tariffa;
    }

    /**
     * Questa funzione restituisce, attraverso opportune chiamate al database, il numero di posti residui per uno spettacolo
     * @access public
     * @return int numero posti
     */
    public function calcolaposti() {
        $v_acq = USingleton::getInstaces('VAcquisto');
        $f_sala = USingleton::getInstaces('FSala');
        $sala = $v_acq->getinfosala();
        if ($sala) {
            $cerca = $f_sala->cerca_nel_db($sala['sala']);
        
            if ($cerca[0]['orario1'] == $sala['orario']) {
                return ($cerca[0]['numero_posti']);
            } elseif ($cerca[0]['orario2'] == $sala['orario']) {
                return ($cerca[0]['numero_posti2']);
            } elseif ($cerca[0]['orario3'] == $sala['orario']) {
                return ($cerca[0]['numero_posti3']);
            }
        }
    }
    
    
     /**
     * Questa funzione restituisce, tramite apposite chiamate al database ed al titolo di un film, i dati della sala relativi al film
     * (che quindi è in proiezione).
     * @access public
     * @return array Dati relativi alla sala
     */
    public function RestituisciSalaXfilm($titolo) {
        $f_sala = USingleton::getInstaces('FSala');
        $parametri = array(array(0 => 'titolo_film', 1 => '=', 2 => $titolo));
        $var = $f_sala->cerca_nel_db(NULL, $parametri);
        return $var;
    }
    
    /**
     * Questa funzione permette l'acquisto dei biglietti da parte di un utente. I requisiti per l'aquisto sono che bisogna essere
     * registrati e bisogna aver registrato una carta di credito. Una volta acquistato, se tutto andato a buon fine, sarà inviata
     * una mail all'utente con il riepilogo dell'acquisto. L'email è inviata facendo ausilio delle librerie PHPMAILER.
     * @access public
     * @return mixed
     */    public function inviacquisto() {
        $v_acq = USingleton::getInstaces('VAcquisto');
        $v_gest=  USingleton::getInstaces('VGestione');
        $u_sess = USingleton::getInstaces('USession');
        $f_utente = USingleton::getInstaces('FUtente');
        $f_film=  USingleton::getInstaces('FFilm');
        $f_sala = USingleton::getInstaces('FSala');
        $f_carta = USingleton::getInstaces('FCartaDiCredito');
        $dati_acquisto = $v_acq->getinfoacquisto();
        
        //$codice_film=$dati_acquisto['codice_film'];
        $codice_film=$v_gest->getCodice();
        $cerca=$f_film->cerca_nel_db($codice_film);
        $titolo=$cerca[0]['titolo'];
        $bigliettiacquistati = $dati_acquisto['num_biglietti'];
        $utente = $u_sess->leggi_valore('username');
        $ut = $f_utente->cerca_nel_db($utente);
        $bigliettiutente = $ut[0]['numero_biglietti'];
        $totale = $bigliettiutente + $bigliettiacquistati - $dati_acquisto['omaggio'];
      
        $f_utente->modifica('numero_biglietti', $totale, 'username', $utente);
        $tmsp =  date("d/m/Y");
        

        if ($f_carta->cerca_nel_db(NULL, array(0=>array(0=>'username', 1=>'=', 2=>$utente))) != NULL) {

            //$this->acquistoeffettivo($dati_acquisto);
            //$mail = USingleton::getInstaces('UMail');
            $this->mess_acquisto="Ciao " . $utente . "!\n Ricevuta di pagamento:"."\n -Biglietti/o intero n." . $dati_acquisto['adulto'] ."\n -Biglietti/o ridotto n. " .$dati_acquisto['ridotto']. "\n Per un totale di " . $dati_acquisto['totale'] . " euro"."\n Film: " . $titolo . " nella sala " . $dati_acquisto['codsala'] . "\n Valido per il giorno: " . $tmsp."\n alle ore: ".$dati_acquisto['orario'];
            /*if (!$mail->sendmess($address, "Biglietti", "Ciao " . $utente . "\n Stampa questa e-mail! Vale come " . $bigliettiacquistati . " biglietti per lo spettacolo delle ore: " . $dati_acquisto['orario'] . " nella sala " . $dati_acquisto['codsala'] . " per il film " . $dati_acquisto['titolo'] . "\n Valido per il giorno: " . $tmsp . "\n Lo staff di Cinema On Line")) {
                echo 'errore';
            } else {*/
                $f_utente->modifica('numero_biglietti', $totale, 'username', $utente);
                $cerca = $f_sala->cerca_nel_db($dati_acquisto['codsala']);
                if ($cerca[0]['orario1'] == $dati_acquisto['orario']) {
                    $rimanenza = $cerca[0]['numero_posti'] - $dati_acquisto['num_biglietti'];
                    $f_sala->modifica('numero_posti', $rimanenza, 'id_sala', $dati_acquisto['codsala']);
                } elseif ($cerca[0]['orario2'] == $dati_acquisto['orario']) {
                    $rimanenza = $cerca[0]['numero_posti2'] - $dati_acquisto['num_biglietti'];
                    $f_sala->modifica('numero_posti2', $rimanenza, 'id_sala', $dati_acquisto['codsala']);
                } elseif ($cerca[0]['orario3'] == $dati_acquisto['orario']) {
                    $rimanenza = $cerca[0]['numero_posti3'] - $dati_acquisto['num_biglietti'];
                    $f_sala->modifica('numero_posti3', $rimanenza, 'id_sala', $dati_acquisto['codsala']);
                }
            //}
                $this->bigliettiomaggio($dati_acquisto['omaggio']);
                echo "Grazie per l'acquisto! Controlla la tua e-mail!";
        } else {
            $tplcarta = $v_acq->getcartatpl();
            return $tplcarta;
        }
    }
    
    /**
     * Funzione che permette di calcolare i biglietti omaggio. Ogni 4 biglietti acquistati l'utente
     * ne riceve uno in omaggio. Il calcolo viene effettuato tenendo conto del totale dei biglietti 
     * acquistati presenti sul database.
     * @access public
     * @param type $biglomaggio
     */
    public function bigliettiomaggio($biglomaggio) {
        $mail = USingleton::getInstaces('UMail');
        $f_ut = USingleton::getInstaces('FUtente');
        $u_sess = USingleton::getInstaces('USession');
        $username = $u_sess->getusernamesess();
        $utente = $f_ut->cerca_nel_db($username);
        $address = $utente[0]['email'];
        $num_biglietti = $utente[0]['numero_biglietti'];
        //print_r(floor($num_biglietti/4));
        if (floor($num_biglietti / 4) > 0 || $utente[0]['omaggio']) {
            if (floor($num_biglietti / 4) > 0) {
                $newomaggio = $utente[0]['omaggio'] + floor($num_biglietti / 4) - $biglomaggio;
            } else {
                $newomaggio = $utente[0]['omaggio'];
            }
            if ($mail->sendmess($address, "Biglietti", $this->mess_acquisto . "\nTi ricordiamo che potrai usufruire di " . $newomaggio . " biglietti omaggio al prossimo acquisto!\n Lo staff di Cinema On Line")) {

            if (floor($num_biglietti / 4) > 0) {
                $f_ut->modifica('omaggio', $newomaggio, 'username', $username);
                $rimanenza = $num_biglietti - floor($num_biglietti / 4) * 4;
                $f_ut->modifica('numero_biglietti', $rimanenza, 'username', $username);
            }
            }
        } else {
            $newomaggio = $utente[0]['omaggio'] - $biglomaggio;
            $f_ut->modifica('omaggio', $newomaggio, 'username', $username);

            $mail->sendmess($address, "Biglietti", $this->mess_acquisto);
        }
    }

    
   /**
     * Questa funzione restituisce il numero di omaggi, conservato nel database, che l'utente in sessione ha a disposizione.
     * @access public
     * @return Int numero di omaggi
     */
    public function contabigliettiomaggio() {
    $f_ut=  USingleton::getInstaces('FUtente');
    $u_sess=  USingleton::getInstaces('USession');
    $username=$u_sess->getusernamesess();
    $utente=$f_ut->cerca_nel_db($username);
    $omaggi=$utente[0]['omaggio'];
    return $omaggi;
}


    /**
     * Questa funzione calcola il totale che l'utente dovrà pagare per l'acquisto dei biglietti. Esso tiene in considerazione
     * dei prezzi ridotti, degli omaggi e dei biglietti interi.
     * @access public
     * @return float il totale da pagare
     */
public function preventivo(){
        $v_acq = USingleton::getInstaces('VAcquisto');
        $f_tar=  USingleton::getInstaces('FTariffe');
        $dati_acquisto = $v_acq->getinfoacquisto();
        $cerca = $f_tar->cerca_nel_db('0');
        
        if(count($dati_acquisto)>1){
        $prezzo_intero = $cerca[0]['prezzo_adulto'];
        $prezzo_ridotto = $cerca[0]['prezzo_ridotto'];
        $totale=$dati_acquisto['adulto']*$prezzo_intero + $dati_acquisto['ridotto']*$prezzo_ridotto;
       
        if($dati_acquisto['adulto']>=$dati_acquisto['omaggio']){
            $totale = $totale - $dati_acquisto['omaggio']*$prezzo_intero;
        }else{
            $totale = $totale - $dati_acquisto['adulto']*$prezzo_intero;

            $residuo =$dati_acquisto['omaggio']-$dati_acquisto['adulto'];  
            if($dati_acquisto['ridotto']>=$residuo){
                $totale = $totale - $residuo*$prezzo_ridotto;

            }
            else{
               $totale = $totale - $dati_acquisto['ridotto']*$prezzo_ridotto;
               

            }
         
        }
        
        return $totale;
}
      
}


}
