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
// if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    // echo "<h1>WELCOME DOCTOR ".$_SESSION["na"]."</h1>";
    $con=mysqli_connect("localhost","root","","db1234");
     $em=$_SESSION["em"];
// $em="vavish@gmail.com";
$q="SELECT apid,tims,dat,pro,dcnam FROM appoint WHERE emause='$em'";
// echo $q;
$r=mysqli_query($con,$q);
$v=mysqli_num_rows($r);
// for($i=0;$i<$v;$i++)
// {
//     $row=mysqli_fetch_assoc($r);
//     $apid=$row["apid"];
//     $tims=$row["tims"];
//     $dat=$row["dat"];
//     $pro=$row["pro"];
//     $dcnam=$row["dcnam"];
//     if($pro=="")
//     {
//         echo "Pending Appointments : <br>";
//         $elemm="<div class='contentt' style='padding:10px 20px;font-size:20px;'><table><tr><td><label for='aid'>Appointment Id:</label></td><td><input type='text' name='aid' id='aid'".$i." value='".$apid."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dat'>Date:</label></td><td><input type='text' name='dat' id='dat'".$i." value='".$dat."' style='font-size:17px;' readonly></td></tr><tr><td><label for='tim'>Timing:</label></td><td><input type='text' name='tim' id='tim'".$i." value='".$tims."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dnam'>Doctor Name:</label></td><td><input type='text' name='dnam' id='dnam'".$i." value='".$dcnam."' style='font-size:17px;' readonly></td></tr></table></div>";
//         echo $elemm;
//     }
// }
$qqq="SELECT apid,tims,dat,pro,dcnam,timing FROM appoint WHERE emause='$em' AND pro=''";
// echo $q;
$rqq=mysqli_query($con,$qqq);
$vqq=mysqli_num_rows($rqq);
if($vqq>0)
{
    echo "<h1>Pending Appointments</h1>";
    for($i=0;$i<$vqq;$i++)
    {
        $row=mysqli_fetch_assoc($rqq);
    $apid=$row["apid"];
    $tims=$row["timing"];
    $dat=$row["dat"];
    $pro=$row["pro"];
    $dcnam=$row["dcnam"];
        $elemm="<div class='contenttt' style='padding:10px 20px;font-size:20px;'><table><tr><td><label for='aid'>Appointment Id:</label></td><td><input type='text' name='aid' id='aid'".$i." value='".$apid."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dat'>Date:</label></td><td><input type='text' name='dat' id='dat'".$i." value='".$dat."' style='font-size:17px;' readonly></td></tr><tr><td><label for='tim'>Timing:</label></td><td><input type='text' name='tim' id='tim'".$i." value='".$tims."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dnam'>Doctor Name:</label></td><td><input type='text' name='dnam' id='dnam'".$i." value='".$dcnam."' style='font-size:17px;' readonly></td></tr></table></div><hr>";
        echo $elemm;
    }
}
echo "<h1>Previous Appointments</h1>";
for($i=0;$i<$v;$i++)
{
    $row=mysqli_fetch_assoc($r);
    $apid=$row["apid"];
    $tims=$row["tims"];
    $dat=$row["dat"];
    $pro=$row["pro"];
    $dcnam=$row["dcnam"];
    // if($pro=="")
    // {
    //     echo "Pending Appointments : <br>";
    //     $elemm="<div class='contenttt' style='padding:10px 20px;font-size:20px;'><table><tr><td><label for='aid'>Appointment Id:</label></td><td><input type='text' name='aid' id='aid'".$i." value='".$apid."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dat'>Date:</label></td><td><input type='text' name='dat' id='dat'".$i." value='".$dat."' style='font-size:17px;' readonly></td></tr><tr><td><label for='tim'>Timing:</label></td><td><input type='text' name='tim' id='tim'".$i." value='".$tims."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dnam'>Doctor Name:</label></td><td><input type='text' name='dnam' id='dnam'".$i." value='".$dcnam."' style='font-size:17px;' readonly></td></tr></table></div>";
    //     echo $elemm;
    // }
    if($pro!="")
    {
    $elem="<div class='contentt' style='padding:10px 20px;font-size:20px;'><table><tr><td><label for='aid'>Appointment Id:</label></td><td><input type='text' name='aid' id='aid'".$i." value='".$apid."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dat'>Date:</label></td><td><input type='text' name='dat' id='dat'".$i." value='".$dat."' style='font-size:17px;' readonly></td></tr><tr><td><label for='tim'>Timing:</label></td><td><input type='text' name='tim' id='tim'".$i." value='".$tims."' style='font-size:17px;' readonly></td></tr><tr><td><label for='dnam'>Doctor Name:</label></td><td><input type='text' name='dnam' id='dnam'".$i." value='".$dcnam."' style='font-size:17px;' readonly></td></tr><tr><td><label for='pro'>Issue:</label></td><td><input type='text' name='pro' id='pro'".$i." value='".$pro."' style='font-size:17px;' readonly></td></tr><tr><td><a href='apcer.php?id=".$apid."'>Apply For Certificate</a></td></tr><tr><td><a href='mdrec.php?id=".$apid."'>View Details</a></td></tr><tr><td><a href='feed.php?id=".$apid."'>Give Feedback</a></td></tr></table></div><hr>";
    echo $elem;
    }
}
$li=""
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="mobo">
    <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Payner</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       </div>
       
</body>
</html> -->

