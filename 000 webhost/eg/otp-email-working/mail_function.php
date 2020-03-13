<?php	
	// function sendOTP($email,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
		$email="rabinphaiju15@gmail.com";
		$otp="2346";
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "587";
		$mail->Username = "karmacharyasuraj2@gmail.com";
		$mail->Password = "khwopa75";
		$mail->Host     = "smtp.gmail.com";
		$mail->Mailer   = "smtp";
		$mail->SetFrom("karmacharyasuraj2@gmail.com", "web");
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	// }
?>