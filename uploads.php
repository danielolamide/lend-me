<?php
    session_start();
    require_once('connect-db.php');
    $id = $_SESSION['idNo'];
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
                if($fileSize < 1000000){
                    $newFileName = "profile".$id.".".$fileActualExtension;
                    $fileDestination = 'uploads/'.$newFileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE imageUpload SET status = 1 WHERE User_ID ='$id'";
                    $result = $con->query($sql);
                    $successfulUpload = "Successful Image Upload";
                    echo $successfulUpload;
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
    }
?>