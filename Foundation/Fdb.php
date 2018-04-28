<?php
/**
 * La superclasse Fdb si occupa dell'interazione con il database.
 * @author Luca & Valentina
 * @package Foundation
 * @category Fdb
 */
class Fdb {

    /**
     * @access protected 
     */
    protected $connection;
    protected $result = array();
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    protected $tabella;
    protected $chiave_tabella;

    /**
     * il costruttore istanzia la classe config. configdb è un array contenente la configurazione del database.
     * @author Luca & Valentina
     */
    public function __construct() {
        $config = USingleton::getInstaces('config');
        $configdb = $config->get_dbconfig();
        $this->connessione($configdb['host'], $configdb['username'], $configdb['password'], $configdb['dbname']);
    }

      /**
     * il metodo connessione si preoccupa della connessione al database.
     * verifica che la connessione sia avvenuta correttamente. In caso di mancata
     * connessione restituisce un errore 
     * @param string $host indirizzo dell'host
     * @param string $user username d'accesso
     * @param string $password password d'accesso
     * @param string $database nome del database
     * @access public
     */
    public function connessione($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connection = mysql_connect($host, $user, $password);
        if ($this->connection == FALSE) {
            echo ("Errore mysql: " . mysql_error());
        }
        $selected_db = mysql_select_db($this->database, $this->connection);
        if (!$selected_db) {
            die('Impossible selezionare il database ' . mysql_error());
        }
    }

    /**
     * Data una query in ingresso, del tipo SELECT, la funzione si occupa di eseguirla e di inserire
     * il risultato in un array associativo. Restituisce l'array se ci sono dei risultati FALSE altrimenti
     * @access public
     * @param mixed $query la query da eseguire (in linguaggio MySQL)
     * @return boolean|array risulato della query
     */
    public function interroga_db($query) {
        $result = mysql_query($query) or die("Impossibile effettuare le query" . mysql_error());
        $i = 0;
        $a=array();
        while ($i < mysql_num_rows($result)) {
            $result_query = mysql_fetch_assoc($result);
            $a[$i]=$result_query;
            //$this->result[$i] = $result_query;
            $i++;
        }
        
        $this->result=$a;
        if (count($this->result) != 0) {
            return $this->result;
        } else {
            return FALSE;
        }
    }
     
      /**
     * La funzione si occupa di restituire l'elenco di tutti i film presenti nel database
     * @access public
     * @return boolean|array Film presenti nel database
     */
    public function elenco() {
        //$query="SELECT * FROM '".$tabella."'";
        $query = "SELECT * FROM `film`";
        return $this->interroga_db($query);
    }

    
    /**
     * Chiude la connnessione con il server usando metodi nativi di php
     */
    public function chiudi_connessione() {
        mysql_close($this->connection);
    }

    /**
     * questa funzione permette di inserire una riga nel database. 
     * gli passiamo oggetto (registra.js) viene da inserisciutente in futente
     * @access public
     * @param type $oggetto
     * @return boolean|array
    * 
     */
    public function inserisci($oggetto) {
        $valori = '';
        $campi = '';
        $i = 0;
        foreach ($oggetto as $key => $value) {
            if ($i > 0) {
                $campi .= ',';
                $valori .=',';
            }
            $keyval = mysql_escape_string($key);
            $valueval=mysql_escape_string($value);
            $campi .= "$keyval";
            $valori .= "'$valueval'";
            $i++;
        }
        $query = "INSERT INTO $this->tabella ($campi) VALUES ($valori);";
        echo $query;


        return $this->interroga_db($query);
    }
    
 /**
     * Questa funzione si occupa di eseguire una modifica ad una tupla di una tabella del database
     * @access public
     * @param String $campo nome campo da modificare
     * @param String $variabile valore nuovo da inserire
     * @param String $chiave nome della chiave primaria
     * @param String $valorechiave valore della chiave primaria
     * @return Boolean TRUE se eseguita correttamente FALSE altrimenti
     */
    public function modifica($campo, $variabile, $chiave, $valorechiave) {
       $variabile=  addslashes($variabile);
       $sql = "UPDATE `".$this->tabella."` SET `".mysql_escape_string($campo)."`='".mysql_escape_string($variabile)."' WHERE `".mysql_escape_string($chiave)."`='".mysql_escape_string($valorechiave)."'";
       return $this->esegui_modifica($sql);
    }
    

    
   
/**
     * Questa funzione esegue l'effettiva modifica di una tupla di una tabella del database
     * @access private
     * @param String $query la query di modifica da eseguire (in MySQL)
     * @return boolean TRUE se andata a buon fine FALSE altrimenti
     */
    private function esegui_modifica($query) {
        $this->result = mysql_query($query) or die("Impossibile effettuare le query" . mysql_error());
        if (!$this->result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Questa funzione fa una INSERT nel database
     * @access public
     * @param array $dati_form array associativo con i dati da inserire
     * @return null|Boolean TRUE se l'inserimento è andato a buon fine FALSE altrimenti
     */
    public function carica_riga($dati_form = NULL) {
        if ($dati_form != NULL) {

            $i = 0;
            $chiave = "";
            $valore = "";
            foreach ($dati_form as $key => $value) {

                if ($i == 0) {
                    
                    $chiave.=" " . mysql_escape_string($key) . " ";
                    $valore.=" " . "'" . mysql_escape_string($value) . "'" . " ";
                } else {

                    $chiave.=", " . mysql_escape_string($key) . " ";
                    $value = addslashes($value);
                    $valore.=", " . "'" . mysql_escape_string($value) . "'" . " ";
                }
                $i++;
            }

            $query = "INSERT INTO " . $this->tabella . " (" . $chiave . ") " . " VALUES (" . $valore . ")";
        } else {
            return NULL;
        }

        $esito = $this->esegui_modifica($query);
        return $esito;
    }

  /**
     * Questa funzione si occupa di eseguire una DELETE in base alla chiave primaria
     * @access public
     * @param string $var valore della chiave primaria
     * @return boolean TRUE se andata a buon fine FALSE altrimenti
     */
    public function elimina_riga($var) {
        $sql = "DELETE FROM `".$this->tabella."` WHERE `".$this->chiave_tabella."`='".mysql_escape_string($var)."'";
        
        $esito = $this->esegui_modifica($sql);
        return $esito;
    }
    
     /**
     * Questa funzione restituisce gli indirizzi email di tutti gli utenti registrati presenti nel database in un array associativo
     * @access public
     * @return Boolean|array tutti gli indirizzi email
     */
public function restituisci_indirizzi(){
    $sql = "SELECT `email` FROM `utente`";
    $result = $this->interroga_db($sql);
    return $result;
}

 /**
     * Questa funzione esegue una ricerca nel database che può essere in base alla chiave primaria o in base
     * a dei parametri passati del tipo: $parametri=array([0]=>(0 => nome, 1 => =, 2 => luca)[1]=>(0=>'cognome',1=>'=', 2=>'di vita')).
     * La precedenza è data alla chiave primaria nel senso che anche inserendo i valori sia di chiave primaria sia dei parametri questi ultimi
     * vengono ignorati. Se entrambi non vengon inseriti la funzione restituisce tutti i valori della tabella.
     * @param string $valore_chiave_primaria valore della chiave primaria
     * @param array $parametri parametri di ricerca
     * @return boolean|array risultati della query se ve ne sono. False altrimenti
     */
    public function cerca_nel_db($valore_chiave_primaria = NULL, $parametri = array()) {
        //print_r($parametri);
        //$condizioni=array($condizioni);LASCIARE COSI PER FAVORE--->TI SPIEGHERO A VOCE
        
        $query = 'SELECT * FROM ' . $this->tabella . ' ';
        if ($valore_chiave_primaria != NULL) {
            $query .= 'WHERE ' . $this->chiave_tabella . " = " . "'" . mysql_escape_string($valore_chiave_primaria) . "'";
        } elseif ($parametri != NULL) {
            $filtro = "";
            for ($i = 0; $i < count($parametri); $i++) {
                if ($i > 0) { //Alla prima iterazione non entra nell'if
                    $filtro = $filtro . " AND";
                }
                $filtro = $filtro . " " . mysql_escape_string($parametri[$i][0]) . " " . $parametri[$i][1] . " " . "'" . mysql_escape_string($parametri[$i][2]) . "'";
            } /* Del tipo nome = Luca AND cognome = Di Vita
              $parametri=(array(0 => nome, 1 => =, 2 => luca))--->e un elemento.
              Se si inserisce un altro array sono due [array(0=>'cognome',1=>'=', 2=>'di vita') e cosi via */
            $query = $query . 'WHERE ' . $filtro . ' ';
           
            }
        //echo $query;//SE INTERESSATA SCOMMENTA E VEDI LA QUERY COMPLETATA
        $result = $this->interroga_db($query);
        
       return $result;
    }

}

