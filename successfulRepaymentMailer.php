<?php
    session_start();
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->Host = 'smtp.gmail.com';
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = 'djokogo@gmail.com';
	$mail->Password = '0722354043Mum';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->Subject='Successful Loan Repayment';
	$mail->addAddress($_SESSION['email']);
	$mail->Body='
    Your loan has been successfully paid.
    Thank you';
	$mail->setFrom("noreply@strathfund.com","STRATHFUND");
	if(!$mail->send()){
		$error = "<p>Unable to send verification email. Please check your inputs and try again</p>";
	}
?>