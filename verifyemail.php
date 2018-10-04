<?php  
	$alert="";
	$error="";
	$error1="";
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		require_once ('connect-db.php');
		$email = $con->real_escape_string($_GET['email']);
		$passHash = $con->real_escape_string($_GET['hash']);
		$query = $con->query("SELECT * FROM users WHERE Email='$email' AND Password='$passHash' AND AccStatus='0'");
		if($query->num_rows>0){
			$updateConfirmation = "UPDATE users SET AccStatus='1' WHERE Email='$email' AND Password ='$passHash'";
			$activate = $con->query($updateConfirmation);
			$alert ="<p>Successful Account Activation</p>";
		}
		else{
			$error = "<p>Invalid request. Your account has already been activated</p>";
		}

	}
	else{
		$error1="<p>Invalid. Please use the activaiton link sent to your email to activate your account.";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link rel="icon" type="image/png" href="./images/blue-coin.png">
	<meta charset="utf-8">
	<script type="text/javascript" src="./js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<style type="text/css">
		.verify-wrapper{
			margin: 200px auto;
			max-width: 600px;
			background:#3C3E52;
			text-align: center;
			border-radius: 10px;
		}
		.verify-wrapper div{
			padding: 15px;
			font-family: 'Source Sans Pro', sans-serif;
			font-size: 18px;
			color: white;


		}
		a{	
			text-decoration: none;
			color:grey;
		}
		a:hover{
			color: white;
			border-bottom: 2px solid #53C5B9;
		}
	</style>
</head>
<body>
	<div class="verify-wrapper">
		<div>
		<?php 
			if($error){
				echo $error;
				echo "<br>";
				echo "<br>";
				echo "<a href='./authenticate.html'>Return to Home Page</a>";
			}
			if($alert){
				echo $alert;
				echo "<br>";
				echo "<br>";
				echo "<a href='./admin-dash.html'>Continue to Dashboard</a>";
			}
		 ?>
		 <div>
	</div>
</body>
</html>