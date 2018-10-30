<?php
    session_start();
    require_once('connect-db.php');
    //require_once('fetchLoanDetails.php');
    if($_POST['user_id']){
        $id = $_POST['user_id'];
        $selectFundsSQL = "SELECT * FROM loanFunding WHERE User_ID = '$id'";
        $selectFunds = $con->query($selectFundsSQL);
        $fundRows  = $selectFunds->fetch_array();
        $total_amount = $fundRows['Total_Amount'];
        $fundedAmount = $fundRows['Amount_Funded'];
        $amountLeft = $fundRows['Amount_Left'];
        $lend_Amount = $con->real_escape_string($_POST['lend-money']);
        $selectLiveTableSQL  = "SELECT * FROM liveBorrower WHERE User_ID='$id'";
        $selectLiveTable = $con->query($selectLiveTableSQL);
        $liveRows = $selectLiveTable->fetch_array();
        $loanLength = $liveRows['LoanLength'];
        if($lend_Amount!=0 && $lend_Amount>0){
            if($lend_Amount<=$amountLeft && $_SESSION['wallet-balance'] >= $lend_Amount){
                date_default_timezone_set('Africa/Nairobi');
                $fundedAmount += $lend_Amount;
                $amountLeft -= $lend_Amount;
                $updateFundingSQL = "UPDATE loanFunding SET Amount_Funded ='$fundedAmount', Amount_Left='$amountLeft' WHERE User_ID ='$id'";
                $updateFunding = $con->query($updateFundingSQL);
                $_SESSION['wallet-balance'] =$_SESSION['wallet-balance'] - $lend_Amount;
                $updateWalletBalanceSQL = "UPDATE wallet SET WalletBalance='{$_SESSION['wallet-balance']}' WHERE User_ID='{$_SESSION['idNo']}'";
                $updateWalletBalance = $con->query($updateWalletBalanceSQL);
                $selectBorrowerWalletBalanceSQL = "SELECT * FROM wallet WHERE User_ID='$id'";
                $selectBorrowerWalletBalance = $con->query($selectBorrowerWalletBalanceSQL);
                $borrowerWalletRow = $selectBorrowerWalletBalance->fetch_array();
                $borrowerBalance = $borrowerWalletRow['WalletBalance'];
                $newBorrowerBalance = $borrowerBalance + $lend_Amount;
                $updateBorrowerWalletBalanceSQL = "UPDATE wallet SET WalletBalance='$newBorrowerBalance' WHERE User_ID='$id'";
                $updateBorrowerWalletBalance = $con->query($updateBorrowerWalletBalanceSQL);
                $status = ($fundedAmount/$total_amount) * 100;
                $updateStatusSQL = "UPDATE liveBorrower SET Status='$status' WHERE User_ID='$id'";
                $updateStatus = $con->query($updateStatusSQL);
                $timeObject = time();
                $currentDate = date('Y-m-d H:i:s', $timeObject);// Current Time
                $currentDateTime = new DateTime($currentDate);// Date Time Object
                $DueDateTime = $currentDateTime->modify('+'.$loanLength.'months');// Due Date Calculation
                $DueCurrentTimeStamp = $DueDateTime->format('Y-m-d H:i:s');//Change Due Date format calculation
                $insertLoansSQL = "INSERT INTO loans (BorrowerID,LenderID,Amount,DateIssued,DateDue) VALUES('$id','{$_SESSION['idNo']}','$lend_Amount','$currentDate','$DueCurrentTimeStamp')";
                $insertLoans = $con->query($insertLoansSQL);
                $selectLoanCountSQL = "SELECT * FROM users WHERE ID_Number='{$_SESSION['idNo']}'";
                $selectLoanCount = $con->query($selectLoanCountSQL);
                $userRow = $selectLoanCount->fetch_array();
                $lCount = $userRow['loanCount'];
                $lCount += 1;
                $updateLoanCountSQL = "UPDATE users SET loanCount ='$lCount' WHERE ID_Number='{$_SESSION['idNo']}'";
                $updateLoanCount = $con->query($updateLoanCountSQL);
                $sendloanFunding = "Send Loan Funding";
                $receiveLoanFunding= "Receive Loan Funding";
                $insertLenderTransactionSQL = "INSERT INTO transactions (User_ID,Amount,TransactionType,TimeStamp) VALUES('{$_SESSION['idNo']}','$lend_Amount','$sendloanFunding','$currentDate')";
                $insertBorrowerTransactionSQL = "INSERT INTO transactions (User_ID,Amount,TransactionType,TimeStamp) VALUES('$id','$lend_Amount','$receiveLoanFunding','$currentDate')";
                $insertLenderTransaction = $con->query($insertLenderTransactionSQL);
                $insertBorrowerTransaction = $con->query($insertBorrowerTransactionSQL);
                echo json_decode($insertBorrowerTransaction);
            }
            else{
                echo "Failure -1";
            }
        }
        else{
            echo "Failure -2";
        }
    }
    

?>