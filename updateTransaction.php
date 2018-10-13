<?php
    include('connect-db.php');
    session_start();
    $select_transactions = "SELECT * FROM transactions WHERE User_ID = '{$_SESSION['idNo']}'";
    $process_selection = $con->query($select_transactions);
    
        if($process_selection->num_rows>0){  
            echo "<table class='responsive-table'>
            <thead>
                <th style='width:200px;'>Transaction ID</th>
                <th>Time Stamp</th>
                <th>Amount</th>
                <th>Transaction Type</th>
            </thead>
            <tbody>";  
            while($transactionTData = $process_selection->fetch_array()){
                echo "<tr>";
                echo"<td>".$transactionTData['TID']."</td>";
                echo"<td>".$transactionTData['TimeStamp']."</td>";
                echo"<td>".$transactionTData['Amount']."</td>";
                echo"<td>".$transactionTData['TransactionType']."</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        else{
            echo "<span class='black-text' style='font-size:20px;'>You do not have any transactions yet</span>";
        }
?>