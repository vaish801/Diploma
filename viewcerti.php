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
<li><a href="appcer.php">My Appointments</a></li> 
<li><a href="viewcerti.php" class="current">My Certificates</a></li> 
</ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a>
<!-- <a href="updmdr.php">Update Medical Records</a> -->
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$q="SELECT * FROM appoint WHERE cer='2' AND emause='$em'";
$r=mysqli_query($con,$q);
$c=mysqli_num_rows($r);
if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($r);
      $apid=$row["apid"];
      $dat=$row["dat"];
      $tims=$row["tims"];
      $ptid=$row["dcid"];
      $ptnam=$row["ptnam"];
      $pro=$row["pro"];
      $loc=$row["loc"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='aid".$aa."'>Appointment ID &nbsp : &nbsp</td><td>".$apid."</p></td></tr>";
      $di.="<tr><td><p id='daid".$aa."'>Date &nbsp : &nbsp</td><td>".$dat."</p></td></tr>";
      $di.="<tr><td><p id='tid".$aa."'>Timing &nbsp : &nbsp</td><td>".$tims."</p></td></tr>";
      $di.="<tr><td><p id='lid".$aa."'>Location &nbsp : &nbsp</td><td>".$loc."</p></td></tr>";
      $di.="<tr><td><p id='pid".$aa."'><a style='text-decoration:none;color:black' href='pinfo.php?id=".$ptid."'>Patient ID &nbsp : &nbsp</td><td>".$ptid."</a></p></td></tr>";
      $di.="<tr><td><p id='pnid".$aa."'>Patient Name &nbsp : &nbsp</td><td>".$ptnam."</p></td></tr>";
      $di.="<tr><td><p id='prid".$aa."'>Problem &nbsp : &nbsp</td><td>".$pro."</p></td></tr>";
      $di.="<tr><td><p id='deid".$aa."'><a href='vcert.php?id=".$apid."'>View Certificate</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}
else{
    echo "<h2>No certificates available</h2>";
}
?>
