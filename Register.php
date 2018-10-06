<?php
    require_once("./connect-db.php");
// Escape user inputs for security
if(isset($_POST['sign_up']))
    $firstname = $con->real_escape_string($_REQUEST['fname']);
    $lastname = $con->real_escape_string($_REQUEST['lname']);
    $username = $firstname . " " . $lastname;
	$email = $con->real_escape_string($_REQUEST['email']);
	$id = $con->real_escape_string($_REQUEST['ID']);
	$uPass = $con->real_escape_string($_REQUEST['pass']);
    $uPass1 = $con->real_escape_string($_REQUEST['pass1']);
    $no = $con->real_escape_string($_REQUEST['number']);
    $sex = $con->real_escape_string($_REQUEST['gender']);
    $user = "User";
    $acc = 0;
 
    if($uPass!=$uPass1){
        echo "<script language='javascript'> 
                alert ('Passwords do not match.');
                window.location='authenticate.html#register';
              </script>";
    }

    else {
        $userExists= $con->query("SELECT * FROM users WHERE ID='$id'");
			if ($userExists->num_rows>0) {
				echo "<script language='javascript'>
                    alert('User with this ID exists.');
                    window.location='authenticate.html#register';
                    </script>";
            }

        $userExists= $con->query("SELECT * FROM users WHERE Email='$email'");
            if ($userExists->num_rows>0) {
                echo "<script language='javascript'>
                    alert('User with this email exists.');
                    window.location='authenticate.html#register';
                    </script>";             
            }

        $acceptedDomains = array('strathmore.edu', 'Strathmore.edu');
            if(!in_array(substr($email, strrpos($email, '@') + 1), $acceptedDomains))
            {   echo "<script language='javascript'>
                alert('Please use a valid strathmore.edu email');
                window.location='authenticate.html#register';
                </script>";  
            }
    
        else{
            $hashed = password_hash($uPass, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (Username,Email,ID,Password,Phone_No,Gender,UserType,AccStatus) VALUES ('$username', '$email', '$id', '$hashed', '$no', '$sex', '$user', '$acc')";
            $intitalize_wallet="INSERT INTO wallet(ID) VALUES('$id')";


            if($con->query($sql) === true && $con->query($intitalize_wallet)){
                echo "<script language='javascript'>
                    alert ('Your Account has been created. Activate your account to login. WELCOME!');
                    window.location='index.html';
                    </script>";  
                require_once("mailer.php");
            } 
            else{
            echo "ERROR: Could not able to execute $sql. " . $con->error;
            }
        }
    }
