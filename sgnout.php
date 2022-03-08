<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="hoo.css">
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div class="main">
    <div class="sym"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="sgnou" style="text-align:center">
           <h1>You have been successfully Signed Out</h1>
       </div>
</div> 
</body>
</html>

<?php
session_start();
unset($_SESSION["na"]);
unset($_SESSION["em"]);
unset($_SESSION["ty"]);
header("Location:final.html");
?>