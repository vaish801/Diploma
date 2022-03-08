<?php
$conn=mysqli_connect("localhost","root","","db1234");
$cate=$_POST["cat"];
$txt=$_POST["txt"];
$dat=$_POST["dat"];
session_start();
$_SESSION["cat"]=$cate;
$_SESSION["txt"]=$txt;
$_SESSION["dat"]=$dat;


?>