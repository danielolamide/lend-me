<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lending Page</title>
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user-module.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body style="display:flex; min-height: 100vh; flex-direction: column;">
    <nav>
        <div class="nav-wrapper" style="background-color:white;">
            <div style="margin-top: 5px; margin-left:12px;" class="img-hold">
                <a href="user-dashboard.php" class="brand-logo"><img src="./images/p2p-green-logo-resized.png"></a>
            </div>
            <!--Menu Trigger on Small Screen-->
            <a href="#" data-target="mobile-demo" id="mobile-menu-icon" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li id="settings-link"><a href="./user-settings.php"><i class="material-icons">settings</i></a></li>
                <li><a class="dropdown-trigger user-name-lend" href="#" data-target="dropdown-user-module"><?php echo $_SESSION['FName'][0];?><i
                            class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Drop Down Links -->
    <ul id="dropdown-user-module" class="dropdown-content">
        <li><a href="./user-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
        <li class="divider"></li>
        <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
    </ul>
    <!-- Smaller Screen Menu -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="./user-dashboard.php">Dashboard<i class="fas fa-tachometer-alt left"></i></a></li>
        <li><a href="./lend.php">Lend Money<i class="fas fa-hand-holding-usd left"></i></a></li>
        <li><a href="./wallet.php">Wallet<i class="fas fa-wallet left"></i></a></li>
        <li><a href="./borrow.php">Borrow Money<i class="fas fa-exchange-alt"></i></a></li>
        <li><a href="./user-settings.php">Manage Settings<i class="fas fa-cog left"></i></a></li>
        <li><a href="./feedback.php">Feedback<i class="fas fa-comment-alt left"></i></a></li>
        <li><a href="./user-profile.php">View Profile<i class="fas fa-user-circle left"></i></a></li>
        <li><a href="./wallet.php#recent-transactions">Recent Transactions<i class="fas fa-history left"></i></a></li>
        <li><a href="./logout.php">Logout<i class="fas fa-power-off left"></i></a></li>
    </ul>
    <main style="flex:1 0 auto;">
        <div class="row" style="margin-bottom:0px;">
            <div class="col l1 hide-on-med-and-down">
                <div class="row" style="margin-bottom:0px;">
                    <div class="white col l6 center-align">
                        <ul class="side-nav-user-module">
                            <li><a href="./user-dashboard.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i></a></li>
                            <li><a href="./lend.php" title="Lend Money"><i class="fas fa-hand-holding-usd"></i></a></li>
                            <li><a href="./wallet.php" title="Wallet"><i class="fas fa-wallet"></i></a></li>
                            <li><a href="./borrow.php" title="Borrow Money"><i class="fas fa-exchange-alt"></i></a></li>
                            <li><a href="./user-settings.php" title="Manage Settings"><i class="fas fa-cog"></i></a></li>
                            <li><a href="./feedback.php" title="Feedback"><i class="fas fa-comment-alt"></i></a></li>                            
                            <li><a href="./wallet.php#recent-transactions" title="Transaction History"><i class="fas fa-history"></i></a></li>
                            <li><a href="./user-profile.php" title="View Profile"><i class="fas fa-user-circle"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l11" id="lend-header-container">
                <div class="row">
                    <div class="col s12 m4 l2 left-align headers">
                        <span class="left">Live Borrowers</span>
                    </div>
                    <div class="col s12 m4 l2 left-align headers">
                        <span class="left"><i class="material-icons">calendar_today</i>&nbsp;22/05/2018</span>
                    </div>
                    <div class="col s12 m4 l2 left-align headers">
                        <span class="left"><i class="material-icons">access_time</i>&nbsp;20:49</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 borrowers-list-container">
                        <table class="responsive-table rounded-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Length</th>
                                    <th>Interest</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nicole</td>
                                    <td>75% Funded</td>
                                    <td>Personal Needs</td>
                                    <td>Ksh. 1000</td>
                                    <td>2 Mo</td>
                                    <td>10%</td>
                                    <td>3.4</td>
                                    <td style="text-align: left"><a href="#modal-lend" class="action-icons btn-floating modal-trigger"
                                            title="Loan Money"><i class="material-icons left">send</i></a>
                                        <a class="action-icons btn-floating modal-trigger " href="#modal-profile" title="View Complete Profile"><i
                                                class="material-icons left">more_horiz</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agnes</td>
                                    <td>25% Funded</td>
                                    <td>Personal Needs</td>
                                    <td>Ksh. 10000</td>
                                    <td>2 Mo</td>
                                    <td>13%</td>
                                    <td>4.4</td>
                                    <td style="text-align: left"><a href="#modal-lend" class="action-icons btn-floating modal-trigger"
                                            title="Loan Money"><i class="material-icons left">send</i></a>
                                        <a class="action-icons btn-floating modal-trigger " href="#modal-profile" title="View Complete Profile"><i
                                                class="material-icons left">more_horiz</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nicole</td>
                                    <td>75% Funded</td>
                                    <td>Personal Needs</td>
                                    <td>Ksh. 1000</td>
                                    <td>2 Mo</td>
                                    <td>10%</td>
                                    <td>3.4</td>
                                    <td style="text-align: left"><a href="#model-lend" class="action-icons btn-floating modal-trigger"
                                            title="Loan Money"><i class="material-icons left">send</i></a>
                                        <a class="action-icons btn-floating modal-trigger " href="#modal-profile" title="View Complete Profile"><i
                                                class="material-icons left">more_horiz</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- View Profile Modal -->
                        <div class="modal" id="modal-profile">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s8 m8 l8">
                                        <span class="left borrower-id-modal">$Borrower-ID</span>
                                    </div>
                                    <div class="col s4 m4 l4">
                                        <a href="#!" class="modal-close waves-effect waves-green right"><i class="material-icons center">close</i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 center-align">
                                        <img src="./images/large-default-user.png" alt="user-image" class="responsive-image circle">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12 m12 l12 center-align">
                                        <span class="borrower-name-modal">$Borrower</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 center-align">
                                        <span class="borrower-rating-modal">$rating</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-fixed-footer">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="row" style="margin-bottom:0px;">
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-val">13</span>
                                            </div>
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-val">98%</span>
                                            </div>
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-val">2</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-modal">Loans</span>
                                            </div>
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-modal">Repayment</span>
                                            </div>
                                            <div class="col s4 m4 l4 center-align">
                                                <span class="borrower-det-modal">Defaults</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Lend Money Modal -->
                        <div class="modal" id="modal-lend">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s8 m8 l8">
                                        <span class="left lend-header">Lend Money</span>
                                    </div>
                                    <div class="col s4 m4 l4">
                                        <a href="#!" class="modal-close waves-effect waves-green right"><i class="material-icons center">close</i></a>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:0px;">
                                    <div class="col s12 m12 l12 center-align">
                                        <span class="loan-amount-remaining">Ksh 20,000</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 center-align">
                                        <span class="loan-amount-detail">Amount Remaining</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <form action="">
                                            <div class="row">
                                                <div class="input-field col s12 m12 l12">
                                                    <i class="fas fa-money-bill prefix"></i>
                                                    <input type="number" id="money-icon" class="validate">
                                                    <label for="money-icon">Amount to lend</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12 center-align">
                                                    <button class="btn waves-effect waves-light" type="submit" name="lend_money=btn"
                                                        id="lend-money">
                                                        Lend Money
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12 left">
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 0px;">
                                                <div class="col s12 m12 112 left">
                                                    <span class="agreement-text"></span><span class="red-asterix">*</span>By lending the user money you have agreed to their loan repayment rates</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 112 left">
                                                    <span class="acc-balance-text">Account Balance: $acc_balance</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row" style="margin-right:30px;">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <div class="col s1 m1 l1">
                               <span class="small-text">Name</span>
                            </div>
                            <div class="col s1 m1 l1">
                                <span class="small-text">Status</span>
                            </div>
                            <div class="col s2 m2 l2">
                                <span class="small-text">Description</span>
                            </div>
                            <div class="col s2 m2 l2">
                                <span class="small-text" >Loan Amount</span>
                            </div>
                            <div class="col s2 m2 l2">
                                <span  class="small-text">Loan Period</span>
                            </div>
                            <div class="col s1 m1 l1">
                                <span  class="small-text">Interest</span>
                            </div>
                            <div class="col s1 m1 l1">
                                <span class="small-text">Rating</span>
                            </div>
                            <div class="col s2 m2 l2">
                                <span  class="small-text">Action</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="borrower-list-card">
                   <div class="card">
                        <div class="col s1 m1 l1">
                            <span>Nicole</span>
                        </div>
                        <div class="col s1 m1 l1">
                            <span>75% Funded</span>
                        </div>
                        <div class="col s2 m2 l2">
                            <span>Personal Need</span>
                        </div>
                        <div class="col s2 m2 l2">
                            <span>Ksh. 10,000</span>
                        </div>
                        <div class="col s2 m2 l2">
                            <span>2 Mo</span>
                        </div>
                        <div class="col s1 m1 l1">
                            <span>10%</span>
                        </div>
                        <div class="col s1 m1 l1">
                            <span>4.8</span>
                        </div>
                        <div class="col s2 m2 l2">
                            <span style="text-align: left;"><a href="" class="action-icons btn-floating modal-trigger"
                                title="Loan Money"><i class="material-icons left">send</i></a>
                            <a class="action-icons btn-floating modal-trigger " href="" title="View Complete Profile"><i
                                    class="material-icons left">more_horiz</i></a></span>
                        </div>
                   </div>
                </div> -->
            </div>
        </div>

    </main>
    <footer style="background-color: #323232;" class="page-footer" style="text-align:center; padding: 10px; margin-top:0;">
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