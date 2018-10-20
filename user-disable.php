<?php
            
    require_once 'connect-db.php';
            
	$Id = $mysqli->real_escape_string($_REQUEST['Id']);
	
	// Check connection
	if($mysqli === false){
		die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
	
    // attempt update query execution
    if (isset($_POST['delete']))
    {
        $sql = "UPDATE users SET AccStatus='x' WHERE 'ID_Number' = $Id";
    
        if($mysqli->query($sql) === true){
            echo "Account disabled successfully.";
        } 

        else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
    } 
?>