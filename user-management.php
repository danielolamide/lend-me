<?php
    session_start();
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
    <title>User Management</title>
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
                <li><a href="./transaction-mgmt.php">Transaction Management<i class="fas fa-money-bill left"></i></a></li>
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
                <a href="admin-profile.php"><span class="white-text name"><?php echo $_SESSION['FName'][0];?></span></a>
                <a href="admin-settings.php"><span class="subheader white-text email"><?php echo $_SESSION['email']?></span></a>
            </div></li>
            <li><a href="./admin-dash.php">Back to Dashboard Home<i class="material-icons">keyboard_backspace</i></a></li>
            <li><a href="./user-management.php"><i class="material-icons">supervised_user_circle</i>User Management</a></li>
            <li><a href="./transaction-mgmt.php"><i class="fas fa-money-bill"></i>Transaction Management</a></li>
            <li><a href="./user-messages.php"><i class="material-icons">feedback</i>User Feedback</a></li>
            <li><div class="divider"></div></li>
            <li><a href="./admin-settings.php"><i class="material-icons">settings</i>Manage Settings</a></li>
            <li><a class="waves-effect" href="./logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
        </ul>
    <!-- <main> -->
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
                                    <input class="searchForm" onkeyup="Search()" id="search" placeholder="Search by ID Number...">
                                    <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding:20px;" class="grey lighten-3 col s12 m12 l12">
                            <div class="center-align container" id="borrowers-table">
                                <table class="responsive-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Amount Borrowed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
<?php        
        require_once 'connect-db.php';    
        $sql = "SELECT User_ID,BorrowerName,LoanAmount from liveborrower";
        $query = $con->query($sql);
                
        if ($query->num_rows>0) 
        {
            // output data of each row
            while($row = $query->fetch_array()) 
            {
            echo "<tr><td>". $row["User_ID"]. "</td><td>". $row["BorrowerName"]. "</td><td>". $row["LoanAmount"]. "</td><td style=float: left;><a href='#confirm' onclick=$('#confirm').modal('open') title='Disable User Account'><i class='material-icons'>close</i></a></td></tr>";
            }
        }
        else
        {
            echo "0 result";
        }
?>
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
                                    <input class="searchForm" onkeyup="search()" id="Search" placeholder="Search by ID Number...">
                                    <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding:20px;" class="grey lighten-3 col s12 m12 l12">
                                <div class="center-align container" id="lenders-table">
                                    <table class=" responsive-table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>ID number</th>
                                                <th>Name</th>
                                                <th>Amount Loaned Out</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
<?php        
        require_once 'connect-db.php';    
        $sql = "SELECT users.ID_Number, users.Username, loans.Amount, loans.LenderID
                FROM users
                INNER JOIN loans ON users.ID_Number=loans.LenderID;";
        $query = $con->query($sql);
                
        if ($query->num_rows>0) 
        {
            // output data of each row
            while($row = $query->fetch_array()) 
            {
            echo "<tr><td>". $row["ID_Number"]. "</td><td>". $row["Username"]. "</td><td>". $row["Amount"]. "</td><td style=float: left;><a href='#confirm' onclick=$('#confirm').modal('open') title='Disable User Account'><i class='material-icons'>close</i></a></td></tr>";
            }
        }
        else
        {
            echo "0 result";
        }
?>
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
    <!-- confirm Modal -->
                <div class="modal" id="confirm">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col s8 m8 l8" id="report-container">
                                <span class="report-modal-header" style="color:teal;"><h5>Are you sure you want to disable this account?</h5></span>
                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#!" class="modal-close waves-effect waves-green right"><i class="material-icons center">close</i></a>
                            </div> <br><br>
                            <a href="user-disable.php" class="waves-effect waves-dark btn-small left" name="delete">Disable</a>
                            <a href="#" style="margin-left:20px;" class="waves-effect waves-light btn-small left">Cancel</a>
                        </div>
                    </div>
    <script>
        function Search(){
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) 
                {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
                    {
                        tr[i].style.display = "";
                    } 
                    else 
                    {
                        tr[i].style.display = "none";
                    }
                } 
            }
        }

        function search(){
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("Search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table1");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) 
                {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
                    {
                        tr[i].style.display = "";
                    } 
                    else 
                    {
                        tr[i].style.display = "none";
                    }
                } 
            }
        }
    </script>
</body>
</html>