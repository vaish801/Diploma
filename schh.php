<?php
session_start();
if(isset($_SESSION["na"])&& isset($_SESSION["em"]))
{
    $e=$_SESSION["em"];
// $lc="";
// $vc="";
// $lh="";
// $vh="";
// $lnh="";
// $vnh="";
$conn=mysqli_connect("localhost","root","","db1234");
$lc=$_POST["lc"];
$vc=$_POST["vc"];
$lh=$_POST["lh"];
$vh=$_POST["vh"];
$lnh=$_POST["lnh"];
$vnh=$_POST["vnh"];
echo $lc.$vc.$lh.$vh.$lnh.$vnh;
$q="UPDATE docto SET adc='$lc',vhc='$vc',adh='$lh',vhh='$vh',adnh='$lnh',vhnh='$vnh' WHERE ema='$e'";
$res=mysqli_query($conn,$q);
}
?>
