<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo $_SESSION["na"];

    $conn=mysqli_connect("localhost","root","","db1234");
    $sym=$_POST["sym"];
    $med=$_POST["med"];
    $sug=$_POST["sug"];
    $ch=$_POST["ch"];
    $napid=$_POST["napid"];
    $ndat=$_POST["ndat"];
    $ntim=$_POST["ntim"];
    $nloc=$_POST["nloc"];
    $aid=$_POST["apid"];
    $prblm=$_POST["prblm"];
    echo $ch;
    $que="SELECT ptid,ptnam,pro,dcid,dcnam,emai,emause FROM appoint WHERE apid='$aid'";
    $res=mysqli_query($conn,$que);
    $v=mysqli_fetch_object($res);
    $pid=$v->ptid;
    $pnm=$v->ptnam;
    $did=$v->dcid;
    $dnm=$v->dcnam;
    $emd=$v->emai;
    $emu=$v->emause;
    $prb=$v->pro;
    $q="UPDATE appoint SET sym='$sym',med='$med',osug='$sug',sta='1',pro='$prblm' WHERE apid='$aid'";
    $r=mysqli_query($conn,$q);
    if($ch=="1")
    {
        echo "inside iff";
        $qu="INSERT INTO appoint (dat,tims,ptid,ptnam,pro,dcid,dcnam,loc,emai,emause) VALUES ('$ndat','$ntim','$pid','$pnm','$prb','$did','$dnm','$nloc','$emd','$emu')";
        echo $qu;
        $re=mysqli_query($conn,$qu);
    }
    else
    {
        echo "fecevrefe";
    }
}
else{
    header("Location:sin.php");
}

?>