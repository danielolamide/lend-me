<?
    session_start();
    if(!isset($_SESSION['idNo'])){
        header(";ocation: authenticate.html#login");
    }
    if($_SESSION['uType']!="Admin"){
        header("location: user-dashboard.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Mana"gement</title>
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
                        <a href="admin-dash.php" class="brand-logo"><img src="./images/p2p-logo-white-resize.png"></a>
                    </div>
                    
                    <!--Menu Trigger on Small Screen-->
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-small-only">  
                        <li><a class="dropdown-trigger user-name" href="#" data-target="dropdown1"><?php echo $_SESSION['FName'][0];?><i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </nav>
    
             <!--Username DropDown Items-->
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="admin-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
                <li><a href="./admin-settings.php">Settings<i class="material-icons left">settings</i></a></li>
                <li class="divider"></li>
                <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
            </ul>
             <!--NavBar Resize Menu-->
            <ul class="sidenav" id="mobile-demo">
                <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
                <li><a href="./user-management.php">User Management<i class="material-icons left">supervised_user_circle</i></a></li>
                <li><a href="./transaction-mgmt.php">Transaction Management<i class="fas fa-money-bill left">/i></a></li>
                <li><a href="./user-messages.php">User Feedback<i class="material-icons left">feedback</i></a></li>
                <li><a href="./admin-settings.php">Manage Settings<i class="material-icons left">settings</i></a></li>
                <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
             </ul>
        <!-- </div> -->
        
        <!--Admin Side Menu Fixed-->
        <ul id="slide-out" class="sidenav">
                <li><a class="sidenav-close" href="#!">&#10005</a></li>
    
            <li><div class="user-view">
                <!-- <div class="background">
                    <img src="images/office.jpg">
                </div> -->
                <a href="admin-settings.php"><img class="circle" src="images/default-user-icon.png"></a>
                <a href="admin-profile.php"><span class="white-text name">Username</span></a>
                <a href="admin-settings.php"><span class="subheader white-text email">user@domain.com</span></a>
            </div></li>
            <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
            <li><a href="./user-management.php"><i class="material-icons">supervised_user_circle</i>User Management</a></li>
            <li><a href="./transaction-mgmt.php"><i class="fas fa-money-bill"></i>Transaction Management</a></li>
            <li><a href="./user-messages.php"><i class="material-icons">feedback</i>User Feedback</a></li>
            <li><div class="divider"></div></li>
            <li><a href="./admin-settings.php"><i class="material-icons">settings</i>Manage Settings</a></li>
            <li><a class="waves-effect" href="./logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
        </ul>
    <main>
        <div class="dashboard-title">
            <h6 class="left-align">Manage Borrowers</h6>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div style="padding: 20px; text-align: center" class="card" id="card-row">
                    <div class="row">
                        <div class="left card-title">
                            <b class="white-text">Borrowers' Table</b>
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
                            <div class="center-align container" id="borrowers-table">
                                <table class="responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Payment Pending</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Daniel</td>
                                            <td>1234532</td>
                                            <td>2000</td>
                                            <td style="float:left"><a href="#" title="Permanently Delete User"><i class="material-icons">delete_forever</i></a></td>
                                            <td style="float: left;"><a href="#" title="Disable User Account"><i class="material-icons">close</i></a></td>                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-title">
            <h6 class="left-align">Manage Lenders</h6>            
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div style="padding:20px; text-align: center" class="card" id="card-row">
                    <div class="row">
                        <div class="left card-title">
                            <b class="white-text">
                                Lenders' Table
                            </b>
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
                                <div class="center-align container" id="lenders-table">
                                    <table class=" responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Amount Loaned Out</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nicole</td>
                                                <td>1234532</td>
                                                <td>2000</td>
                                                <td style="float:left;"><a href="#" title="Permanently Delete User"><i class="material-icons">delete_forever</i></a></td>
                                                <td style="float: left;"><a href="#" title="Disable User Account"><i class="material-icons">close</i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="black lighten-2 page-footer" style="text-align:center; padding: 10px;">
        <div class=" center-align container">
        © 2018 StrathFund
        </div>
    </footer>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>