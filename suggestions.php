<?php
    session_start();
    require_once("connect-db.php");

    $suggestions = $con->real_escape_string($_REQUEST['suggest']);
    $id =  $_SESSION['idNo'];

    $sql = "INSERT INTO suggestions (SuggestionID,UserID,Suggestion) VALUES ('','$id','$suggestions');";
    $query = $con->query($sql);

    if($query === true){
        echo "<script language='javascript'>
        alert ('Suggestion has been sent.');
        window.location='feedback.php';
        </script>";  
    }
    else {
        echo "Error";
    }

?>