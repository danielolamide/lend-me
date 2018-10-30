<?php
    session_start();
    require_once('connect-db.php');
    $id = 120000;
    date_default_timezone_set('Africa/Nairobi');
    $selectLiveTableSQL  = "SELECT * FROM liveBorrower WHERE User_ID='$id'";
    $selectLiveTable = $con->query($selectLiveTableSQL);
    $liveRows = $selectLiveTable->fetch_array();
    $loanLength = $liveRows['LoanLength'];
    echo $loanLength;
    echo "<br>";
    $selectTime = $con->query("SELECT * FROM transactions WHERE User_ID='$id'");
    $row = $selectTime->fetch_array();
    $timeStamp = $row['TimeStamp'];
    $date  = new DateTime($timeStamp);
    echo $date->format('Y-m-d');
    $t = time();
    echo "<br>";
    $nowDate = date('Y-m-d H:i:s',$t);
    echo $nowDate;
    echo "<br>";
    $newDate = new DateTime($nowDate);
    //$newDate->format('Y-m-d');
    $date1 = $newDate->modify('+'.$loanLength.'months');
    echo  $date1->format('Y-m-d H:i:s');
    echo "<br>";
    echo $timeStamp;

?>