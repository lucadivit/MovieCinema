<?php
/**
 * Le classi View permettono l'interazione con l'utente in particolare VAcquisto si occupa di ciò che concerne la sezione dell'acquisto.
 * Estende la classe View
 *
 * @author Luca & Valentina
 * @package View
 * @category Acquisto
 */
class VAcquisto extends View{
   /**
     * Questa funzione imposta e stampa su schermo il template con le tariffe del cinema. Fa uso di librerie smarty
     * @access public
     * @return mixed template tariffe
     */
     public function impostapaginatariffe() {
        $c_acq=  USingleton::getInstaces('CAcquisto');
        $tariffe=$c_acq->prelevatariffe();
        
        $this->assign('adulto', $tariffe[0]['prezzo_adulto']);
        $this->assign('ridotto', $tariffe[0]['prezzo_ridotto']);
        $tpl=  $this->fetch('./smarty/smarty-dir/templates/Visualizza_Tariffe.tpl');
        return $tpl;
    }
    
    
    /**
     * Questa funzione imposta e stampa su schermo il template per l'acquisto dei biglietti.
     * @access public
     * @return mixed template d'acquisto
     */
    public function impostaPaginaDiAcquisto() {
       $v_gest=  USingleton::getInstaces('VGestione');
       $c_gest=  USingleton::getInstaces('CGestione');
        $c_acq=  USingleton::getInstaces('CAcquisto'); 
        $codice=$v_gest->getCodice();
        $ricerca=$c_gest->ricercafilm($codice);
        $titolo=$ricerca[0]['titolo'];
        $datisala=$c_acq->RestituisciSalaXfilm($titolo);
        $posti=$c_acq->calcolaposti();
       
        $omaggi=$c_acq->contabigliettiomaggio();
        $preventivo=$c_acq->preventivo();
        $this->assign('codice', $codice);
        $this->assign('omaggi', $omaggi);
        $this->assign('Titolo', $titolo);
        $this->assign('spettacolo1', $datisala[0]['orario1']);
        $this->assign('spettacolo2', $datisala[0]['orario2']);
        $this->assign('spettacolo3', $datisala[0]['orario3']);
        $this->assign('sala', $datisala[0]['id_sala']);
        $this->assign('posti', $posti);
        $this->assign('preventivo', $preventivo);
        $this->assign('numposti', $datisala[0]['numero_posti']);
        $tpl1 = $this->fetch('./smarty/smarty-dir/templates/Acquisto_biglietti.tpl');
        return $tpl1;
    }
    
    
     /**
     * Questa funzione si occupa di prelevare le informazioni relative ad una sala.
     * In particolare orario e numero di sala.
     * @access public
     * @return array informazioni della sala
     */
     public function getinfosala() {
        $dati_richiesti = array('orario', 'sala');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
  
    
    /**
     * Questa funzione si occupa di prelevare le informazioni relative all'acquisto.
     * In particolare: orario, numero biglietti, codice sala, titolo del film in proiezione, prezzo ridotto, prezzo intero, omaggio, totale.
     * @access public
     * @return array informazioni acquisto
     */
    public function getinfoacquisto() {
        $dati_richiesti = array('orario', 'num_biglietti', 'codsala', 'titolo', 'ridotto', 'adulto', 'omaggio', 'totale');
        $dati_form = array();
        foreach ($dati_richiesti as $key) {
            if (isset($_REQUEST[$key]))//Verifica se nella REQUEST e presente la voce corrispondente alla chiave in dati_richiesti
                $dati_form[$key] = $_REQUEST[$key]; //$dati_form prende le chiavi di $dati_richiesti e i valori corrispondenti le chiavi dalla $REQUEST
        }
        return $dati_form;
    }
  
    
    /**
     * 
     * 
     * @return type
     */
  public function getcartatpl(){
      $v_reg=  USingleton::getInstaces('VRegistrazione');
      $dati=$v_reg->getDatiRegistrazioneCartaValidi('logacq');
if(!$dati){
    return $dati;
}else{
    
    $f_carta=  USingleton::getInstaces('FCartaDiCredito');
                $f_carta->carica_riga($dati);
    
                 return $this->impostaPaginaDiAcquisto();
               

}
    }
}
