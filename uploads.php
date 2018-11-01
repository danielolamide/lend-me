<?php
    session_start();
    require_once('connect-db.php');
    $id = $_SESSION['idNo'];
    if(isset($_POST['save-user-changes'])){
        $newPassword = $_POST['user-pass'];
        $newPasswordConfirm  =$_POST['user-pass-retype'];
        $file = $_FILES['new-user-img'];
        $fileName = $_FILES['new-user-img']['name'];
        $fileTmpName = $_FILES['new-user-img']['tmp_name'];
        $fileSize = $_FILES['new-user-img']['size'];
        $fileError = $_FILES['new-user-img']['error'];
        $fileType = $_FILES['new-user-img']['type'];

        $fileExt = explode('.',$fileName);
        $fileActualExtension = strtolower(end($fileExt));

        $allowed  = array('jpg','jpeg', 'png');

        if(in_array($fileActualExtension, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $newFileName = "profile".$id.".".$fileActualExtension;
                    $fileDestination = 'uploads/'.$newFileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE imageUpload SET status = 1 WHERE User_ID ='$id'";                 
                    if($con->query($sql)){
                        echo "Success";
                    }
                    else{
                        echo "Failure";
                    }
                }
                else{
                    $fileTooBig = "Your file is too big";
                    echo $fileTooBig;
                }
            }
            else{
                $fileUploadError = "There was an error uploading your file";
                echo $fileUploadError;
            }
        }
        else{
            $error_type = "You cannot upload files of this type!";
        }
        if(!($newPassword != $newPasswordConfirm)){
            $newPassword = password_hash($newPasswordConfirm,PASSWORD_BCRYPT);
            $updatePassword  = "UPDATE users SET Password = '$newPassword' WHERE ID_Number = '{$_SESSION['idNo']}'";
            if($con->query($updatePassword)){
                $msg=  "Successful Update";
                header("Location: user-settings.php");
            }
            else{
                $msg = "Passwords don't match";
            }
        }
    }
?>