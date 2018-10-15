<?  
    require_once('connect-db.php');
    session_start();
    if(!isset($_SESSION['idNo'])){
        header("location: authenticate.html#login");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrowing Page</title>
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
                <li><a class="dropdown-trigger user-name-lend" href="#" data-target="dropdown-user-module"><?php echo $_SESSION['FName'][0]?><i
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
            <div class="col s12 m12 l11" id="borrower-header-container">
                <div class="row">
                    <div class="col s12 m4 l2 headers">
                        <span>Apply for a loan</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <ul class="collapsible popout">
                            <li class="active">
                                <div class="collapsible-header application-report-header">View Loan Application Report</div>
                                <div class="collapsible-body">
                                    <div class="funding-table-container">
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th>Lender's Name</th>
                                                    <th>Amount Loaned</th>
                                                    <th>Date and Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiffnay</td>
                                                    <td>Ksh. 10,000</td>
                                                    <td>21/09/2018 12:49pm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6 l2">
                        <a class="btn waves-effect waves-light" id="loan-button" onclick="$('#loan-form-modal').modal('open');">Get
                            Loan</a>
                    </div>
                    <div class="col s6 m6 l2">
                        <a class="btn waves-effect waves-light" id="delete-loan-button" onclick="$('#delete-confirmation-modal').modal('open');">Delete
                            Request</a>
                    </div>
                </div>
                <div class="modal" id="delete-confirmation-modal">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col s12 m12 l12 delete-confirmation-modal-header center-align">
                                <span>Confirm Loan Application Deletion</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 delete-confirmation-message center-align">
                                <span>Are you sure you want to delete your loan request?</span>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col s6 m6 l6 right-align delete-accept-btn">
                                    <a href="" class="btn waves-effect waves-light">Yes</a>
                                </div>
                                <div class="col s6 m6 l6 left-align delete-close-btn">
                                    <a href="#!" class="btn modal-close waves-effect waves-green">No</a>
                                </div>
                            </div>
                    </div>
                    
                </div>
                <div class="modal" id="loan-form-modal">
                    <div class="modal-content" id="loan-modal-content">
                        <div class="row loan-modal-head-container">
                            <div class="col s8 m8 l8 left-align">
                                <span class="loan-modal-head">Kindly provide us with your loan requirements</span>
                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#!" class="modal-close btn waves-effect waves-green right"><i class="material-icons center">close</i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 center-align">
                                <span class="borrow-form-name">Loan Application Form</span>
                            </div>
                        </div>
                        <form id="loan-form" method="post" action="processLoanApplication.php">
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <i class="fas fa-money-bill prefix"></i>
                                    <input type="number" id="money-icon" class="validate" name="amount-being-borrowed" required>
                                    <label for="money-icon">Loan Amount</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l8">
                                    <i class="material-icons prefix">timelapse</i>
                                    <input type="number" id="time-icon" class="validate" name="loan-period" required>
                                    <label for="time-icon">Loan Period in Months</label>
                                </div>
                                <div class="input-field col s12 m12 l4">
                                    <i class="fas fa-percent prefix" style="font-size:20px;"></i>
                                    <input type="number" id="percent-icon" class="validate" name="loan-interest-rate" required>
                                    <label for="percent-icon">Interest Rate</label>
                                </div>
                            </div>
                            <div class="row" style="padding:0px 40px;">
                                <div class="input-field s12 m12 l12">
                                    <i class="material-icons prefix">notes</i>
                                    <textarea data-length="40" name="loan-reason" id="description-text" class="materialize-textarea" required></textarea>
                                    <label for="description-text">Loan Purpose</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 center-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="submit_loan_application">Submit
                                        Application
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <footer style="background-color: #323232;" class="page-footer" style="text-align:center; padding: 10px; margin-top:0;">
        <!-- <div class="center-align container" id="foot-logo">
                        <img src="./images/p2p-blue-new-layout.png" alt="company-logo">
                    </div> -->
        <div class=" center-align container">
            © 2018 StrathFund
        </div>
    </footer>
</body>

</html>