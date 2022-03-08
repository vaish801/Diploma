<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
        $con=mysqli_connect("localhost","root","","db1234");
        $dnam=$_POST["dnam"];
        $pnam=$_POST["pnam"];
        $qual=$_POST["qual"];
        $ag=$_POST["ag"];
        $pla=$_POST["pla"];
        $dat=$_POST["dat"];
        $sig=$_POST["sig"];
        $emuse=$_POST["emuse"];
        $aid=$_POST["aid"];
        $fr=$_POST["fr"];
        $to=$_POST["to"];
        $emdoc=$_SESSION["em"];
        $q="INSERT INTO certi VALUES ('$dnam','$emdoc','$pnam','$emuse','$qual','$ag','$pla','$dat','$sig','$aid','$fr','$to')";
        // echo $q;
        $r=mysqli_query($con,$q);
        if($r)
        {
        $qu="UPDATE appoint SET cer='2' WHERE apid='$aid'";
        // echo $qu;
        $re=mysqli_query($con,$qu);
        }
}
else{
        header("Location:sin.php");
    }

?>