<?php
    require_once('connect-db.php');
    session_start();
    if(isset($_POST['save-user-changes'])){
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
                if($fileSize < 1000){
                    $newFileName = uniqid('',true).".".$fileActualExtension;
                    $fileDestination = 'uploads/'.$newFileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $successfulUpload = "Successful Image Upload";
                }
                else{
                    $fileTooBig = "Your file is too big";
                }
            }
            else{
                $fileUploadError = "There was an error uploading your file";
            }
        }
        else{
            $error_type = "You cannot upload files of this type!";
        }
    }
?>