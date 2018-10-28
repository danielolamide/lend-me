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
                    var index, table = document.getElementById("table");
                        for (var i=1; i<table.rows.length; i++)
                        {
                            index = this.parentElement.rowIndex;
                            table.deleteRow(index);
                            console.log(index);
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