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
	$mail->Subject='Failed Loan Repayment';
	$mail->addAddress($_SESSION['email']);
    $mail->Body='
    Your loan was not paid on time because your wallet balance could not accomodate the payment of your loan.
    You have been added to the defualts list';
	$mail->setFrom("noreply@strathfund.com","STRATHFUND");
	if(!$mail->send()){
		$error = "<p>Unable to send verification email. Please check your inputs and try again</p>";
	}
?>