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
$v=mysqli_real_escape_string($con,$_GET['id']);
$em=$_SESSION["em"];
//echo "Hiiiiiiiiiiiiii".$em;
$q="SELECT usnam,gen,ad,pho,ema,ag,bgrp,probl,alleg,posur,poorr,opro,doc,sta FROM usero WHERE usid='$v'";
 $que="SELECT  FROM docto WHERE ema='$em'";
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
      $usnam=$row["usnam"];
      $gen=$row["gen"];
      $ad=$row["ad"];
      $pho=$row["pho"];
      $ema=$row["ema"];
      $ag=$row["ag"];
      $bgrp=$row["bgrp"];
      $probl=$row["probl"];
      $alleg=$row["alleg"];
      $posur=$row["posur"];
      $poorr=$row["poorr"];
      $doc=$row["doc"];
      $sta=$row["sta"];
      $di="<div class='usi' style='border:2px solid gray;margin:10px;font-size:20px;padding:20px;
    '><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nid".$aa."'>Name &nbsp : &nbsp</td><td>".$usnam."</p></td></tr>";
      $di.="<tr><td><p id='gid".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='aid".$aa."'>Address &nbsp : &nbsp</td><td>".$ad."</p></td></tr>";
      $di.="<tr><td><p id='cid".$aa."'>Contact &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='eid".$aa."'>Email &nbsp : &nbsp</td><td>".$ema."</p></td></tr>";
      $di.="<tr><td><p id='agid".$aa."'>Age &nbsp : &nbsp</td><td>".$ag."</p></td></tr>";
      $di.="<tr><td><p id='bid".$aa."'>Blood Group &nbsp : &nbsp</td><td>".$bgrp."</p></td></tr>";
      $di.="<tr><td><p id='prid".$aa."'>Problem &nbsp : &nbsp</td><td>".$probl."</p></td></tr>";
      $di.="<tr><td><p id='alid".$aa."'>Allergies &nbsp : &nbsp</td><td>".$alleg."</p></td></tr>";
      $di.="<tr><td><p id='posid".$aa."'>Post Operations(Surgical) &nbsp : &nbsp</td><td>".$posur."</p></td></tr>";
      $di.="<tr><td><p id='pooid".$aa."'>Post Operations(Operational) &nbsp : &nbsp</td><td>".$poorr."</p></td></tr></table></div>";
      //$di.="<tr><td><p id='reid".$aa."'>Reports &nbsp : &nbsp</td><td><img src='".$doc."' alt='Report' height='100px' width='100px'></td></tr></table></div>";
      $di.="<tr><td><a href='viewapp.php?id=".$ema."'>View Appiontments</a></td></tr></div>";
      echo $di;
  }
  
}
}
?>