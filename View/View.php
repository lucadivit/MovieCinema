<?php/** * Questa classe è superclasse di tutte le classi del package View. Le View si occupano dell'interazione con gli utenti finali. * @author Luca & Valentina * @package View * @category View */require('./smarty/smarty-libs/Smarty.class.php');class View extends Smarty {    private $errList; /**     * Costruttore della classe View.     * @access public     */    public function __construct() {        parent::__construct();        $config = USingleton::getInstaces('config');        $smartyconfig = $config->get_smartyconfig();        $this->template_dir = $smartyconfig['template_dir'];        $this->compile_dir = $smartyconfig['compile_dir'];        $this->config_dir = $smartyconfig['config_dir'];        $this->cache_dir = $smartyconfig['cache_dir'];        $this->caching = false;    }    /**     * Questa funzione restituisce il valore del controllore     * @access public     * @return boolean|String valore del controllore     */     public function getController(){        if (isset ($_REQUEST['controller'])) {            return $_REQUEST['controller'];        }        else{        return FALSE;    }     } /**     * Questa funzione restituisce il valore del task     * @access public     * @return boolean|String valore del task     */     public function getTask(){        if (isset ($_REQUEST['task'])) {            return $_REQUEST['task'];        }        else{        return FALSE;    }     }          /**     * Questa funzione fa uso del metodo "fetch" delle librerie smarty per prelevare e restituire il template specificato     * @param string $tpl template da prelevare     * @access public     * @return mixed template prelevato     */    public function processaTemplate($tpl) {        $contenuto=$this->fetch($tpl.'.tpl');        return $contenuto;    }/**     * Questa funzione fa uso del metodo "assign" delle librerie smarty, per assegnare al template delle variabili     * @access public     * @param String $reference nome della variabile richiamabile nel template     * @param mixed $data datti effettivi da passare al template     */    public function impostaDatiTemplate($reference, $data){        $this->assign($reference, $data);    }/**     * Questa funzione fa uso del metodo "display" delle librerie smarty per visualizzare il template specificato     * @access public     * @param String $tpl template da visualizzare     */    public function set_template($tpl){        $this->display($tpl.'.tpl');    }}