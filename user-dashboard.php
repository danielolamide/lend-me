<?
    require_once('connect-db.php');
    session_start();
    if(!isset($_SESSION['idNo'])){
        header("location: authenticate.html#login");
    }
    else{
        $selectBalance = "SELECT * FROM wallet where User_ID = {$_SESSION['idNo']}";
        $balanceSelectQuery = $con->query($selectBalance);
        if($balanceSelectQuery->num_rows>0){
            $balanceData = $balanceSelectQuery->fetch_array();
            $_SESSION['wallet-balance'] = $balanceData['WalletBalance'];
        }
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body style="display:flex; min-height: 100vh; flex-direction: column;">
    <nav>
        <div class="nav-wrapper top-nav">
            <div style="margin-top: 5px;" class="img-hold">
                <a href="user-dashboard.php" class="brand-logo"><img src="./images/p2p-logo-white-resize.png"></a>
            </div>

            <!--Menu Trigger on Small Screen-->
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="user-dashboard.php">Dashboard</a></li>
                <li><a href="feedback.php">Suggestions & Complaints</a></li>
                <li><a class="dropdown-trigger user-name" href="#" data-target="dropdown1"><?php echo $_SESSION['FName'][0];?><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Drop Down Links -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="./user-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
        <li><a href="./user-settings.php">Settings<i class="material-icons left">settings</i></a></li>
        <li class="divider"></li>
        <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
    </ul>
    <!-- Smaller Screen Menu -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="./wallet.php">Wallet<i class="fas fa-wallet left"></i></a></li>
        <li><a href="./lend.php">Lend Money<i class="fas fa-hand-holding-usd left"></i></a></li>
        <li><a href="./borrow.php">Borrow Money<i class="fas fa-exchange-alt"></i></a></li>
        <li><a href="./user-settings.php">Manage Settings<i class="fas fa-cog left"></i></a></li>
        <li><a href="./feedback.php">Feedback<i class="fas fa-comment-alt left"></i></a></li>
        <li><a href="./wallet.phpcent-transactions">Recent Transactions<i class="fas fa-history left"></i></a></li>
        <li><a href="./logout.php">Logout<i class="fas fa-power-off left"></i></a></li>
    </ul>
    <main style="flex:1 0 auto;">
        <div class="white container user-options">
            <div class="row" style="padding: 5px 0px;">
                <div class="col s4 m4 l4" style="border-right: 1px solid rgba(46,62,79,0.48);">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="center">
                                <img src="./images/wallet.png" alt="deposit-icon" class="responsive-img">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="btn-hold center">
                                <a href="./wallet.php" class="waves-effect waves-light btn ">Deposit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 l4" style="border-right: 1px solid rgba(46,62,79,0.48);">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="center">
                                <img src="./images/borrow-1.png" alt="borrow-icon" class="responsive-img">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="btn-hold center">
                                <a href="lend.php" class="waves-effect waves-light btn ">Lend</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 l4">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="center">
                                <img src="./images/loan.png" alt="loan-icon" class="responsive-img">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="btn-hold center">
                                <a href="./borrow.php" class="waves-effect waves-light btn ">Borrow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l3 hide-on-med-and-down">
                <div class="container">
                    <span class="grey-text" style="text-transform: uppercase;">Summary</span>
                    <ul>
                        <li class="super-list">Payments
                            <div>&nbsp;</div>
                            <div class="divider"></div>
                            <ul class="sublists">
                                <li><a href="./wallet.php">Deposit</a></li>
                                <div class="divider"></div>
                                <li><a href="./wallet.php">Withdraw</a></li>
                                <div class="divider"></div>
                                <div>&nbsp;</div>

                            </ul>
                        </li>
                        <li class="super-list">Lend
                            <div>&nbsp;</div>
                            <div class="divider"></div>
                            <ul class="sublists">
                                <li><a href="./lend.php">Lend Money</a></li>
                                <div class="divider"></div>
                                <div>&nbsp;</div>
                            </ul>
                        </li>
                        <li class="super-list">Borrow
                            <div>&nbsp;</div>
                            <div class="divider"></div>
                            <ul class="sublists">
                                <li><a href="./borrow.php">Borrow Money</a></li>
                                <div class="divider"></div>
                            </ul>
                        </li>
                        <div>&nbsp;</div>
                        <li class="super-list">Account History
                            <div>&nbsp;</div>
                            <div class="divider"></div>
                            <ul class="sublists">
                                <li><a href="wallet.php#recent-transactions">Transaction History</a></li>
                                <div class="divider"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m12 l9">
                <div class="row">
                    <div class="col s12 m12 l12 center">
                        <div class="card" id="last-transact-container" style="padding:10px 15px;">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="center-align card-title">
                                        <span id="card-head">Last Transaction</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="container">
                                        <div class="row" id="tr-header">
                                            <div class="col s3 m3 l3">
                                                <span>Recieved By</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span>Amount</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span>Date</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span>Transaction Type</span>
                                            </div>
                                        </div>
                                        <div class="row tr-body">
                                            <div class="col s3 m3 l3">
                                                <span class="tr-values">Ola</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span class="tr-values">2000</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span class="tr-values">11/21/2018</span>
                                            </div>
                                            <div class="col s3 m3 l3">
                                                <span class="tr-values">Loan Repayment</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <ul class="collapsible popout">
                            <li class="active">
                                <div class="collapsible-header" style="background-color: rgb(46,62,79); color: #25BB9B;">Your
                                    Money</div>
                                <div class="collapsible-body">
                                    <table class="stripped reponsive-table popup-table">
                                        <tbody>
                                            <tr>
                                                <td>Amount on Loan</td>
                                                <td class="account-data">Ksh. 1022</td>
                                            </tr>
                                            <tr>
                                                <td>Amount Owed</td>
                                                <td class="account-data">Ksh. 20020</td>
                                            </tr>
                                            <tr>
                                                <td>Wallet Balance</td>
                                                <td class="account-data"><?php echo "Ksh. ".$_SESSION['wallet-balance'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td class="account-data">$total_amount</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <ul class="collapsible popout">
                            <li>
                                <div class="collapsible-header" style="background-color: rgb(46,62,79); color: #25BB9B;">
                                    Your Account History
                                </div>
                                <div class="collapsible-body">
                                    <table class="popup-table">
                                        <tbody>
                                            <tr>
                                                <td>No. of times you've borrower money</td>
                                                <td class="account-data">$loan_type_count</td>
                                            </tr>
                                            <tr>
                                                <td>No. of times you've loaned out money</td>
                                                <td class="account-data">$loan_type_count</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="transaction.html">View more details on my transactions</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="divider"></div>
                </div>
            </div>
    </main>
    <footer class="black lighten-2 page-footer" style="text-align:center; padding: 10px;">
        <!-- <div class="center-align container" id="foot-logo">
            <img src="./images/p2p-blue-new-layout.png" alt="company-logo">
        </div> -->
        <div class=" center-align container">
            © 2018 StrathFund
        </div>
    </footer>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>

</html>