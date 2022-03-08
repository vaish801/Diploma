<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../csss/homad.css">
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div class="mobo">
    <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="contain"><ul><li><a href="#" class="current">Search</a></li>
<li><a href="appcer.php">My Appointments</a></li>
<li><a href="viewcerti.php">My Certificates</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","db1234");
$v=mysqli_real_escape_string($conn,$_GET['id']);
// echo $v;
$va=mysqli_real_escape_string($conn,$_GET['lc']);
//  echo $va;
$val=mysqli_real_escape_string($conn,$_GET['tim']);
 if(isset($_SESSION["na"])&& isset($_SESSION["em"]))
{
    // echo "hiiii";
$conn=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$dat=$_SESSION["dat"];


// echo "SESSSSSION".$dat;
$emadoc=$_SESSION["emadoc"];
$s="SELECT adc,vhc,noc,adh,vhh,noh,adnh,vhnh,nonh FROM docto WHERE ema='$emadoc'";
//  echo $s;
$r=mysqli_query($conn,$s);
$o=mysqli_fetch_object($r);

$lc=$o->adc;
$vc=$o->vhc;
$noc=$o->noc;
$lh=$o->adh;
$vh=$o->vhh;
$noh=$o->noh;
$lnh=$o->adnh;
$vnh=$o->vhnh;
$nonh=$o->nonh;
// echo $lc;
//  echo $vc;
if($lc!="" && $vc!="")
{
$l=explode(",",$lc);
$vo=explode(",",$vc);
$nooc=explode(",",$noc); 
$nc=sizeof($l);
for($i=1;$i<$nc;$i++)
{
    // echo $l[$i];
    $numc=$nooc[$i];
if($l[$i]==$v)
{
    $q="SELECT * FROM appoint WHERE loc='$v' AND emai='$emadoc' AND dat='$dat'";
    //  echo $q;
    $qr=mysqli_query($conn,$q);
    $cqr=mysqli_num_rows($qr);
    if($cqr==$numc)
    {
        echo '<script type="text/javascript">'; 
echo 'alert("Sorry all slots full");'; 
echo 'window.location.href = "homuser.php";';
echo '</script>';
        echo "<div class='ap' width='100%' margin='auto'>Sorry all slots full</div>";
    }
    else{
        $q0="SELECT * FROM docto WHERE ema='$emadoc'";
        $r0=mysqli_query($conn,$q0);
        $v0=mysqli_fetch_object($r0);
$id0=$v0->dcid;
$nam0=$v0->dcnam;
        $q1="SELECT * FROM usero WHERE ema='$em'";
        $r1=mysqli_query($conn,$q1);
        $v1=mysqli_fetch_object($r1);
$id=$v1->usid;
$nam=$v1->usnam;
// echo $nam;
        $qu="INSERT INTO appoint(dat,tims,ptid,ptnam,dcid,dcnam,emai,emause,loc) VALUES  ('$dat','$val','$id','$nam','$id0','$nam0','$emadoc','$em','$v')";
        //  echo $qu;
        $ru=mysqli_query($conn,$qu);
        if($ru)
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Appointment booked successfully");'; 
            echo 'window.location.href = "homuser.php";';
            echo '</script>';
            echo "<div class='ap' width='100%' text-align='center'>Appointment booked successfully</div>";
        }
    }
}

}
}

if($lh!="" && $vh!="")
{
$l1=explode(",",$lh);
$v1=explode(",",$vh);
$nooh=explode(",",$noh); 
$nuh=sizeof($l1);
for($i=1;$i<$nuh;$i++)
{
    // echo $l[$i];
    $numh=$nooh[$i];
if($l1[$i]==$v)
{
    $q="SELECT * FROM appoint WHERE loc='$v' AND emai='$emadoc' AND dat='$dat'";
    //  echo $q;
    $qr=mysqli_query($conn,$q);
    $cqr=mysqli_num_rows($qr);
    if($cqr==$numh)
    {
        echo "<div class='ap' width='100%' text-align='center'>Sorry all slots full</div>";
    }
    else{
        $q01="SELECT * FROM docto WHERE ema='$emadoc'";
        $r01=mysqli_query($conn,$q01);
        $v01=mysqli_fetch_object($r01);
$id01=$v01->dcid;
$nam01=$v01->dcnam;
        $q10="SELECT * FROM usero WHERE ema='$em'";
        $r10=mysqli_query($conn,$q10);
        $v10=mysqli_fetch_object($r10);
$id10=$v10->usid;
$nam10=$v10->usnam;
// echo $nam10;
        $qu="INSERT INTO appoint(dat,tims,ptid,ptnam,dcid,dcnam,emai,emause,loc) VALUES  ('$dat','$val','$id10','$nam10','$id01','$nam01','$emadoc','$em','$v')";
        //  echo $qu;
        $ru=mysqli_query($conn,$qu);
        if($ru)
        {
            echo "<div class='ap' width='100%' text-align='center'>Appointment booked successfully</div>";
        }
    }
}

}
}

if($lnh!="" && $vnh!="")
{
$l2=explode(",",$lnh);
$v2=explode(",",$vnh);
$noonh=explode(",",$nonh); 
$nnh=sizeof($l2);
for($i=1;$i<$nnh;$i++)
{
    // echo $l2[$i];
    $numnh=$noonh[$i];
if($l2[$i]==$v)
{
    $q="SELECT * FROM appoint WHERE loc='$v' AND emai='$emadoc'  AND dat='$dat'";
    //  echo $q;
    $qr=mysqli_query($conn,$q);
    $cqr=mysqli_num_rows($qr);
    if($cqr==$numnh)
    {
        echo "Sorry all slots full";
    }
    else{
        $q2="SELECT * FROM docto WHERE ema='$emadoc'";
        $r2=mysqli_query($conn,$q2);
        $v02=mysqli_fetch_object($r2);
$id2=$v02->dcid;
$nam2=$v02->dcnam;
        $q12="SELECT * FROM usero WHERE ema='$em'";
        $r12=mysqli_query($conn,$q12);
        $v12=mysqli_fetch_object($r12);
$id12=$v12->usid;
$nam12=$v12->usnam;
// echo $nam12;
        $qu="INSERT INTO appoint(dat,tims,ptid,ptnam,dcid,dcnam,emai,emause,loc) VALUES  ('$dat','$val','$id12','$nam12','$id2','$nam2','$emadoc','$em','$v')";
        //  echo $qu;
        $ru=mysqli_query($conn,$qu);
        if($ru)
        {
            echo "Appointment booked successfully";
        }
    }
}

}
}
}

?>