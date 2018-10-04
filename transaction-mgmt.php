<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaction Management</title>
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    
</head>
<body>
    <nav>
            <div class="nav-wrapper top-nav">
                    <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-small-only show-on-medium-and-up"><i class="material-icons">menu</i></a>
                <div class="img-hold" style="margin-top: 5px;">
                    <a href="./admin-dash.php" class="brand-logo"><img src="./images/p2p-logo-white-resize.png"></a>
                </div>
                
                <!--Menu Trigger on Small Screen-->
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-small-only">  
                    <li><a class="dropdown-trigger user-name" href="#" data-target="dropdown1"><?echo $_SESSION['FName'][0]?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>

            <!--Username DropDown Items-->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="./admin-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
            <li><a href="./admin-settings.php">Settings<i class="material-icons left">settings</i></a></li>
            <li class="divider"></li>
            <li><a href="#!">Logout<i class="material-icons left">power_settings_new</i></a></li>
        </ul>
            <!--NavBar Resize Menu-->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
            <li><a href="./user-management.php">User Management<i class="material-icons left">supervised_user_circle</i></a></li>
            <li><a href="./transaction-mgmt.php">Transaction Management<i class="material-icons left">attach_money</i></a></li>
            <li><a href="./user-messages.php">User Feedback<i class="material-icons left">feedback</i></a></li>
            <li><a href="./admin-settings.php">Manage Settings<i class="material-icons left">settings</i></a></li>
            <li><a href="#">Logout<i class="material-icons left">power_settings_new</i></a></li>
            </ul>
    <!-- </div> -->
    
    <!--Admin Side Menu Fixed-->
    <ul id="slide-out" class="sidenav">
            <li><a class="sidenav-close" href="#!">&#10005</a></li>

        <li><div class="user-view">
            <!-- <div class="background">
                <img src="images/office.jpg">
            </div> -->
            <a href="./admin-settings.php"><img class="circle" src="images/default-user-icon.png"></a>
            <a href="admin-profile.php"><span class="white-text name">Username</span></a>
            <a href="admin-settings.php"><span class="subheader white-text email">user@domain.com</span></a>
        </div></li>
        <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
        <li><a href="./user-management.php"><i class="material-icons">supervised_user_circle</i>User Management</a></li>
        <li><a href="./transaction-mgmt.php"><i class="material-icons">attach_money</i>Transaction Management</a></li>
        <li><a href="./user-messages.php"><i class="material-icons">feedback</i>User Feedback</a></li>
        <li><div class="divider"></div></li>
        <li><a href="./admin-settings.php"><i class="material-icons">settings</i>Manage Settings</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>
    <!--Transaction Management Main Section-->
    <div class="dashboard-title">
        <h6 class="left-align">Recent Transactions</h6>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div style="padding:20px; text-align: center;" id="card-row" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b class="white-text">Borrowers' Transactions</b>
                    </div>
                </div>
                <div class="row">
                    <div style="padding:20px;"class="col s12 m12 l12">
                        <div class="container">
                            <form>
                                <input class="searchForm" type="text" name="search" placeholder="Search..">
                                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="padding:35px;" class="grey lighten-3 col s12 m12 l12">
                        <div id="transact-borrowers" class="center-align container">
                            <table class="centered responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Borrower Name</th>
                                        <th>Transaction Type</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Transaction Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Daniel</td>
                                        <td>Loan Paybacks</td>
                                        <td>20000</td>
                                        <td>12:48 23/12/2001</td>
                                        <td><i class="green-text material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>Nicole</td>
                                        <td>Loan</td>
                                        <td>80000</td>
                                        <td>12:48 23/12/2001</td>
                                        <td><i class="green-text material-icons">check</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div style="padding:20px; text-align: center;" id="card-row" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b class="white-text">Lenders' Transactions</b>
                    </div>
                </div>
                <div class="row">
                    <div style="padding:20px;"class="col s12 m12 l12">
                        <div class="container">
                            <form>
                                <input class="searchForm" type="text" name="search" placeholder="Search..">
                                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="padding:20px;" class="grey lighten-3 col s12 m12 l12">
                        <div id="transact-lenders" class="center-align container">
                            <table class="centered responsive-table">
                                <thead>
                                    <tr>
                                        <th>Lender Name</th>
                                        <th>Transaction Type</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Transaction Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Daniel</td>
                                        <td>Loan Funding</td>
                                        <td>20000</td>
                                        <td>12:48 23/12/2001</td>
                                        <td><i class="green-text material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>Nicole</td>
                                        <td>Loan Payment</td>
                                        <td>80000</td>
                                        <td>12:48 23/12/2001</td>
                                        <td><i class="green-text material-icons">check</i></td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="black lighten-2 page-footer" style="text-align:center; padding: 10px;">
        <div class=" center-align container">
        © 2018 StrathFund
        </div>
    </footer>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
</body>
</html>