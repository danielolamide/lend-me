<?php
    include('connect-db.php');
    session_start();
    $getBalanceSQL = "SELECT WalletBalance FROM wallet WHERE User_ID='{$_SESSION['idNo']}'";
    $select_balance = $con->query($getBalanceSQL);
    if($select_balance->num_rows>0){
        $balance_data = $select_balance->fetch_array();
        $currentBalance = $balance_data['WalletBalance'];
     
    }
    echo "<span>Ksh. ";
    echo $currentBalance;
    echo"</span>";
?>