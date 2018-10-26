<?php
            
    require_once 'connect-db.php';
            
    // attempt update query execution
    if (isset($_POST['disable']))
    {
        $sql = "UPDATE users SET AccStatus='x' WHERE 'ID_Number' = $Id;";
    
        if($mysqli->query($sql) === true){
            echo "Account disabled successfully.";
            header("location: user-management.php");

            echo "
                    <script>
                        function myFunction() 
                        {
                            document.getElementById("table").deleteRow(0);
                        }
                    </script>
                ";

        } 

        else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
    } 
?>
<!-- function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
} -->