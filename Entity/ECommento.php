<?php/** * @author Luca & Valentina * @package Entity * @category Commento */class ECommento {       /**     *@access private     */    private $id_commento;    private $codice_film;    private $commento;    private $voto;     /**     * Restituisce l' ID del commento che è un numero progressivo     * @access public     * @return Int numero di commento     */     public function getId() {        return $this->id_commento;    }     /**     * Restituisce il codice del film     * @access public     * @return String codice del film     */    public function getCodiceF() {        return $this->codice_film;    }        /**     * Imposta il codice del film     * @access public     * @param String $codice_film codice del film     */     public function setCodiceF($codice_film){        $this->codice_film=$codice_film;    }     /**     * Restituisce il commento del film     * @access public     * @return String il commento del film     */   public function getCommento() {        return $this->commento;    }         /**     * Imposta un commento del film     * @access public     * @param String $commento commento del film     */     public function setCommento($commento){        $this->commento=$commento;    }        /**     * Restituisce il voto del film     * @access public     * @return Int voto del film     */    public function getVoto() {        return $this->voto;    }         /**     * Imposta un voto al film     * @access public     * @param Int $voto il voto al film     */     public function setVoto($voto){        $this->voto=$voto;    }}