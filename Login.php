<?php
	session_start();
	require_once("connect-db.php");
	if (isset($_POST['sign_in'])){

		$email =$con->real_escape_string($_POST	['user_email']);
        $uPassword = $con->real_escape_string($_POST['user_pass']);
        
        $sql = $con->query("SELECT * FROM users WHERE Email='$email'");
        
		if ($sql->num_rows>0) {
				$data= $sql->fetch_array();

				if((password_verify($uPassword, $data['Password']))&&($email==$data['Email'])){
                    if($data['AccStatus']==1){
					    if($data['UserType']=="User"){
							$_SESSION['uName']= $data['Username'];
							$_SESSION['FName']= explode(" ",$_SESSION['uName']);
    	    				$_SESSION['email']= $data['Email'];
	    	    			$_SESSION['idNo']= $data['ID'];
		    	    		$_SESSION['gender'] = $data['Gender'];
			    	    	$_SESSION['uType'] = $data['UserType'];
					        header("location: user-dashboard.php");
					    }

    					else{
							$_SESSION['uName']= $data['Username'];
							$_SESSION['FName']= explode(" ",$_SESSION['uName']);
    		    			$_SESSION['email']= $data['Email'];
	    		    		$_SESSION['idNo']= $data['ID'];
		    		    	$_SESSION['gender'] = $data['Gender'];
			    		    $_SESSION['uType'] = $data['UserType'];
					        header("location: admin-dash.php");
                        }
                    }
                    else {
                        echo  "<script language='javascript'>
                        alert ('Please validate your account');
                        window.location='verifyemail.php';
                        </script>";
                    }
				}
            
				else{
                    echo  "<script language='javascript'>
                        alert ('Incorrect login details');
                        window.location='authenticate.html#login';
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