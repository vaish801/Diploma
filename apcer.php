<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../csss/homad.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Document</title>
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div class="mobo">
    <div class="sym"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="contain"><ul><li><a href="homuser.php" >Search</a></li>
<li><a href="appcer.php" class="current">My Appointments</a></li> 
<li><a href="viewcerti.php">My Certificates</a></li>
</ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a>
<!-- <a href="updmdr.php">Update Medical Records</a> -->
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>
<?php

$con=mysqli_connect("localhost","root","","db1234");
$apid=mysqli_real_escape_string($con,$_GET["id"]);
// echo $apid;
$qu="SELECT cer FROM appoint WHERE apid='$apid'";
$re=mysqli_query($con,$qu);
$va=mysqli_fetch_object($re);
$val=$va->cer;
if($val=="2")
{
    echo '<script type="text/javascript">';
    echo ' alert("You have received the certificate kindly check Certificates section");';
    echo 'window.location.href="appcer.php";';
    echo '</script>';
    echo "You have received the certificate kindly check Certificates section ";
}
elseif($val=="1")
{
    echo '<script type="text/javascript">';
    echo ' alert("Already applied for certificate");';
    echo 'window.location.href="appcer.php";';
    echo '</script>';
    echo "Already applied for certificate";
}
else{
$q="UPDATE appoint SET cer='1' WHERE apid='$apid'";

// echo $q;
$r=mysqli_query($con,$q);
echo '<script type="text/javascript">';
    echo ' alert("Applied for certificate");';
    echo 'window.location.href="appcer.php";';
    echo '</script>';
echo "Applied for Certificate";
}
    // header("Location:appcer.php");

?>