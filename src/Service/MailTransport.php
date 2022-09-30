<?php
namespace Juliangorge\Mail\Service;

use Laminas\Mail\Message;
use Laminas\Mail\Transport\Smtp;
use Laminas\Mail\Transport\SmtpOptions;
use Laminas\Mail\Transport\TransportInterface;

class MailTransport implements TransportInterface
{

    private $transport;

    public function __construct($config)
    {
        $this->transport = new Smtp();

        $options = new SmtpOptions([
            'name' => $config['mail_host'],
            'host' => $config['mail_host'],
            'port' => $config['mail_port'],
            'connection_class' => 'login',
            'connection_config' => [
                'username' => $config['mail_username'],
                'password' => $config['mail_password'],
                'ssl'      => $config['mail_smtpsecure'],
                
            ],
        ]);

        $this->transport->setOptions($options);
    }

    public function send(Message $message)
    {
        $this->transport->send($message);
    }
}