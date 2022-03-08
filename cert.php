<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../csss/homad.css">
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
    <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
    <div class="contain"><ul><li><a href="homus.php" >Search</a></li>
<li><a href="apodoc.php">Appointments</a></li>
<li><a href="pendr.php">Requested Appointments</a></li>
<li><a href="mdr.php">Medical Records</a></li>
<li><a href="cert.php" class="current">Certificate </a></li> 
<li><a href="sch.php">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>

<?php
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo "<h1>WELCOME DOCTOR</h1>";
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$q="SELECT * from appoint WHERE emai='$em' AND cer='1'";
$e=mysqli_query($con,$q);
$n=mysqli_num_rows($e);
if($n>0)
{
for($i=0;$i<$n;$i++)
{
    $row=mysqli_fetch_assoc($e);
    $apid=$row["apid"];
    $dat=$row["dat"];
    $tims=$row["tims"];
    $ptid=$row["ptid"];
    $ptnam=$row["ptnam"];
    $pro=$row["pro"];
    $ele="<div class='conten'><table><tr><td><label for='aid' style='margin:0px 20px;'>Appointment Id:</label></td><td><input name='aid' id='id".$i."' value='".$apid."'></td></tr><tr><td><label for='dat' style='margin:0px 20px;'>Date:</label></td><td><input name='dat' id='dat".$i."' value='".$dat."'></td></tr><tr><td><label for='tim' style='margin:0px 20px;'>Time:</label></td><td><input name='tim' id='tim".$i."' value='".$tims."'></td></tr><tr><td><label for='ptid' style='margin:0px 20px;'>Patient Id:</label></td><td><input name='ptid' id='ptid".$i."' value='".$ptid."'></td></tr><tr><td><label for='ptnam' style='margin:0px 20px;'>Patient Name:</label></td><td><input name='ptnam' id='ptnam".$i."' value='".$ptnam."'></td></tr><tr><td><label for='pr' style='margin:0px 20px;'>Issue:</label></td><td><input name='pr' id='pr".$i."' value='".$pro."'></td></tr><tr><td><a href='certificate.php?id=".$apid."' style='margin:0px 20px;'>Create Certificate</a></td></tr></div>";
    echo $ele;
}
}
else{
    echo "<h2>No Certificate Requests</h2>";
}
}
else
{
    header("Location:final.htmml");
}
?>