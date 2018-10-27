<?php
    require_once('connect-db.php');
    session_start();
    if(isset($_POST['valid'])){
        $checkLoanEligibilitySQL = "SELECT loanAvailability FROM  loanStatus WHERE User_ID= '{$_SESSION['idNo']}'";
        $checkWalletHistorySQL = "SELECT WalletHistory FROM wallet WHERE User_ID = '{$_SESSION['idNo']}'";
        $checkLoanEligibility = $con->query($checkLoanEligibilitySQL);
        $lEligibilityRow = $checkLoanEligibility->fetch_array();
        $userLoanStats = $lEligibilityRow['loanAvailability'];
        $checkWalletHistory = $con->query($checkWalletHistorySQL);
        $borrowerName = $_SESSION['uName'];
        $borrowAmount = $con->real_escape_string($_POST['amount-being-borrowed']);
        $loanPeriod = $con->real_escape_string($_POST['loan-period']);
        $interestRate = $con->real_escape_string($_POST['loan-interest-rate']);
        $loanReason = $con->real_escape_string($_POST['loan-reason']);
        if(($checkWalletHistory->num_rows>0)&&($userLoanStats!=0)){
            $checkIfLoanProcessedSQL = "SELECT * FROM liveBorrower WHERE User_ID ='{$_SESSION['idNo']}'";
            $checkIfLoanProcessed = $con->query($checkIfLoanProcessedSQL);
            if($checkIfLoanProcessed->num_rows>0){
                echo "Fail";
            }
            else{
                $wRow = $checkWalletHistory->fetch_array();
                $walletHistory = $wRow['WalletHistory'];
                $leastConstraint = 1/3 * $borrowAmount;
                if($walletHistory < $leastConstraint){
                    $msg = "Less wallet history";
                    
                }
                else{
                    $processLoanSQL = "INSERT INTO liveBorrower (User_ID,BorrowerName,Description,LoanAmount,LoanLength,LoanInterest) VALUES('{$_SESSION['idNo']}','$borrowerName','$loanReason','$borrowAmount','$loanPeriod','$interestRate')"; 
                    $processLoan = $con->query($processLoanSQL);
                    echo json_decode($processLoan);
                    
                }
            }
        }
    }
?>