<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo $_SESSION["na"];
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=$_POST["id"];
    $r=$_POST["rat"];
    $f=$_POST["feed"];
    $q="SELECT * FROM appoint WHERE apid='$v'";
    $ra=mysqli_query($conn,$q);
    $va=mysqli_fetch_object($ra);
    $pid=$va->ptid;
    $pnm=$va->ptnam;
    $dnm=$va->dcnam;
    $did=$va->dcid;
    $emd=$va->emai;
    $emu=$va->emause;
    $qu="INSERT INTO feed(apid,ptid,ptnam,dcid,dcnam,emd,emu,rat,fed) VALUES ('$v','$pid','$pnm','$did','$dnm','$emd','$emu','$r','$f')";
    $rr=mysqli_query($conn,$qu);
}
else{
    header("Location:final.html");
}

?>