<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
$con=mysqli_connect("localhost","root","","db1234");
$n=$_POST["name"];
$p=$_POST["passs"];
$e=$_POST["emai"];
$rr=$_POST["jadu"];
// echo $n.$p.$e.$r;
$q="Select Ema from userlog where Ema='$e'";
// echo $q;
$r=mysqli_query($con,$q);
$val=mysqli_fetch_object($r);
// echo $val;
$v=$val->Ema;
if($e==$v)
{
    $qu="Select Pas from userlog where Ema='$e'";
    // echo $qu;
    $re=mysqli_query($con,$qu);
    $valu=mysqli_fetch_object($re);
    $va=$valu->Pas;
    if($va==$p)
    {
        $que="Select Typ from userlog where Ema='$v'";
        // echo $que;
        $res=mysqli_query($con,$que);
        $value=mysqli_fetch_object($res);
        $vaa=$value->Typ;
        if($vaa=='Doctor')
        {   
        echo "Doctor";
        //echo $rr;
        $sel="SELECT dcid FROM docto WHERE ema='$e'";
        $rsel=mysqli_query($con,$sel);
        $vsel=mysqli_fetch_object($rsel);
        $vvsel=$vsel->dcid;
        $_SESSION["na"]=$n;
        $_SESSION["em"]=$e;
        $_SESSION["ty"]="Doctor";
        $_SESSION["id"]=$vvsel;
        if($rr==1)
        {
            $cnam="Cookname";
            $cval=$n;
            setcookie($cnam,$cval,time()+(60),"/");
        } 
        }
        
        if($vaa=='User')
        {
        echo "User";
        $sele="SELECT usid FROM usero WHERE ema='$e'";
        $rsele=mysqli_query($con,$sele);
        $vsele=mysqli_fetch_object($rsele);
        $vvsele=$vsele->usid;
        $_SESSION["id"]=$vvsele;
        $_SESSION["na"]=$n;
        $_SESSION["em"]=$e;
        $_SESSION["ty"]="User";
        if($rr==1)
        {
            $cnam="Cookname";
            $cval=$n;
            setcookie($cnam,$cval,time()+(60),"/");
        } 
        }
    
        if($vaa=='Admin'){
        echo "Admin";
        $_SESSION["na"]=$n;
        $_SESSION["em"]=$e;
        $_SESSION["ty"]="Admin";
        if($rr==1)
        {
            $cnam="Cookname";
            $cval=$n;
            setcookie($cnam,$cval,time()+(60),"/");
        } 
        }
    }

    
    else{
        echo "Incorrect Password";
    }
}
else{
    echo "You are not registered";
}
?>