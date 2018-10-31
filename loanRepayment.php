<?php
    session_start();
    require_once('connect-db.php');
    
    date_default_timezone_set('Africa/Nairobi');
    $selectLoanDetailSQL = "SELECT * FROM loans WHERE BorrowerID='{$_SESSION['idNo']} AND paymentStatus = '0'";
    $selectLoanDetail = $con->query($selectLoanDetailSQL);
    if($selectLoanDetail->num_rows>0){
        //Get Current Date
        $timeObject = time();
        $currentDate = date('Y-m-d H:i:s',$timeObject);
        $currentStrToTime = strtotime($currentDate);
        $loanDetailRow = $selectLoanDetail->fetch_array();
        $loanDueDate = $selectLoanDetail['DateDue'];
        $dueDateStrToTime = strtotime($loanDueDate);
        if($dueDateStrToTime == $currentStrToTime){
            $selectLiveBorrowerSQL = "SELECT * FROM liveBorrower WHERE User_ID='{$_SESSION['idNo']}'";
            $selectLiveBorrower = $con->query($selectLiveBorrowerSQL);
            $liveRow = $selectLiveBorrower->fetch_array();
            $loanInterest = $liveRow['LoanInterest'];
            $selectLoanFundingSQL ="SELECT * FROM loanFunding WHERE User_ID='{$_SESSION['idNo']}'";
            $selectLoanFunding = $con->query($selectLoanFundingSQL);
            $fundingRows = $selectLoanFunding->fetch_array();
            $amountFunded = $fundingRows['Amount_Funded'];
            $totalAmount = $fundingRows['Total_Amount'];
            //Calculate Interest
            $loanInterestPercentage = ($loanInterest+100)/100;
            $loanPaybackAmount = $totalAmount * $loanInterestPercentage;
                while($loanRows = $selectLoanDetail->fetch_array()){
                    $fetchWalletDetailsSQLBorrower = "SELECT * FROM wallet WHERE User_ID='{$_SESSION['idNo']}";
                    $fetchWalletDetailsSQLLender = "SELECT * FROM wallet WHERE User_ID='{$loanRows['LenderID']}'";
                    $fetchWalletDetailsBorrower = $con->query($fetchWalletDetailsSQLBorrower);
                    $fetchWalletDetailsLender = $con->query($fetchWalletDetailsSQLLender);
                    $borrowerWalletRow = $fetchWalletDetailsBorrower->fetch_array();
                    $lenderWalletRow = $fetchWalletDetailsLender->fetch_array();
                    $borrowerBalance = $borrowerWalletRow['WalletBalance'];
                    $lenderBalance = $lenderWalletRow['WalletBalance'];
                    $percentageInvestment = $loanRows['percentageLoaned'];
                    $getPaybackAmount =  ($percentageInvestment*$loanPaybackAmount)/100;
                    $receiveLoanPayment = "Receive Loan Repayment";
                    $sendLoanPayment = "Send Loan Repayment";
                    if(!($getPaybackAmount > $borrowerBalance)){
                        $lenderBalance =  $lenderBalance + $getPaybackAmount;
                        $borrowerBalance = $borrowerBalance - $getPaybackAmount;
                        $sendLenderMoney = "UPDATE wallet SET WalletBalance='$lenderBalance' WHERE User_ID='{$loanRows['LenderID']}'";
                        $deductFromWallet = "UPDATE wallet SET WalletBalance='$borrowerBalance' WHERE User_ID='{$_SESSION['idNo']}'";
                        $transactionUpdateBorrowerSQL = "INSERT INTO transactions (User_ID,Amount,TransactionType,TimeStamp) VALUES('{$_SESSION['idNo']}','$getPaybackAmount','$sendLoanPayment','$currentDate')";
                        $transactionUpdateBorrower = $con->query($transactionUpdateBorrowerSQL);
                        $transactionUpdateLenderSQL = "INSERT INTO transactions (User_ID,Amount,TransactionType,TimeStamp) VALUES('{$loanRows['LenderID']}','$getPaybackAmount','$receiveLoanPayment','$currentDate')";
                        $transactionUpdateLender = $con->query($transactionUpdateLenderSQL);
                        $updateBorrowerPaymentStatusSQL = "UPDATE loans SET paymentStatus='1' WHERE User_ID='{$_SESSION['idNo']}'";
                        //Mail the User 
                    }
                    else{
                        $defaultNumber = $_SESSION['defaults'] + 1;
                        $_SESSION['defaults'] = $defaultNumber;
                        $updateLoanDefaultSQL = "UPDATE users SET defaultCount='$defaultNumber' WHERE User_ID='{$_SESSION['idNo']}'";
                        //Mail the User.
                    }

                }
        }
        elseif(strtotime('-1 days',strtotime($loanDueDate))){
            //Send Email
        }

    }

?>