<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
$conn=mysqli_connect("localhost","root","","db1234");
$ssp="SELECT dcnam,adc,adh,adnh,qual FROM docto";
$qp=mysqli_query($conn,$ssp);
$qup=mysqli_fetch_all($qp,MYSQLI_ASSOC);
$np=mysqli_num_rows($qp);
for($i=0;$i<$np;$i++)
{
    $t[$i]=$qup[$i]["dcnam"];
    $ti[$i]=$qup[$i]["adc"];
    $tii[$i]=$qup[$i]["adh"];
    $to[$i]=$qup[$i]["adnh"];
    $too[$i]=$qup[$i]["qual"];
    } 
    print_r(array_merge($t,$ti,$tii,$to,$too));
}
else{
    header("Location:sin.php");
}
?>