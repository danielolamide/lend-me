<?php
    session_start();
    require_once("connect-db.php");

    $name = $con->real_escape_string($_REQUEST['name']);
    $complaints = $con->real_escape_string($_REQUEST['complaint']);
    $id =  $_SESSION['idNo'];

    $sql = "INSERT INTO complaints (ComplaintID,UserID,Name,Complaint) VALUES ('','$id', '$name','$complaints');";
    $query = $con->query($sql);

    if($query === true){
        echo "<script language='javascript'>
        alert ('Complaint has been sent.');
        window.location='feedback.php';
        </script>";  
    }
    else {
        echo "Error";
    }

?>