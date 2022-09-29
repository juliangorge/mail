<?php 
namespace Juliangorge\Mail;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{

	protected $mail;

	public function __construct(array $config)
	{
		$this->mail = new PHPMailer(true);
	    $this->mail->isSMTP();
	    $this->mail->isDebug = $config['mail_debug'];
	    $this->mail->Host = $config['mail_host'];
	    $this->mail->SMTPAuth = true;
	    $this->mail->Username = $config['mail_username'];
	    $this->mail->Password = $config['mail_password'];
	    $this->mail->SMTPSecure = $config['mail_smtpsecure'];
	    $this->mail->Port = $config['mail_port'];
	    $this->mail->CharSet = $config['mail_charset'];
	    $this->mail->setFrom($config['mail_from'], $config['mail_name']);

	    return $this;
	}

	public function setFrom($from, $name)
	{
	    $this->mail->setFrom($mail_from, $mail_name);
	}


	public function send($email, $title, $body, $returnErrors = true)
	{
		if($returnErrors){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				throw new \Exception('Invalid email: "' . $email . '"');
			}

			if($title == NULL){
				throw new \Exception('Invalid title: "' . $title . '"');
			}

			if($body == NULL){
				throw new \Exception('Invalid body: "' . $body . '"');
			}
		}

		try {
            $this->mail->addAddress($email);
            $this->mail->isHTML(true);
            $this->mail->Subject = $title;
            $this->mail->Body    = $body;
            $this->mail->AltBody = html_entity_decode($body);
            $this->mail->send();
            $this->mail->clearAllRecipients();
        } catch (\Throwable $e) {
        	if($returnErrors) throw new \Exception($e->getMessage());
        }
	}

}