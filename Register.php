<?php

$mysqli = new mysqli("localhost", "root", "", "cs project");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
if(isset($_POST['sign_up']))
    $firstname = $mysqli->real_escape_string($_REQUEST['fname']);
    $lastname = $mysqli->real_escape_string($_REQUEST['lname']);
    $username = $firstname . " " . $lastname;
	$email = $mysqli->real_escape_string($_REQUEST['email']);
	$id = $mysqli->real_escape_string($_REQUEST['ID']);
	$uPass = $mysqli->real_escape_string($_REQUEST['pass']);
    $uPass1 = $mysqli->real_escape_string($_REQUEST['pass1']);
    $no = $mysqli->real_escape_string($_REQUEST['number']);
    $sex = $mysqli->real_escape_string($_REQUEST['gender']);
    $user = "User";
    $acc = "Invalid";
 
    if($uPass!=$uPass1){
        echo "<script language='javascript'> 
                alert ('Passwords do not match.');
                window.location='authenticate.html';
              </script>";
    }

    else {
        $userExists= $mysqli->query("SELECT * FROM users WHERE ID='$id'");
			if ($userExists->num_rows>0) {
				echo "<script language='javascript'>
                    alert('User with this ID exists.');
                    window.location='authenticate.html';
                    </script>";
            }

        $userExists= $mysqli->query("SELECT * FROM users WHERE Email='$email'");
            if ($userExists->num_rows>0) {
                echo "<script language='javascript'>
                    alert('User with this email exists.');
                    window.location='authenticate.html';
                    </script>";             
            }

        $acceptedDomains = array('strathmore.edu', 'Strathmore.edu');
            if(!in_array(substr($email, strrpos($email, '@') + 1), $acceptedDomains))
            {   echo "<script language='javascript'>
                alert('Please use a valid strathmore.edu email');
                window.location='authenticate.html';
                </script>";  
            }
    
        else{
            $hashed = password_hash($uPass, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (Username,Email,ID,Password,Phone_No,Gender,UserType,AccStatus) VALUES ('$username', '$email', '$id', '$hashed', '$no', '$sex', '$user', '$acc')";

            if($mysqli->query($sql) === true){
                echo "<script language='javascript'>
                    alert ('Records inserted successfully. WELCOME!');
                    window.location='index.html';
                    </script>";  
            } 
            else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
            }
        }
    }
