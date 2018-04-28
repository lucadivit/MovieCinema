<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VGesioneSale
 *
 * @author Luca
 */
class VGesioneSale extends View {

    private $numeroSale = 5;
    private $error_msg = array('film' => 'Non è stato trovato alcun film con il codice inserito.', 'sala' => 'La sala è gia occupata');
    private $dati_errati = array();

    //put your code here

    public function getImpostazioniSala() {
        $datiForm = $this->ImpostazioniSala();
        $this->validazioneFilm($datiForm);
        $this->validazioneSala($datiForm);
        if (in_array('TRUE', $this->dati_errati)) {
            $this->impostaProiezioneError();
        } else {
            return $datiForm;
        }
    }

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

    public function estraiDatiSalaDalDB() {
        $c_gest = USingleton::getInstaces('CGestione');
        $dati = $c_gest->datiSala();
        return $dati;
    }

    public function ImpostaDatiInSala() {
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
        return $this->processaTemplate('Imposta_film_sala');
    }

    public function getIDSala() {
        if (isset($_REQUEST['id_sala'])) {
            $IDSala = $_REQUEST['id_sala'];
            return $IDSala;
        } else {
            return NULL;
        }
    }

    //VALIDAZIONI PER SALE
    public function impostaProiezioneError() {
        $elenco_film = $this->estraiFilmDalBD();
        $datiFilmInSala = $this->estraiDatiSalaDalDB();
        $elenco_titoli = array();
        $elenco_codici = array();
        $i = 0;
        foreach ($elenco_film as $elenco_film) {
            $elenco_titoli[$i] = $elenco_film['titolo'];
            $elenco_codici[$i] = $elenco_film['codice_film'];
            $i++;
        }
        $this->impostaDatiTemplate('datiFilm', $datiFilmInSala);
        $this->impostaDatiTemplate('elenco_codici', $elenco_codici);
        $this->impostaDatiTemplate('elenco_titoli', $elenco_titoli);
        $this->impostaDatiTemplate('numeroSale', $this->numeroSale);
        $this->impostaDatiTemplate('error_msg', $this->error_msg);
        $this->impostaDatiTemplate('dati_errati', $this->dati_errati);
        return $this->set_template('Imposta_film_sala_error');
    }

    public function validazioneSala($datiSala) {
        $c_gest = USingleton::getInstaces('CGestione');
        if (!$c_gest->controllaSala($datiSala)) {
            $this->dati_errati['sala'] = 'FALSE';
        } else {
            $this->dati_errati['sala'] = 'TRUE';
        }
    }

    public function validazioneFilm($datiSala) {
        $c_gest = USingleton::getInstaces('CGestione');
        if ($c_gest->controllaFilm($datiSala)) {
            $this->dati_errati['film'] = 'FALSE';
        } else {
            $this->dati_errati['film'] = 'TRUE';
        }
    }

}
