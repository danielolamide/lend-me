<?php
    session_start();
    if($_SESSION['uType']="Admin"){
        header("location: user-dashboard.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

</head>
<body>
    <!-- <div class="page-wrap"> -->
        <nav>
            <div class="nav-wrapper top-nav">
                    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large hide-on-med-and-down"><i class="material-icons">menu</i></a>
                <div class="img-hold">
                    <a href="admin-dash.html" class="brand-logo"><img src="./images/p2p-logo-white-resize.png"></a>
                </div>
                
                <!--Menu Trigger on Small Screen-->
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">  
                    <li><a class="dropdown-trigger user-name" href="#" data-target="dropdown1"><?php echo $_SESSION['FName'][0];?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>

         <!--Username DropDown Items-->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="./admin-profile.html">My Profile<i class="material-icons left">account_circle</i></a></li>
            <li><a href="./admin-settings.html">Settings<i class="material-icons left">settings</i></a></li>
            <li class="divider"></li>
            <li><a href="#!">Logout<i class="material-icons left">power_settings_new</i></a></li>
        </ul>
         <!--NavBar Resize Menu-->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="./user-management.html">User Management<i class="material-icons left">supervised_user_circle</i></a></li>
            <li><a href="./transaction-mgmt.html">Transaction Management<i class="material-icons left">attach_money</i></a></li>
            <li><a href="./user-messages.html">User Feedback<i class="material-icons left">feedback</i></a></li>
            <li><a href="./admin-settings.html">Manage Settings<i class="material-icons left">settings</i></a></li>
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
            <a href="./admin-settings.html"><img class="circle" src="images/default-user-icon.png"></a>
            <a href="./admin-profile.html"><span class="white-text name">Username</span></a>
            <a href="./admin-settings.html"><span class="subheader white-text email">user@domain.com</span></a>
        </div></li>
        <li><a href="./user-management.html"><i class="material-icons">supervised_user_circle</i>User Management</a></li>
        <li><a href="./transaction-mgmt.html"><i class="material-icons">attach_money</i>Transaction Management</a></li>
        <li><a href="./user-messages.html"><i class="material-icons">feedback</i>User Feedback</a></li>
        <li><div class="divider"></div></li>
        <li><a href="./admin-settings.html"><i class="material-icons">settings</i>Manage Settings</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>
    <!--Page Content-->
    <main>
        <div class="dashboard-title">
            <h6 class="left-align">Dashboard</h6>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                    <div style="padding: 35px; text-align: center; " class="card" id="card-row">
                        <div class="row">
                            <div class="left card-title">
                                <b class="white-text">User Management</b>
                            </div>
                        </div>
                        <div class="row">
                            <a href="./user-management.html">
                                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                    <!-- <i class="large material-icons">person</i> -->
                                    <i class="center large fas fa-user-alt"></i>
                                    <span><h6>Borrower</h6></span>
                                </div>
                            </a>
                            <div class="col s2">&nbsp;</div>
                            <a href="./user-management.html#lenders-table">
                                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                    <!-- <i class="large material-icons">person</i> -->
                                    <i class="large fas fa-user-tie"></i>
                                    <span><h6>Lender</h6></span>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>
            <div class="col s12 m6 l6">
                <div style="padding:35px; text-align:center;" class="card" id="card-row">
                    <div class="row">
                        <div class="left card-title">
                            <b class="white-text">Transaction Management</b>
                        </div>
                    </div>
                    <div class="row">
                        <a href="./transaction-mgmt.html#transact-lenders">
                            <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                <!-- <i class="large material-icons">swap_horiz</i> -->
                                <i class="large fas fa-hand-holding-usd"></i>
                                <span><h6>Lender's Logs</h6></span>
                            </div>
                        </a>
                        <div class="col s2">&nbsp;</div>
                        <a href="./transaction-mgmt.html">
                            <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                <!-- <i class="large material-icons">swap_horiz</i> -->
                                <i class="large fas fa-exchange-alt"></i>
                                <span><h6>Borrower's Logs</h6></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card" id="card-row" style="padding:35px; text-align: center">
                    <div class="row">
                        <div class="left card-title">
                            <b class="white-text">User Feedback</b>
                        </div>
                    </div>
                    <div class="row">
                        <a href="./user-messages.html#suggestions">
                            <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                <i class="large fas fa-comment-alt"></i>
                                <span><h6>User Suggestions</h6></span>
                            </div>
                        </a>
                        <div class="col s2">&nbsp;</div>
                        <a href="./user-messages.html">
                            <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                <i class=" large fas fa-times-circle"></i>
                                <span><h6>User Complaints</h6></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col s6 m3 l3">
                    <div class="card" id="card-row" style="padding:35px; text-align: center">
                        <div class="row">
                            <div class="left card-title">
                                <b class="white-text">Manage Settings</b>
                            </div>
                        </div>
                        <div class="row">
                            <a href="./admin-settings.html">
                                <div style="padding: 30px;" class="grey lighten-3 col s12 waves-effect">
                                    <i class=" large fas fa-cog"></i>
                                    <span><h6>Settings</h6></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="col s6 m3 l3">
                    <div class="card" id="card-row" style="padding:35px; text-align: center">
                        <div class="row">
                            <div class="left card-title">
                                <b class="white-text">Manage Session</b>
                            </div>
                        </div>
                        <div class="row">
                            <a href="#">
                                <div style="padding: 30px;" class="grey lighten-3 col  s12 waves-effect">
                                    <i class="large fas fa-power-off"></i>
                                    <span><h6>Logout</h6></span>
                                </div>
                            </a>
                        </div>
                    </div>
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
    <script type ="text/javascript" src="js/index.js"></script>
</body>
</html>