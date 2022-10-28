<?php
namespace Juliangorge\Mail\Plugin;

use Laminas\Mvc\Controller\Plugin\AbstractPlugin;
use Juliangorge\Mail\Mail;

class MailPlugin extends AbstractPlugin 
{

    protected $mail;

    public function __construct($config){
        $this->mail = new Mail($config);
    }

    public function setFrom($from, $name){
        return $this->mail->setFrom($from, $name);
    }

    public function send($email, $title, $body, $returnErrors = true){
        return $this->mail->send($email, $title, $body, $returnErrors);
    }

}