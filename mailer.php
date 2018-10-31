<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->Host = 'smtp.gmail.com';
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = 'djokogo@gmail.com';
	$mail->Password = '*****';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->Subject='Account Verification';
	$mail->addAddress($email);
	$mail->Body='
	Thank you for signing up.
	Your account has been created you will be able to access our services after you activate your account.
	Click the link below to activate your account.
	Please click the link to activate your account:
	http://localhost/peer-lending/verifyemail.php?email='.$email.'&hash='.$hashed.'';
	$mail->setFrom("noreply@strathfund.com","STRATHFUND");
	if(!$mail->send()){
		$error = "<p>Unable to send verification email. Please check your inputs and try again</p>";
	}
	else{
		$alert ="<p>Your activation link has been sent to your email. Please activate your account to enable you to log in<p>";
	}
?>
