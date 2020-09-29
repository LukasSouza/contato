<?php
namespace App;

class Mail{
    private $sender;
    private $receiver;
    private $subject;
    private $message;
    private $headers;

    public function __construct($sender, $receiver, $subject, $message){
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->subject = $subject;
        $this->message = $message;
    } 

    public function __set($atribute, $value)
    {
        $this->$atribute = $value;
    }
 
    public function send(){
        $eol = PHP_EOL;
        $this->headers = "
            From: Teste Contato <".$this->sender.">". $eol."
            Reply-To: <".$this->sender. ">" . $eol . "
            Return-Path: ".$this->sender."". $eol."
            MIME-Version: 1.0". $eol."
            X-Priority: 3". $eol."
            Content-type: text/html;". $eol." 
            charset=utf-8". $eol;

        return mail($this->receiver, $this->subject, $this->message, $this->headers);
    }

} 