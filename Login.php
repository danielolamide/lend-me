<?php
	session_start();

	if (isset($_POST['sign_in'])){
		$con = new mysqli("localhost", "root", "", "cs project");

		$email =$con->real_escape_string($_POST	['user_email']);
        $uPassword = $con->real_escape_string($_POST['user_pass']);
        
        $sql = $con->query("SELECT * FROM users WHERE Email='$email'");
        
		if ($sql->num_rows>0) {
				$data= $sql->fetch_array();

				if((password_verify($uPassword, $data['Password']))&&($email==$data['Email'])){
                    if($data['AccStatus']=="Valid"){
					    if($data['UserType']=="User"){
                            $_SESSION['fname']= $data['Fname'];
                            $_SESSION['lname']= $data['Lname'];
    	    				$_SESSION['email']= $data['Email'];
	    	    			$_SESSION['idNo']= $data['ID'];
		    	    		$_SESSION['gender'] = $data['Gender'];
			    	    	$_SESSION['uType'] = $data['UserType'];
					        header("location: index.html");
					    }

    					else{
                            $_SESSION['fname']= $data['Fname'];
                            $_SESSION['lname']= $data['Lname'];
    		    			$_SESSION['email']= $data['Email'];
	    		    		$_SESSION['idNo']= $data['ID'];
		    		    	$_SESSION['gender'] = $data['Gender'];
			    		    $_SESSION['uType'] = $data['UserType'];
					        header("location: admin-dash.html");
                        }
                    }
                    else {
                        echo  "<script language='javascript'>
                        alert ('Please validate your account');
                        window.location='authenticate.html';
                        </script>";
                    }
				}
            
				else{
                    echo  "<script language='javascript'>
                        alert ('Incorrect login details');
                        window.location='authenticate.html';
                    </script>";
				}
		}

		else{
            echo  "<script language='javascript'>
            alert ('This user does not exist');
            window.location='authenticate.html';
        </script>";
		}	
	}
?>