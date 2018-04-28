<?php

/**
 * 
 * @access public
 * @package Foundation
 */
class FSetup {
    /**
     * costruttore della classe
     */

    public function __construct() {
        
    }

    /**
     * prova a stabilire una connessione con il db, se vi riesce allora
     * tenta di creare il Db e tutte le tabelle di questo. se non vi riesce elimina tutto
     * il db creato e restituisce un errore
     * @param type $conn
     * @return boolean|string
     */
    public function creadb($conn) {
        $connessione = mysql_connect($conn['host'], $conn['userid'], $conn['password']);
        if ($connessione) {
            $stringa_db = "CREATE Database " . $conn['nomedb'];
            if (mysql_query($stringa_db, $connessione)) {
                mysql_select_db($conn['nomedb'], $connessione);
                $tabella_admin = 'CREATE TABLE amministratore( ' .
                        'username VARCHAR(20) NOT NULL, ' .
                        'password VARCHAR(20) NOT NULL, ' .
                        'email VARCHAR(40) NOT NULL, ' .
                        'nome VARCHAR(20) NOT NULL, ' .
                        'cognome VARCHAR(30) NOT NULL, ' .
                        'data_nascita VARCHAR(30) NOT NULL, ' .
                        'PRIMARY KEY ( username ))';

                if (mysql_query($tabella_admin)) {
                    $tabella_utente = 'CREATE TABLE utente( ' .
                            'username VARCHAR(20) NOT NULL, ' .
                            'password VARCHAR(30) NOT NULL, ' .
                            'email VARCHAR(40) NOT NULL, ' .
                            'nome VARCHAR(20) NOT NULL, ' .
                            'cognome VARCHAR(30) NOT NULL, ' .
                            'data_nascita date DEFAULT NULL, ' .
                            'sesso VARCHAR(2) DEFAULT NULL, ' .
                            'numero_biglietti varchar(2) DEFAULT 0, ' .
                            'citta varchar(20) DEFAULT NULL, ' .
                            'provincia varchar(20) DEFAULT NULL, ' .
                            'CAP varchar(5) DEFAULT NULL, ' .
                            'omaggio varchar(2) DEFAULT 0, ' .
                            "stato enum('non attivo','attivo') DEFAULT 'non attivo', " .
                            'PRIMARY KEY ( username ))';
                    if (mysql_query($tabella_utente)) {
                        $tabella_carta = 'CREATE TABLE carta_credito( ' .
                                'username VARCHAR(20) NOT NULL, ' .
                                'numero_carta VARCHAR(30) NOT NULL, ' .
                                'data_scadenza date NOT NULL, ' .
                                'credit_validation_value VARCHAR(4) DEFAULT NULL, ' .
                                'PRIMARY KEY ( username ), ' .
                                'FOREIGN KEY(username) REFERENCES utente(username) ON DELETE CASCADE ON UPDATE CASCADE)';
                        if (mysql_query($tabella_carta)) {
                            $tabella_film = 'CREATE TABLE film( ' .
                                    'titolo varchar(40) NOT NULL, ' .
                                    'autore varchar(30) NOT NULL, ' .
                                    'durata varchar(4) NOT NULL, ' .
                                    'genere varchar(20) NOT NULL, ' .
                                    'codice_film varchar(6) NOT NULL, ' .
                                    'trama varchar(2048) NOT NULL, ' .
                                    'locandina varchar(100) NOT NULL, ' .
                                    'PRIMARY KEY ( codice_film ))';
                            if (mysql_query($tabella_film)) {
                                $tabella_commento = 'CREATE TABLE commento( ' .
                                        'id_commento int(6) NOT NULL AUTO_INCREMENT, ' .
                                        'codice_film varchar(40) NOT NULL, ' .
                                        'commento varchar(2048) NOT NULL, ' .
                                        'voto int(1) DEFAULT 0, ' .
                                        'PRIMARY KEY (id_commento), ' .
                                        'FOREIGN KEY (codice_film) REFERENCES film(codice_film) ON DELETE CASCADE ON UPDATE CASCADE)';
                                if (mysql_query($tabella_commento)) {
                                    $tabella_sala = 'CREATE TABLE sala( ' .
                                            'id_sala varchar(5) NOT NULL, ' .
                                            'codice_film varchar(40), ' .
                                            'numero_posti int(3) DEFAULT 150, ' .
                                            'numero_posti2 int(3) DEFAULT 150, ' .
                                            'numero_posti3 int(3) DEFAULT 150, ' .
                                            'titolo_film varchar(30) NOT NULL, ' .
                                            'orario1 time, ' .
                                            'orario2 time, ' .
                                            'orario3 time, ' .
                                            'PRIMARY KEY(id_sala), ' .
                                            'FOREIGN KEY (codice_film) REFERENCES film(codice_film) ON DELETE SET NULL ON UPDATE CASCADE)';
                                    if (mysql_query($tabella_sala)) {
                                        $tabella_tariffe = 'CREATE TABLE tariffe( ' .
                                                'id_tariffa int(1) NOT NULL DEFAULT 0, ' .
                                                'prezzo_adulto varchar(5) NOT NULL, ' .
                                                'prezzo_ridotto varchar(5) NOT NULL, ' .
                                                'PRIMARY KEY (id_tariffa))';
                                        if (mysql_query($tabella_tariffe)) {
                                            return TRUE;
                                        } else {
                                            echo mysql_error();
                                            $drop_db = "DROP Database " . $conn['nomedb'];
                                            mysql_query($drop_db);
                                            return FALSE;
                                        }
                                    } else {
                                        echo mysql_error();
                                        $drop_db = "DROP Database " . $conn['nomedb'];
                                        mysql_query($drop_db);
                                        return FALSE;
                                    }
                                } else {
                                    echo mysql_error();
                                    $drop_db = "DROP Database " . $conn['nomedb'];
                                    mysql_query($drop_db);
                                    return FALSE;
                                }
                            } else {
                                echo mysql_error();
                                $drop_db = "DROP Database " . $conn['nomedb'];
                                mysql_query($drop_db);
                                return FALSE;
                            }
                        } else {
                            echo mysql_error();
                            $drop_db = "DROP Database " . $conn['nomedb'];
                            mysql_query($drop_db);
                            return FALSE;
                        }
                    } else {
                        echo mysql_error();
                        $drop_db = "DROP Database " . $conn['nomedb'];
                        mysql_query($drop_db);
                        return FALSE;
                    }
                } else {
                    echo mysql_error();
                    $drop_db = "DROP Database " . $conn['nomedb'];
                    mysql_query($drop_db);
                    return FALSE;
                }
            } else {
                echo mysql_error();
                $drop_db = "DROP Database " . $conn['nomedb'];
                mysql_query($drop_db);
                return FALSE;
            }
        } else {
            echo mysql_error();
            $drop_db = "DROP Database " . $conn['nomedb'];
            mysql_query($drop_db);
            return FALSE;
        }
    }

    
}


