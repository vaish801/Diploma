<?php
$con=mysqli_connect("localhost","root","","db1234");
$em=mysqli_real_escape_string($con,$_GET['id']);
$qu="DELETE FROM userlog WHERE Ema='$em'";
// echo $qu;
$re=mysqli_query($con,$qu);
$qr="UPDATE docto SET sta=0 WHERE ema='$em'";
$q="DELETE FROM docto WHERE ema='$em'";
$r=mysqli_query($con,$q);
$rr=mysqli_query($con,$qr);
if($rr)
{
    $que="DELETE FROM appoint where ema='$em'";
$res=mysqli_query($con,$que);
    header("Location:doc.php");
}
?>