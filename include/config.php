<?php


class config {

    private $smartyconfig;
    private $dbconfig;
    private $emailconfig;

    public function __construct() {
        $this->set_smartyconfig();
        $this->set_dbconfig();
        $this->set_emailconfig();
    }
   
        public function get_emailconfig(){
        return $this->emailconfig;
    }

    public function get_smartyconfig() {
        return $this->smartyconfig;
    }

    public function get_dbconfig() {
        return $this->dbconfig;
    }
    
    public function set_smartyconfig() {
        $this->smartyconfig['template_dir'] = './smarty/smarty-dir/templates/';
        $this->smartyconfig['compile_dir'] = './smarty/smarty-dir/templates_c/';
        $this->smartyconfig['config_dir'] = './smarty/smarty-dir/configs/';
        $this->smartyconfig['cache_dir'] = './smarty/smarty-dir/cache/';
    }

    

//TRONCARE QUI (NON INSERIRE PARENTESI) SERVE PER L'INIZIALIZZAZIONE DEL FILE CONF


    public function set_dbconfig() {
$this->dbconfig['username'] ='root';
$this->dbconfig['password'] ='';
$this->dbconfig['host'] ='localhost';
$this->dbconfig['dbname'] ='patatino';
}

public function set_emailconfig(){
$this->emailconfig['header']= 'From:MovieCinema <moviecinema@altervista.org>';
$this->emailconfig['host']='';
$this->emailconfig['SMTPSecure']='tls';
$this->emailconfig['port']=465;
$this->emailconfig['SMTPAuth']=TRUE;
$this->emailconfig['username']='';
$this->emailconfig['password']='';
$this->emailconfig['from']='';
$this->emailconfig['fromname']='MovieCinema';
}
}