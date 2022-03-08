<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../csss/homad.css">
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
    <li><a href="apodoc.php" >Appointments</a></li>
    <li><a href="pendr.php" class="current">Requested Appointments</a></li>
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
$q="SELECT apid,dat,tims,ptid,ptnam,pro,loc FROM appoint WHERE dcid='$did' AND confirmm=0 ORDER BY apid DESC";
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
      $loc=$row["loc"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<form method='get' action='confirm.php'><table><tr><td><p id='aid".$aa."'>Appointment ID &nbsp : &nbsp</td><td>".$apid."</p></td></tr><input type='hidden' name='id' value='".$apid."'>";
      $di.="<tr><td><p id='daid".$aa."'>Date &nbsp : &nbsp</td><td>".$dat."</p></td></tr>";
      $di.="<tr><td><p id='tid".$aa."'>Slot &nbsp : &nbsp</td><td>".$tims."</p></td></tr>";
      $di.="<tr><td><p id='lid".$aa."'>Location &nbsp : &nbsp</td><td>".$loc."</p></td></tr>";
      $di.="<tr><td><p id='pid".$aa."'><a href='pinfo.php?id=".$ptid."'>Patient ID &nbsp : &nbsp</td><td>".$ptid."</a></p></td></tr>";
      $di.="<tr><td><p id='pnid".$aa."'>Patient Name &nbsp : &nbsp</td><td>".$ptnam."</p></td></tr>";
      $di.="<tr><td><p id='tmid".$aa."'>Set Timing &nbsp : &nbsp</p></td><td><input type='text' id='te".$aa."' name='texna' value=''></td><tr><td><input type='submit' value='Confirm' style='padding: 0px 10px;margin-left:10px;border:1px solid black;font-size:14px'></td></tr></table></form></div>";
    //next program
    //   $di.="<tr><td><p id='ceid".$aa."'><a href='confirm.php?id=".$apid."&amp;timi=".$_GET["texna$aa"]."'>Confirm</a></p></td></tr>";
      $di.="<tr><td><p id='nceid".$aa."'><a style='padding: 0px 10px;background-color: white;color:black;text-decoration:none;margin-left:10px;border:1px solid black' href='cancel.php?id=".$apid."'>Cancel</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  for($aa=0;$aa<$n;$aa++)
  {
  }
  
}
else{
    echo "<h1>No more Requests</h1>";
}
}
?>