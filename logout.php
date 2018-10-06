<?php
  session_start();
  session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/materialize.css" />
    <link rel="icon" type="image/png" href="./images/blue-coin.png">
    <script src="./js/materialize.js"></script>
    <style>
        #logout-content{
            background: #4f78a4;
            /* Old browsers */
            background: -moz-linear-gradient(45deg, #4f78a4 0%, #70baba 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(45deg, #4f78a4 0%, #70baba 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(45deg, #4f78a4 0%, #70baba 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4f78a4', endColorstr='#70baba', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
            padding: 10px;
            border-radius:20px;
            margin-top: 35vh;
            
        }
        a:hover{
            border-bottom: solid 4px #25BB9B;
        }
        a{
            font-size:20px;
        }
    </style>

</head>
<body>
    <div class="center container center-align" id="logout-content"> 
        <h4 class="white-text">Thank you.</h4>
        <div>&nbsp;</div>
        <a href="./index.html" class="white-text">Return to Homepage</a>
        <div>&nbsp;</div>
    </div>
</body>
</html>