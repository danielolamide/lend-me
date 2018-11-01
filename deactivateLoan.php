<?php
    session_start();
    require_once('connect-db.php');
    $deactivateLoanSQL = "UPDATE liveBorrower SET liveStatus = '0' WHERE User_ID = '{$_SESSION['idNo']}'";
    if($processDeactivate  = $con->query($deactivateLoanSQL)){
        echo json_encode($processDeactivate);
    }
    else{
        $msg = "Failure";
    }
?>