<?php
session_start();
$ems=$_SESSION["em"];
        $con=mysqli_connect("localhost","root","","db1234");
        $usnam=$_POST["usnam"];
        $ag=$_POST["ag"];
        $gen=$_POST["gen"];
        $pho=$_POST["pho"];
        $ema=$_POST["em"];
        $ad=$_POST["ad"];
        $alleg=$_POST["alleg"];
        // $bgrp=$_POST["bgrp"];
        $opro=$_POST["opro"];
        $probl=$_POST["probl"];
        $posur=$_POST["posur"];
        $poorr=$_POST["poorr"];
        $usnamm=$_POST["usnamm"];
        $uspass=$_POST["uspass"];

        $q="UPDATE usero SET usnam='$usnam',gen='$gen',ad='$ad',pho='$pho',posur='$posur',ag='$ag',ema='$ema',poorr='$poorr',opro='$opro',alleg='$alleg',probl='$probl' WHERE ema='$ems'";
        $r=mysqli_query($con,$q);
        $qq="UPDATE userlog SET Nam='$usnamm',Pas='$uspass',Ema='$ema' WHERE Ema='$ems'";
        $rr=mysqli_query($con,$qq);
        
        ?>