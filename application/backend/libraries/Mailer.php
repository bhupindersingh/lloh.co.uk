<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mailer{
	function __construct() {
            log_message('debug', "Phpmailer Class Initialized.");           
	}
	public function send_email($recipient,$sender_name, $sender, $subject, $message)
	{
		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$body = $message;
		$mail->IsSMTP();
		$mail->Host = 'mail.lloh.co.uk';  // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'admin@lloh.co.uk';                            // SMTP username
		$mail->Password = 'zH9GFmx/7'; 
		$mail->FromName = $sender_name;
		$mail->From = $sender;
		$mail->Subject = $subject;
		$mail->AltBody = strip_tags($message);
		$mail->MsgHTML($body);
		$mail->AddAddress($recipient);
		if ( ! $mail->Send())
		{
			 echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else
		{
			echo 'Mail Sent';
		}
	}
}