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
       <div class="contain"><ul><li><a href="homus.php">Search</a></li>
<li><a href="apodoc.php">Appointments</a></li>
<li><a href="pendr.php">Requested Appointments</a></li>
<li><a href="mdr.php">Medical Records</a></li>
<li><a href="cert.php">Certificate</a></li> 
<li><a href="sch.php" class="current">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
    <h1>Update Regular Schedule</h1>
    <div class="lv"></div>
    <div class="bd" style="position: absolute; 
            left: 250px; 
            top: 600px;"><input type="button" value="Update" id="buttt" style="padding:10px 20px;"></div>
</div>
<script>
$(document).ready(function(){
$("#buttt").click(function(){
var numc=$("#numc").val();
var numh=$("#numh").val();
var numnh=$("#numnh").val();
console.log(numc+numh+numnh);
 var i;
 var lc="";
 var vc="";
 var lh="";
 var vh="";
 var lnh="";
 var vnh="";
 if(numc!=undefined)
 {
    
 for(i=1;i<numc;i++)
 {
     lc=lc+","+$("#lctxt"+i).val();
     vc=vc+","+$("#vctxt"+i).val();
 }

 //console.log(lc+" ----"+vc);
 }
 if(numh!=undefined)
 {
   
 for(i=1;i<numh;i++)
 {
     lh=lh+","+$("#lhtxt"+i).val();
     vh=vh+","+$("#vhtxt"+i).val();
 }
 
 //console.log(lh+" ----"+vh);
 }
 if(numnh!=undefined)
 {
   
 for(i=1;i<numnh;i++)
 {
     lnh=lnh+","+$("#lnhtxt"+i).val();
     vnh=vnh+","+$("#vnhtxt"+i).val();
 }
 
 //console.log(lnh+" ----"+vnh);
 }
// for(i=1;i<n;i++)
// {
//      loc=loc+"-"+$("#ltxt"+i).val();
//      hrs=hrs+"="+$("#vtxt"+i).val();
// }
// alert(loc);
// alert(hrs);
var dataa="lc="+lc+"&vc="+vc+"&lh="+lh+"&vh="+vh+"&lnh="+lnh+"&vnh="+vnh;
$.ajax({
    type:"post",
    url:"schh.php",
    data:dataa,
    success:function(result){
        alert(result);
    }
 });
 });
});
</script>
</body>
</html>
<?php
if(isset($_SESSION["na"])&& isset($_SESSION["em"]))
{
$conn=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$s="SELECT adc,vhc,noc,adh,vhh,noh,adnh,vhnh,nonh FROM docto WHERE ema='$em'";
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
$nc=sizeof($l);
echo "<h2 style='margin:0px 20px;'>Clinics</h2><br>";
for($i=1;$i<$nc;$i++)
{
$ele="<label for='lctxt' style='margin:0px 20px;'>Location</label> <input type='text' name='lctxt' id='lctxt".$i."' value='".$l[$i]."'>&nbsp<label for='vctxt' style='margin:0px 20px;'>Visiting Hours</label> <input type='text' name='vctxt' id='vctxt".$i."' value='".$v[$i]."'>";
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
echo "<br><br><h2 style='margin:0px 20px;'>Hospitals</h2><br>";
for($i=1;$i<$nho;$i++)
{
$ele="<label for='lhtxt' style='margin:0px 20px;'>Location</label> <input type='text' name='lhtxt' id='lhtxt".$i."' value='".$lhh[$i]."'>&nbsp<label for='vhtxt' style='margin:0px 20px;'>Visiting Hours</label> <input type='text' name='vhtxt' id='vhtxt".$i."' value='".$vhh[$i]."'>";
echo $ele."<br>";
}
echo "<input type='text' name='numh' id='numh' value='".$nho."'hidden>";
}
if($lnh!="" && $vnh!="")
{
    $lnnh=explode(",",$lnh);
$vnnh=explode(",",$vnh);
$nnh=sizeof($lnnh);
echo "<br><br><h2 style='margin:0px 20px;'>Nursing Homes</h2><br>";
for($i=1;$i<$nnh;$i++)
{
$ele="<label for='lnhtxt' style='margin:0px 20px;'>Location</label> <input type='text' name='lnhtxt' id='lnhtxt".$i."' value='".$lnnh[$i]."'>&nbsp<label for='vnhtxt' style='margin:0px 20px;'>Visiting Hours</label> <input type='text' name='vnhtxt' id='vnhtxt".$i."' value='".$vnnh[$i]."'>";
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