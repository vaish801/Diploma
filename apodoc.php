<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../csss/homad.css">
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
<li><a href="pendr.php">Requested Appointments</a></li>
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
$qu="SELECT dcid,dcnam FROM docto WHERE ema='$em'";
$re=mysqli_query($con,$qu);
$va=mysqli_fetch_object($re);
$did=$va->dcid;
$dinm=$va->dcnam;
echo "<h1>Welcome Doctor </h1><br><h2>Your Appointments:</h2>";
$q="SELECT apid,dat,tims,ptid,ptnam,pro,loc FROM appoint WHERE dcid='$did' ORDER BY apid DESC";
//echo $q;
$r=mysqli_query($con,$q);
//echo $r;
$n=mysqli_num_rows($r);
//echo $n;
if($n>0)
{
    //echo "inside if";
  for($aa=0;$aa<$n;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($r);
      $apid=$row["apid"];
      $dat=$row["dat"];
      $tims=$row["tims"];
      $ptid=$row["ptid"];
      $ptnam=$row["ptnam"];
      $pro=$row["pro"];
      $loc=$row["loc"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='aid".$aa."'>Appointment ID &nbsp : &nbsp</td><td>".$apid."</p></td></tr>";
      $di.="<tr><td><p id='daid".$aa."'>Date &nbsp : &nbsp</td><td>".$dat."</p></td></tr>";
      $di.="<tr><td><p id='tid".$aa."'>Timing &nbsp : &nbsp</td><td>".$tims."</p></td></tr>";
      $di.="<tr><td><p id='lid".$aa."'>Location &nbsp : &nbsp</td><td>".$loc."</p></td></tr>";
      $di.="<tr><td><p id='pid".$aa."'><a href='pinfo.php?id=".$ptid."'>Patient ID &nbsp : &nbsp</td><td>".$ptid."</a></p></td></tr>";
      $di.="<tr><td><p id='pnid".$aa."'>Patient Name &nbsp : &nbsp</td><td>".$ptnam."</p></td></tr>";
      $di.="<tr><td><p id='prid".$aa."'>Problem &nbsp : &nbsp</td><td>".$pro."</p></td></tr>";
      $di.="<tr><td><p id='deid".$aa."'><a href='mdrec.php?id=".$apid."'>View Details</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}
}
?>