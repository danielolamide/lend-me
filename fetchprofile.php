<?php
    session_start();
    require_once('connect-db.php');
    if($_POST['user_id']){
        $id = $_POST['user_id'];
        $selectUserImageSQL = "SELECT * FROM imageUpload WHERE User_ID='$id'";
        $selectUserDetailsSQL = "SELECT * FROM users WHERE ID_Number ='$id'";
        $selectUserDetails = $con->query($selectUserDetailsSQL);
        $uDetailsRow = $selectUserDetails->fetch_array();
        $uDetailsName =  $uDetailsRow['Username'];
        $uDetailsID = $uDetailsRow['ID_Number'];
        $uDetailsRating = $uDetailsRow['UserRating'];
        $uDetailsLoanCount  = $uDetailsRow['loanCount'];
        $selectUserImage = $con->query($selectUserImageSQL);
        $imageRows = $selectUserImage->fetch_array();
        $imageStatus = $imageRows['status'];

        if($imageStatus==0){
            $image = "<img src='./images/large-default-user.png' class='responsive-img ' alt='User Image'>";
        }
        else{
            $image ="<img src='./uploads/profile".$id.".jpg?".'mt_rand'."class='responsive-img left' alt='User Image' style='max-height:100px;'>";
        }

        $output = "<div class='modal-content'>
        <div class='row'>
            <div class='col s8 m8 l8'>
                <span class='left borrower-id-modal'>$id</span>
            </div>
            <div class='col s4 m4 l4'>
                <a href='#!' class='modal-close waves-effect waves-green right'><i class='material-icons center'>close</i></a>
            </div>
        </div>
        <div class='row'>
            <div class='col s12 m12 l12 center-align' id='imageHolder'>
                $image
            </div>
        </div>
        <div class='row' style='margin-bottom: 0;'>
            <div class='col s12 m12 l12 center-align'>
                <span class='borrower-name-modal'>$uDetailsName</span>
            </div>
        </div>
        <div class='row'>
            <div class='col s12 m12 l12 center-align'>
                <span class='borrower-rating-modal'>$uDetailsRating<i class = 'fas fa-star' style='color:gold;'></i></span>
            </div>
        </div>
    </div>
    <div class='modal-fixed-footer'>
        <div class='row'>
            <div class='col s12 m12 l12'>
                <div class='row' style='margin-bottom:0px;'>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-val'>$uDetailsLoanCount</span>
                    </div>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-val'>98%</span>
                    </div>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-val'>2</span>
                    </div>
                </div>
                <div class='row' style='margin-bottom:35px;'>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-modal'>Loans</span>
                    </div>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-modal'>Repayment</span>
                    </div>
                    <div class='col s4 m4 l4 center-align'>
                        <span class='borrower-det-modal'>Defaults</span>
                    </div>
                </div>
            </div>
        </div>
    </div>";

        echo  $output;
    }
?>