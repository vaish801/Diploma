<?php
        $con=mysqli_connect("localhost","root","","db1234");
        $fn=$_POST["fnam"];
        $mn=$_POST["mnam"];
        $ln=$_POST["lnam"];
        $ag=$_POST["ag"];
        $gen=$_POST["gen"];
        $pho=$_POST["ph"];
        $em=$_POST["em"];
        $ad=$_POST["ad"];
        $un=$_POST["us"];
        $ps=$_POST["ps"];
        $ty=$_POST["ty"];
        console.log("php".$ty);
        echo "Php".$ty;
        if($ty=="User")
        {
        $bg=$_POST["bg"];
        $pro=$_POST["pro"];
        $alle=$_POST["alle"];
        $ops=$_POST["ops"];
        $opo=$_POST["opo"];
        $opro=$_POST["opro"];
        $doc=$_POST["doc"];
        if($pro==undefined)
        {
            $pro="";
        }
        if($alle==undefined)
        {
            $alle="";
        }
        if($ops==undefined)
        {
            $ops="";
        }
        if($opo==undefined)
        {
            $opo="";
        }
        if($opro==undefined)
        {
            $opro="";
        }
        }
        if($ty=="Doctor")
        {
            $adc=$_POST["adc"];
            $vhc=$_POST["vhc"];
            $adh=$_POST["adh"];
            $vhh=$_POST["vhh"];
            $adnh=$_POST["adnh"];
            $vhnh=$_POST["vhnh"];
            $noc=$_POST["noc"];
            $noh=$_POST["noh"];
            $nonh=$_POST["nonh"];
            //echo $loc;
            //echo $vhrs;
        $type=$_POST["type"];
        $pg=$_POST["pg"];
        $pat=$_POST["pat"];
        $qqq=$type." ".$pg;
        }
        $nnn=$fn." ".$mn." ".$ln;
        
        //echo "hiii";
    $q="SELECT Ema FROM userlog WHERE Ema='$em'";
    $r=mysqli_query($con,$q);
    if($r==true)
    {
        $num=mysqli_num_rows($r);
    $v=mysqli_fetch_object($r);
    $va=$v->Ema;
    if($em==$va)
    {
        echo "Email is already registered";
        header("refresh:2;url=sup.php");
    }
    else{
        if($ty=="Doctor")
        {
         
        $que="INSERT INTO docto (dcnam,gen,ad,adc,vhc,noc,adh,vhh,noh,adnh,vhnh,nonh,qual,atach,age,pho,ema,sta) values ('$nnn','$gen','$ad','$adc','$vhc','$noc','$adh','$vhh','$noh','$adnh','$vhnh','$nonh','$qqq','$o','$ag','$pho','$em','0')";
            $resu=mysqli_query($con,$que);
            $qu="INSERT INTO userlog (Nam,Pas,Ema,Phone_N,addres,Age,Gender,F_Name,M_Name,L_Name,Typ) VALUES ('$un','$ps','$em','$pho','$ad','$ag','$gen','$fn','$mn','$ln','$ty')";
        //echo $qu;
        $res=mysqli_query($con,$qu);
        if($res==true)
        {
            echo "Doctor";
            session_start();
            $_SESSION["ty"]=$ty;
            $_SESSION["na"]=$un;
            $_SESSION["em"]=$em;
            // header("Location:homus.php");
        }
    }
    //}
        if($ty=="User")
        {
         
          $quer="INSERT INTO usero (usnam,gen,ad,pho,ema,ag,bgrp,probl,alleg,posur,poorr,opro,doc,sta) values ('$nnn','$gen','$ad','$pho','$em','$ag','$bg','$pro','$alle','$ops','$opo','$opro','$uo','1')";
          echo $quer;
          $resul=mysqli_query($con,$quer);
          $qu="INSERT INTO userlog (Nam,Pas,Ema,Phone_N,addres,Age,Gender,F_Name,M_Name,L_Name,Typ) VALUES ('$un','$ps','$em','$pho','$ad','$ag','$gen','$fn','$mn','$ln','$ty')";
        //echo $qu;
        $res=mysqli_query($con,$qu);
        if($res==true)
        {
            echo "User";
            session_start();
            $_SESSION["ty"]=$ty;
            $_SESSION["na"]=$un;
            $_SESSION["em"]=$em;
            // header("Location:homuser.php");
        }
        }
    
    } 
}
else{
    echo "You are already registered";
}
        ?>