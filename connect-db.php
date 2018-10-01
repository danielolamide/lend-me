<?php
    $db = "cs_project";
    $db_user_name = "root";
    $con = new mysqli('localhost',$db_user_name,'',$db);
    $con->select_db($db) or die("Unable to select database ".$db);
?>