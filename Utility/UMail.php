<?php

/**
 * @author Luca & Valentina
 * @package Utility
 * @category Mail
 */
class UMail {

    /**
     * @access private
     * @var type 
     */
    private $messaggio;

    /**
     * costruttore della classe umail
     *  @access public
     */
    public function __construct() {
        $messaggio = USingleton::getInstaces('PHPMailer');
        $config = USingleton::getInstaces('config');
        $configemail = $config->get_emailconfig();
        $messaggio->CharSet = "ISO-8859-1"; //Set the character set you need to specify
        //$messaggio->SMTPDebug = 4;
        $messaggio->Port = $configemail['port'];
        $messaggio->SMTPSecure = $configemail['SMTPSecure'];
        $messaggio->IsSMTP();
        $messaggio->Host = $configemail['host'];
        $messaggio->SMTPAuth = $configemail['SMTPAuth'];
        $messaggio->Username = $configemail['username'];
        $messaggio->Password = $configemail['password'];
//definiamo le intestazioni e il corpo del messaggio
        $messaggio->From = $configemail['from'];
        $messaggio->FromName = $configemail['fromname'];
        $this->messaggio = $messaggio;
    }

    /**
     * Permette l'invio delle e-mail
     * @param type $destinatario
     * @param type $oggetto
     * @param type $body
     * @return type
     */
    public function sendmess($destinatario, $oggetto, $body) {

        $this->messaggio->AddAddress($destinatario,'');
//$messaggio->AddReplyTo('missystaff@hotmail.it'); 
        $this->messaggio->Subject = $oggetto;
        $this->messaggio->Body = stripslashes($body);

//chiudiamo la connessione
        $this->smtpclose();

        return  $this->messaggio->Send();
    }

    
    /**
     * chiude la connessione smtp
     */
    public function smtpclose() {
        $this->messaggio->SmtpClose();
    }
}
