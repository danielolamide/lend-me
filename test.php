<?php
    session_start();
    require_once('connect-db.php');
    // $id = 99012;
    // $selectLoanSQL  = "SELECT * FROM loans WHERE BorrowerID='$id' AND paymentStatus='0'";
    // $selectLoan = $con->query($selectLoanSQL);
    // $selectRow = $selectLoan->fetch_array();
    // $dueDate  = $selectRow['DateDue'];
    // date_default_timezone_set('Africa/Nairobi');
    // require_once('connect-db.php');
    // $timeObj = time();
    // $currentTime = date('Y-m-d H:i:s',$timeObj);
    // $dateDue = strtotime($dueDate);
    // echo $dateDue;
    // echo "<br>";
    // echo strtotime($currentTime);
    // echo "<br>";
    // echo $currentTime;
    // echo "<br>";
    // if($currentTime = $dateDue){
    //     echo "Bigger";
    // }
    // else{
    //     echo "Smaller";
    // }
    $msg = 15;
    $egg = ($msg + 100)/100;
    echo $egg;
?>