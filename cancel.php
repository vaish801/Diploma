<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="contain"><ul><li><a href="homus.php">Search</a></li>
        <li><a href="apodoc.php" class="current">Appointments</a></li>
        <li><a href="mdr.php">Medical Records</a></li>
        <li><a href="cert.php">Certificate</a></li> 
        <li><a href="sch.php">Schedule</a></li></ul>
        <div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
        <a href="sgnout.php">Sign Out</a></div></div>
        </div>
</body>
</html>
<?php
if(!(isset($_SESSION["na"]) && isset($_SESSION["em"])))
{
    echo "Please Sign in first";
    header("Location:sin.php");
}
else{
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$id=mysqli_real_escape_string($con,$_GET['id']);
$up="UPDATE appoint SET confirmm=2 WHERE apid=$id";
$upp="DELETE FROM appoint WHERE apid=$id";
$r=mysqli_query($con,$up);
$rr=mysqli_query($con,$upp);
if($r)
{
echo '<script type="text/javascript">'; 
echo 'alert("Appointment cancelled");'; 
echo 'window.location.href = "pendr.php";';
echo '</script>';
}
else{
    echo "There was a problem while confirming";
}
}
?>