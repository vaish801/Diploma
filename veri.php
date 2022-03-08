<?php
$con=mysqli_connect("localhost","root","","db1234");
$em=mysqli_real_escape_string($con,$_GET['id']);
$q="UPDATE docto set sta='1' WHERE ema='$em'";
$r=mysqli_query($con,$q);
if($r)
{
    header("Location:homad.php");
}
?>