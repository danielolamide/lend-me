<?php
    require('connect-db.php');
    session_start();
    $errors = array();
    $data  = array();

    if(empty($_POST['amount-to-deposit'])){
        $errors['deposit-amount'] = "Amount to Deposit is required";
    }
    if(!empty($errors)){
        $data['success']= false;
        $data['errors']= $errors;

    }
    else{
        $wallet_query = "SELECT * FROM wallet WHERE ID='{$_SESSION['idNo']}'";
        $select_wallet = $con->query($wallet_query);
        if($select_wallet->num_rows>0){
            $wallet_row=$select_wallet->fetch_array();
            $_SESSION['wallet-id']= $wallet_row['WalletID'];
            $_SESSION['wallet-balance']= $wallet_row['WalletBalance'];
        }
        //If there are no errors process deposit
        $depoAmount = $_POST['amount-to-deposit'];
        $total_amount= $_SESSION['wallet-balance'] + $depoAmount;
        $depositMoneySQL = "UPDATE wallet SET WalletBalance='$total_amount' WHERE ID='{$_SESSION['idNo']}'";
        $depositWallet= $con->query($depositMoneySQL);
        $data['success'] = true;
        $data['message'] = "Successfully Deposited".$_POST['amount-to-deposit'] ;

    }
    echo json_encode($data);
?>