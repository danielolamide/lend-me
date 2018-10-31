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
	$mail->Subject='Loan Payment Reminder';
	$mail->addAddress($_SESSION['email']);
    $mail->Body='
    This is a polite reminder that your loan will be due in 1 day.
    Please ensure that your wallet has enough funds to make the repayment.
    This is to ensure your not added to the default list.
    Thank you.';
	$mail->setFrom("noreply@strathfund.com","STRATHFUND");
	if(!$mail->send()){
		$error = "<p>Unable to send verification email. Please check your inputs and try again</p>";
	}
?>