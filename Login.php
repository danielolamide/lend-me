<?php
	session_start();
	require_once("connect-db.php");
	if (isset($_POST['sign_in'])){

		$email =$con->real_escape_string($_POST	['user_email']);
        $uPassword = $con->real_escape_string($_POST['user_pass']);
        
        $sql = $con->query("SELECT * FROM users WHERE Email='$email' AND AccStatus='1'");
		if ($sql->num_rows>0) {
				$data= $sql->fetch_array();
				if((password_verify($uPassword, $data['Password']))&&($email==$data['Email'])){
					    if($data['UserType']=="2"){
							$wallet_query = "SELECT * FROM wallet WHERE User_ID='{$_SESSION['idNo']}'";
							$select_wallet = $con->query($wallet_query);
							if($select_wallet->num_rows>0){
								$wallet_row=$select_wallet->fetch_array();
								$_SESSION['wallet-id']= $wallet_row['WalletID'];
								$_SESSION['wallet-balance']= $wallet_row['WalletBalance'];
							}
							$_SESSION['uName']= $data['Username'];
							$_SESSION['FName']= explode(" ",$_SESSION['uName']);
    	    				$_SESSION['email']= $data['Email'];
	    	    			$_SESSION['idNo']= $data['ID_Number'];
		    	    		$_SESSION['gender'] = $data['Gender'];
							$_SESSION['uType'] = $data['UserType'];
							$_SESSION['lCount']= $data['loanCount'];
							$_SESSION['bCount'] = $data['borrowCount'];
							$_SESSION['rating'] = $data['UserRating'];
							$_SESSION['defaults'] =$data['defaultCount'];
					        header("location: user-dashboard.php");
					    }

    					else{
							$_SESSION['uName']= $data['Username'];
							$_SESSION['FName']= explode(" ",$_SESSION['uName']);
    		    			$_SESSION['email']= $data['Email'];
	    		    		$_SESSION['idNo']= $data['ID_Number'];
		    		    	$_SESSION['gender'] = $data['Gender'];
			    		    $_SESSION['uType'] = $data['UserType'];
					        header("location: admin-dash.php");
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
            alert ('This user does not exist or the account has not been activated');
            window.location='authenticate.html#register';
        </script>";
		}	
	}
?>