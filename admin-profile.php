<?php
    session_start();
    require_once('connect-db.php');
    if(!isset($_SESSION['idNo'])){
        header("location: authenticate.html#login");
    }
    if($_SESSION['uType']!="1"){
        header("location: user-dashboard.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Settings</title>
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
                <li><a class="dropdown-trigger user-name" href="#" data-target="dropdown1"><?php echo $_SESSION['FName'][0];?><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>

        <!--Username DropDown Items-->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="./admin-profile.php">My Profile<i class="material-icons left">account_circle</i></a></li>
        <li><a href="./admin-settings.php">Settings<i class="material-icons left">settings</i></a></li>
        <li class="divider"></li>
        <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
    </ul>
        <!--NavBar Resize Menu-->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
        <li><a href="./user-management.php">User Management<i class="material-icons left">supervised_user_circle</i></a></li>
        <li><a href="./transaction-mgmt.php">Transaction Management<i class="fas fa-money-bill left"></i></a></li>
        <li><a href="./user-messages.php">User Feedback<i class="material-icons left">feedback</i></a></li>
        <li><a href="./admin-settings.php">Manage Settings<i class="material-icons left">settings</i></a></li>
        <li><a href="./logout.php">Logout<i class="material-icons left">power_settings_new</i></a></li>
        </ul>

    <!--Admin Side Menu Fixed-->
    <ul id="slide-out" class="sidenav">
            <li><a class="sidenav-close" href="#!">&#10005</a></li>

        <li><div class="user-view">
            <!-- <div class="background">
                <img src="images/office.jpg">
            </div> -->
            <a href="./admin-settings.php"><img class="circle" src="images/default-user-icon.png"></a>
            <a href="./admin-profile.php"><span class="white-text name">Username</span></a>
            <a href="./admin-settings.php"><span class="subheader white-text email">user@domain.com</span></a>
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
        <div class="center-align dashboard-title">
                <h6>My Profile</h6>
        </div>
        <div class="center-align white container" id="my-profile-container">
            <div class="row">
                <div class="col s5 m5 l5">
                    <span style="color:#494949; font-size:20px;" class="left">Profile</span>
                </div>
            </div>
            <div class="row">
                <div class="divider"></div>
            </div>
            <div class="row">
                 <div class="col s5 m5 l5 center-align">
                    <span class="field-labels">Photo</span>
                </div>
                <div class="col s7 m7 l7 center-align">
                <?php
                    $selectImage = "SELECT * FROM imageUpload WHERE User_ID ='{$_SESSION['idNo']}'";
                    $selectImageResult = $con->query($selectImage);
                    while($rowImage = $selectImageResult->fetch_array()){
                        if($rowImage['status']==0){
                            echo "<img src='./images/large-default-user.png' class='responsive-img' alt='User Image'>";
                        }
                        else{
                            echo "<img src='./uploads/profile".$_SESSION['idNo'].".jpg?".'mt_rand'."class='responsive-img left' alt='User Image' style='max-height:200px;'>";
                        }
                    }
                ?>
                                <!-- <img src="./images/large-default-user.png" alt="user-image" class="left responsive-img"> -->
                            </div>
                        </div>
            <div class="row">
                <div class="col s7 offset-s5">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s5 m5 l5">
                    <span style="color:#C5C5C3; font-size:18px;">Display Name</span>
                </div>
                <div class="col s7 m7 l7">
                    <span class="left" style="color:#494949; font-size:18px;"><?php echo $_SESSION['uName'];?></span>                        
                </div>
            </div>
            <div class="row">
                <div class="col s7 offset-s5">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s5 m5 l5">
                        <span style="color:#C5C5C3; font-size:18px;">Email Address</span>
                </div>
                <div class="input-field col s7 m7 l7">
                        <span class="left" style="color:#494949; font-size:18px;"><?php echo $_SESSION['email'];?></span>                                            
                </div>
            </div>
            <div class="row">
                <div class="col s7 offset-s5">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s5 m5 l5">
                    <span style="color:#C5C5C3; font-size:18px;">Gender</span>
                </div>
                <div class="col s7 m7 l7">
                    <span class="left" style="color:#494949; font-size:18px;"><?php echo $_SESSION['gender'];?></span>                        
                </div>
            </div>
            <div class="row">
                <div class="col s7 offset-s5">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                    <div class="col s5 m5 l5">
                        <span style="color:#C5C5C3; font-size:18px;">Account Type</span>
                    </div>
                    <div class="col s7 m7 l7">
                        <span class="left" style="color:#494949; font-size:18px;"><?php echo $_SESSION['uType'];?></span>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col s7 offset-s5">
                        <div class="divider"></div>
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
    <script type="text/javascript" src="./js/index.js"></script>
</body>
</html>