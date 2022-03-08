<?php
session_start();
$ems=$_SESSION["em"];
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
        $qual=$_POST["qual"];
        $nnn=$fn." ".$mn." ".$ln;
        $q="UPDATE docto SET dcnam='$nnn',gen='$gen',ad='$ad',pho='$pho',qual='$qual',age='$ag',ema='$em',sta='0' WHERE ema='$ems'";
        $r=mysqli_query($con,$q);
        $qq="UPDATE userlog SET Nam='$un',Pas='$ps',Ema='$em' WHERE Ema='$ems'";
        $rr=mysqli_query($con,$qq);
        //echo $r.$rr;

        ?>