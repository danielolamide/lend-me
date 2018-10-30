<?php
    session_start();
    require_once('connect-db.php');
    if($_POST['user_id']){
        $id = $_POST['user_id'];
        $selectFundingSQL  = "SELECT * FROM loanFunding WHERE User_ID = '$id'";
        $selectFunding = $con->query($selectFundingSQL);
        $fundingRows = $selectFunding->fetch_array();
        $amount_left = $fundingRows['Amount_Left'];
        $selectWalletSQL = "SELECT * FROM wallet WHERE User_ID = '{$_SESSION['idNo']}' ";
        $selectWallet  = $con->query($selectWalletSQL);
        $walletRow  = $selectWallet->fetch_array();
        $wallet_balance = $walletRow['WalletBalance'];

        $output = "<div class='modal-content'>
        <div class='row'>
            <div class='col s8 m8 l8'>
                <span class='left lend-header'>Lend Money</span>
            </div>
            <div class='col s4 m4 l4'>
                <a href='#!' class='modal-close waves-effect waves-green right'><i class='material-icons center'>close</i></a>
            </div>
        </div>
        <div class='row' style='margin-bottom:0px;'>
            <div class='col s12 m12 l12 center-align'>
                <span class='loan-amount-remaining'>Ksh $amount_left</span>
            </div>
        </div>
        <div class='row'>
            <div class='col s12 m12 l12 center-align'>
                <span class='loan-amount-detail'>Amount Remaining</span>
            </div>
        </div>
        <div class='row'>
            <div class='col s12 m12 l12'>
                <form method='post'  id='lendForm'>
                    <div class='row'>
                        <div class='input-field col s12 m12 l12'>
                            <i class='fas fa-money-bill prefix'></i>
                            <input type='number' id='money-icon' class='validate' name='lend-money' min='0'>
                            <label for='money-icon'>Amount to lend</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col s12 m12 l12 center-align'>
                            <button class='btn waves-effect waves-light' type='submit' name='lend-money-btn'
                                id='$id' class='buttonLend'>
                                Lend Money
                            </button>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col s12 m12 l12 left'>
                            <span></span>
                        </div>
                    </div>
                    <div class='row' style='margin-bottom: 0px;'>
                        <div class='col s12 m12 112 left'>
                            <span class='agreement-text'></span><span class='red-asterix'>*</span>By lending the user money you have agreed to their loan repayment rates</span>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col s12 m12 112 left'>
                            <span class='acc-balance-text'><strong>Account Balance: Ksh $wallet_balance</strong></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>";
        
    echo $output;

    }
?>