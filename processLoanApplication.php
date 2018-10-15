<?php
    require_once('connect-db.php');
    session_start();
    if(isset($_POST['valid'])){
        $checkWalletHistorySQL = "SELECT WalletHistory FROM wallet WHERE User_ID = '{$_SESSION['idNo']}'";
        $checkWalletHistory = $con->query($checkWalletHistorySQL);
        $borrowerName = $_SESSION['uName'];
        $borrowAmount = $con->real_escape_string($_POST['amount-being-borrowed']);
        $loanPeriod = $con->real_escape_string($_POST['loan-period']);
        $interestRate = $con->real_escape_string($_POST['loan-interest-rate']);
        $loanReason = $con->real_escape_string($_POST['loan-reason']);
        if($checkWalletHistory->num_rows>0){
            $checkIfLoanProcessedSQL = "SELECT * FROM liveBorrower WHERE User_ID ='{$_SESSION['idNo']}'";
            $checkIfLoanProcessed = $con->query($checkIfLoanProcessedSQL);
            if($checkIfLoanProcessed->num_rows>0){
                $loanErrors->loanApplicationExists="Your Loan Application Already Exists";
                $errorsEncode = json_encode($loanErrors);
                echo $errorsEncode;
            }
            else{
                $wRow = $checkWalletHistory->fetch_array();
                $walletHistory = $wRow['WalletHistory'];
                $leastConstraint = 1/3 * $borrowAmount;
                if($walletHistory < $leastConstraint){
                    $loanErrors->msg = "You wallet history is not greater than a third of the loan you want to take";
                    $errorsEncode = json_encode($loanErrors);
                    echo $errorsEncode;
                }
                else{
                    $processLoanSQL = "INSERT INTO liveBorrower (User_ID,BorrowerName,Description,LoanAmount,LoanLength,LoanInterest) VALUES('{$_SESSION['idNo']}','$borrowerName','$loanReason','$borrowAmount','$loanPeriod','$interestRate')"; 
                    $processLoan = $con->query($processLoanSQL);
                    
                    //echo json_decode($processLoan);
                    
                }
            }
        }
    }
?>