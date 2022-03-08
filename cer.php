<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo "<h1>WELCOME DOCTOR ".$_SESSION["na"]."</h1>";
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$aid=mysqli_real_escape_string($con,$_GET['id']);
$q="SELECT * FROM appoint WHERE apid='$aid'";
$e=mysqli_query($con,$q);
$n=mysqli_num_rows($e);
for($i=0;$i<$n;$i++)
{
    $row=mysqli_fetch_assoc($e);
    $apid=$row["apid"];
    $dat=$row["dat"];
    $tims=$row["tims"];
    $ptid=$row["ptid"];
    $ptnam=$row["ptnam"];
    $pro=$row["pro"];
}
}
else{
    header("Location:sin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../csss/homad.css">
    <title>Document</title>
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
<li><a href="mdr.php">Medical Records</a></li>
<li><a href="cert.php" class="current">Certificate </a></li> 
<li><a href="sch.php">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
    <div class="conten">
    <label for="aid">Appointment Id:</label><input type="text" name="aid" id="aid" value=<?php echo $apid; ?>>
    <label for="dat">Date</label><input type="text" name="dat" id="dat" value=<?php echo $dat; ?>>
    <label for="tim">Timing:</label><input type="text" name="tim" id="tim" value=<?php echo $tims; ?>>
    <label for="pnam">Patient Name:</label><input type="text" name="pnam" id="pnam" value=<?php echo $ptnam; ?>>
    <label for="dnam">Doctor Name:</label><input type="text" name="dnam" id="dnam" value=<?php echo $dnam; ?>>
    <label for="">Appointment Id:</label><input type="text" name="aid" id="aid" value=<?php echo $apid; ?>>
    </div>
</div>
</body>
</html>