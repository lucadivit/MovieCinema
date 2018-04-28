<?php


/**
 * CSetup si occupa di gestire le "funzionalità di installazione" permettendo, la prima volta che si avvia il progetto, di "installarlo" registrando un 
 * amministratore. I metodi della seguente classe vengono eseguiti una ed una sola volta.
 * @author Luca & Valentina
 * @package Controller
 * @category Setup
 */
class CSetup {



    /**

     * Imposta l'home per l'installazione dell'applicazione
     * @author Luca & Valentina

     */

    public function set_page() {
        $contenuto = $this->smista();
        echo $contenuto;

    }
    
    /**
     * Questo metodo smista i vari controller per l'installazione
     * @access public
     * @return mixed template di installazione
     */
     public function smista() {
        $v_set = USingleton::getInstaces('VSetup');
        switch ($v_set->getController()) {
            case 'RegistrazioneAdmin':
                return $this->CreaAdmin();
                break;
            case 'ImpostaTariffe':
                return $this->ImpostaTariffe();
                break;
            case 'Benvenuto':
                return $this->benvenuto();
                break;
            case 'passodue':
                return $this->passodue();
                break;
            default:
                return $v_set->impostapaginapasso1();
                break;
            
        }
    }
    
    /**
     * Dopo aver creato il database, questa funzione indirizza l'amministratore
     * alla pagina relativa alla registrazione dell'amministratore principale
     * @return boolean
     */
    public function passodue() {
                $v_set = USingleton::getInstaces('VSetup');
                $f_set=  USingleton::getInstaces('FSetup');
                $dati=$v_set->getDatiDB();
                $db=$f_set->creadb($dati);
                if($db){
                    //file di configurazione
                    $this->setconfig($dati);
                    
                    return $v_set->impostapaginapasso2();
                }else{
                  return false;  
                }
               
                
                 
                //$v_set->impostapaginapasso2();
    }
    
    /**
     * Funzione che permette di creare il file di configurazione
     * @param type $dati
     */
    public function setconfig($dati) {

        $file = fopen('./include/test.php', 'r+');
            //ricorda di cancellare le ultime righe in test.php
        fread($file, filesize('./include/test.php') - 2);
        $metodo_set = "public function set_dbconfig() {\n" .
                "$" . "this->dbconfig['username'] ='".$dati['userid']."';\n" .
                "$" . "this->dbconfig['password'] ='" .$dati['password']."';\n" .
                "$" . "this->dbconfig['host'] ='".$dati['host']."';\n" .
                "$" . "this->dbconfig['dbname'] ='".$dati['nomedb']."';\n" .
                "}\n" .
                "\npublic function set_emailconfig(){\n" .
                "$" . "this->emailconfig['header']= 'From:MovieCinema <moviecinema@altervista.org>';\n" .
                "$" . "this->emailconfig['host']='".$dati['hostmail']."';\n".
                "$" . "this->emailconfig['SMTPSecure']='tls';\n".
                "$" . "this->emailconfig['port']=465;\n".
                "$" . "this->emailconfig['SMTPAuth']=TRUE;\n".
                "$" . "this->emailconfig['username']='".$dati['usermail']."';\n".
                "$" . "this->emailconfig['password']='".$dati['passmail']."';\n".
                "$" . "this->emailconfig['from']='".$dati['usermail']."';\n".
                "$" . "this->emailconfig['fromname']='MovieCinema';\n".
                "}\n" .
                "}";

        fputs($file, $metodo_set);
        fclose($file);
        rename('./include/test.php','./include/config.php');
    }

    
    /**
     * Questo metodo permette di creare l'amministratore principale
     * @access public
     * @return template di installazione successivo
     */
    public function CreaAdmin(){
        $v_set=  USingleton::getInstaces('VSetup');
        $f_amm=  USingleton::getInstaces('FAmministratore');
        
        $dati_estratti=$v_set->getDatiAdminValidi();
        unset($dati_estratti['password_1']);
        if($dati_estratti){
            $f_amm->carica_riga($dati_estratti);
            
        }
        return $v_set->impostapasso3();
        
        
    }
    
    
    /**
     * Questo metodo permette di impostare le tariffe. Esse potranno comunque essere modificate dall'amministratore dopo il login.
     * @access public
     * @return mixed template di installazione successivo
     */
    public function ImpostaTariffe() {
        $v_set=  USingleton::getInstaces('VSetup');
        $f_tar=  USingleton::getInstaces('FTariffe');
        $tariffe=$v_set->getTariffe();
        $cerca=$f_tar->cerca_nel_db('0');
        if(!$cerca){
            $f_tar->carica_riga($tariffe);
        }else{
        $inserimento=array('prezzo_adulto', 'prezzo_ridotto');
        $inserimento['prezzo_adulto']=$f_tar->modifica('prezzo_adulto', $tariffe['prezzo_adulto'], 'id_tariffa', '0');
        $inserimento['prezzo_ridotto']=$f_tar->modifica('prezzo_ridotto', $tariffe['prezzo_ridotto'], 'id_tariffa', '0');
        
        
        }
    return $v_set->impstapassofinale();
    }
    
    /**
     * Ultimo passo dell'installazione che prevede una conferma tramite l'invio di un'e-mail.
     * @return boolean
     */
    public function benvenuto() {
            
        $u_mail=  USingleton::getInstaces('UMail');
        $f_amm=  USingleton::getInstaces('FAmministratore');
               $nome_file_ok='index.php';
               unlink($nome_file_ok);
               rename('index1.php', 'index.php');
               $ad=$f_amm->cerca_nel_db();
               $indirizzo=$ad[0]['email'];
               if(!$u_mail->sendmess($indirizzo, 'Installazione', "Benvenuto".$ad[0]['username']."\n l'installazione è stata completata! Per qualsiasi problema rivolgersi a luca.di.vita@hotmail.it e valentina_dorazio@virgilio.it")){
                     echo "ERRORE INVIO.";
                   }
               return true;               

    }
    
    
}