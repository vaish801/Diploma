<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../csss/homad.css">
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div class="main">
    <div class="sym"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       </div>
<div class="contain">
<ul>
<li><a href="homad.php">Approvals</a></li>
<li><a href="doc.php">View Doctors</a></li>
<li><a href="pat.php" class="current">View Patients</a></li>
<li><a href="sgnout.php">Sign Out</a></li>
</ul>
</div>
<div class="asach" style="height:30px;"></div>
<?php
$con=mysqli_connect("localhost","root","","db1234");
$q="SELECT * FROM usero";
$r=mysqli_query($con,$q);
if($r==true)
{
    $num=mysqli_num_rows($r);
    while($row=mysqli_fetch_assoc($r))
    {
        $id=$row["usid"];
        $nam=$row["usnam"];
        $gen=$row["gen"];
        $ad=$row["ad"];
        $ag=$row["ag"];
        $pho=$row["pho"];
        $em=$row["ema"];
        $bgrp=$row["bgrp"];
        $probl=$row["probl"];
        $alleg=$row["alleg"];
        $posur=$row["posur"];
        $poorr=$row["poorr"];
        $opro=$row["opro"];
        $doc=$row["doc"];
        echo "<div class='info' style='margin:10px;'>Id &nbsp: &nbsp".$id."<br>"."Name &nbsp: &nbsp".$nam."<br>"."Gender &nbsp: &nbsp".$gen."<br>"."Blood Group &nbsp: &nbsp".$bgrp."<br>"."Problem &nbsp:&nbsp".$probl."<br>"."Medical Records &nbsp:<br>";
        if(strpos($doc,",")!==false)
        {
            $d=explode(",",$doc);
            $dc=sizeof($d);
            for($m=0;$m<$dc;$m++)
            {
                echo "<img src='../used/".$d[$m]."' width=100 height=100 style='margin-left:20px;'> &nbsp";
            }
        }
        else{
            echo "<img src='../used/".$doc."' width=100 height=100 style='margin-left:20px;'><br><hr>";
        }
    }
}
?>
</body>
</html>