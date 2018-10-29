<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<?php
            
            require_once 'connect-db.php';
            $id = $_GET['ID_Number'];
                          
                echo "<script type='text/javascript'>
                        $(document).ready(function(){
                            $('disable').click(function(){
                                var tableData = $(this).children('td').map(function(){
                                    return $(this).text();
                                }).get();
                                var td=tableData[0];
                                alert(td);
                            });
                        });
                    </script>";

                $sql = "UPDATE users SET AccStatus= 'x' WHERE 'ID_Number' = '$x';";
                $query = $con->query($sql);
            
                if($query === true){
                    // echo "Account disabled successfully.";
                    // header("location: user-management.php");
                } 
        
                else{
                    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                }
             
?>

<!-- 
    var x = document.getElementById("table").rows[0].cells.length;
                    var index, table = document.getElementById("table");
                        for (var i=1; i<table.rows.length; i++)
                        {
                            index = this.parentElement.rowIndex;
                            table.deleteRow(index);
                            console.log(index);
                        }


                        echo "
                    <script>
                        function deleteRow(r) {
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("table").deleteRow(i);
                    </script>
                ";
} -->