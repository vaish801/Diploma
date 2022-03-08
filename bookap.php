<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../csss/homad.css">
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
       <div class="contain"><ul><li><a href="#" class="current">Search</a></li>
<li><a href="appcer.php">My Appointments</a></li>
<li><a href="viewcerti.php">My Certificates</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","db1234");
$emadoc=mysqli_real_escape_string($conn,$_GET['iddoc']);
$_SESSION["emadoc"]=$emadoc;
$emause=mysqli_real_escape_string($conn,$_GET['iduse']);
$dat=mysqli_real_escape_string($conn,$_GET['dat']);
$_SESSION["dat"]=$dat;
if(isset($_SESSION["na"])&& isset($_SESSION["em"]))
{
    if($dat==""){echo '<script type="text/javascript">';
        echo ' alert("Please mention date to Book an Appointment")';  //not showing an alert box.
        echo '</script>';
    }
    // echo "hiiii";
$conn=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$s="SELECT adc,vhc,adh,vhh,adnh,vhnh FROM docto WHERE ema='$emadoc'";
// echo $s;
$r=mysqli_query($conn,$s);
$o=mysqli_fetch_object($r);

$lc=$o->adc;
$vc=$o->vhc;
$lh=$o->adh;
$vh=$o->vhh;
$lnh=$o->adnh;
$vnh=$o->vhnh;
// echo $lc;
//  echo $vc;
if($lc!="" && $vc!="")
{
$l=explode(",",$lc);
$v=explode(",",$vc);
// print_r($l);
$nc=sizeof($l);
echo "<h3 style='margin:0px 20px;'>Clinics</h3><br>";
for($i=1;$i<$nc;$i++)
{
$ele="<label for='lctxt' style='margin:10px 20px;'>Location</label> <input type='text' name='lctxt' id='lctxt".$i."' value='".$l[$i]."'>&nbsp<label for='vctxt' style='margin:10px 20px;'>Visiting Hours</label> <input type='text' name='vctxt' id='vctxt".$i."' value='".$v[$i]."'>";
if($_SESSION["dat"]!=""){
    $ele=$ele."<a href='bk.php?id=".$l[$i]."&amp;lc=cli&amp;tim=".$v[$i]."' style='margin:10px 20px;'>Book</a>";
}

echo $ele."<br>";
}
echo "<input type='text' name='numc' id='numc' value='".$nc."'hidden>";
// echo ;
}
if($lh!="" && $vh!="")
{
    $lhh=explode(",",$lh);
$vhh=explode(",",$vh);
$nho=sizeof($lhh);
echo "<br><br><h3 style='margin:0px 20px;'>Hospitals</h3><br>";
for($i=1;$i<$nho;$i++)
{
$ele="<label for='lhtxt' style='margin:10px 20px;'>Location</label> <input type='text' name='lhtxt' id='lhtxt".$i."' value='".$lhh[$i]."'>&nbsp<label for='vhtxt' style='margin:10px 20px;'>Visiting Hours</label> <input type='text' name='vhtxt' id='vhtxt".$i."' value='".$vhh[$i]."'>";
if($_SESSION["dat"]!=""){
    $ele=$ele."<a href='bk.php?id=".$lhh[$i]."&amp;lc=hos&amp;tim=".$v[$i]."' style='margin:10px 20px;'>Book</a>";
}
echo $ele."<br>";
}
echo "<input type='text' name='numh' id='numh' value='".$nho."'hidden>";
}
if($lnh!="" && $vnh!="")
{
    $lnnh=explode(",",$lnh);
$vnnh=explode(",",$vnh);
$nnh=sizeof($lnnh);
echo "<h3>Nursing Homes</h3><br>";
for($i=1;$i<$nnh;$i++)
{
$ele="<label for='lnhtxt' style='margin:10px 20px;'>Location</label> <input type='text' name='lnhtxt' id='lnhtxt".$i."' value='".$lnnh[$i]."'>&nbsp<label for='vnhtxt' style='margin:10px 20px;'>Visiting Hours</label> <input type='text' name='vnhtxt' id='vnhtxt".$i."' value='".$vnnh[$i]."'>";
if($_SESSION["dat"]!=""){
    $ele=$ele."<a href='bk.php?id=".$lnnh[$i]."&amp;lc=nh&amp;tim=".$v[$i]."'>Book</a>";
}
echo $ele."<br>";
}
echo "<input type='text' name='numnh' id='numnh' value='".$nnh."'hidden>";
}
// print_r($l);
// print_r($v);
// print_r($lhh);
// print_r($vhh);
// print_r($lnnh);
// print_r($vnnh);

// ////$a= implode("",$l);
// // echo $a;
// $b=explode(",",$a);
// // print_r($b);
// $n=sizeof($b);
// // echo $n;
// $vh=explode("=",$v);
// // print_r($vh);
// $vv=implode("",$vh);
// // echo $vv;
// $vvv=explode(",",$vv);
// // print_r($vvv);
// $vr=sizeof($vvv);
// for($i=1;$i<$vr;$i++)
// {
//     $ele="<label for='ltxt'>Location</label> <input type='text' name='ltxt' id='ltxt".$i."' value='".$b[$i]."'>&nbsp<label for='vtxt'>Visiting Hours</label> <input type='text' name='vtxt' id='vtxt".$i."' value='".$vvv[$i]."'>";
// echo $ele."<br>";
//     //$(".bd").show();
// }
// echo "<input type='text' name='num' id='num' value='".$vr."'hidden>";
 }
else
{
    header("Location:sin.php");
}
?>