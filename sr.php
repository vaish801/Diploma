<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
    <select name="drp" id="drp">
        <option value="Name">Name</option>
        <option value="Qualifications">Qualifications</option>
        <option value="Speciality">Category</option>
        <option value="Availability"></option>
        <option value="Location"></option>
    </select>
</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","","db1234");
$q="Select loc,vhrs from docto WHERE ema='sss@gmail.com'";
$r=mysqli_query($conn,$q);
$e=mysqli_fetch_object($r);
$loc=$e->loc;
$v=$e->vhrs;
echo $loc;
echo $v;
$l=explode("-",$loc);
print_r(explode("-",$loc));
//print_r(explode(",",$l));

$a= implode("",$l);
echo $a;
$b=explode(",",$a);
print_r($b);
$n=sizeof($b);
echo $n;
$vh=explode("=",$v);
print_r($vh);
$vv=implode("",$vh);
echo $vv;
$vvv=explode(",",$vv);
print_r($vvv);
// $in=0;
//  for($i=1;$i<$n;$i++)
//  {
    
//      $ar[$i]=$b[$i];
//      $in++;
//  }
//  print_r($ar)
?>