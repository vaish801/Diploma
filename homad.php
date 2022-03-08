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
<li><a class="current" href="#">Approvals</a></li>
<li><a href="doc.php">View Doctors</a></li>
<li><a href="pat.php">View Patients</a></li>
<li><a href="sgnout.php">Sign Out</a></li>
</ul>
</div>
<div class="as" style="height:30px;"></div>
<?php
// echo "<div class='asach'>Labellll:<input type='text' id='as'></div>";
    $con=mysqli_connect("localhost","root","","db1234");
    $q="SELECT * FROM docto WHERE sta='0'";
    $r=mysqli_query($con,$q);
    if($r==true)
    {
        $num=mysqli_num_rows($r);
        while($row=mysqli_fetch_assoc($r))
        {
            $nam=$row["dcnam"];
            $gen=$row["gen"];
            $ad=$row["ad"];
            $qual=$row["qual"];
            $atach=$row["atach"];
            $ag=$row["age"];
            $pho=$row["pho"];
            $em=$row["ema"];
            $lc=$row["adc"];
            echo $atach;
$vc=$row["vhc"];
$lh=$row["adh"];
$vh=$row["vhh"];
$lnh=$row["adnh"];
$vnh=$row["vhnh"];
            echo "<div class='headin' style='margin:10px 20px;'>Name:".$nam."<br>"."Gender:".$gen."<br>"."Qualifications:".$qual."<br>"."Age:".$ag."<br>"."Contact:".$pho."<br>"."Email:".$em."<br>Certificates:<br>";
            if(strpos($atach,",")!==false)
    {
        $dar=explode(",",$atach);
        // print_r($dar);
        $dc=sizeof($dar);
        // echo "Countt".$dc;
         for($m=0;$m<$dc;$m++)
        {
            // echo "hii";
            $ele='<img src="../docd/'.$dar[$m].'" width="300" height="350" style="margin:10px 20px">'."<br>";
            echo $ele; 
        } 
    }

    else{ 
    
        $ele='<img src="../docd/'.$atach.'" width="300" height="350" style="margin:10px 20px">'."<br>";
        echo $ele;
     }
            if($lc!="" && $vc!="")
{
$l=explode(",",$lc);
$v=explode(",",$vc);
// print_r($l);
$nc=sizeof($l);
echo "Clinics<br>";
for($i=1;$i<$nc;$i++)
{
$ele="<p>Location &nbsp:&nbsp".$l[$i]."</p><p>Visiting Hours &nbsp:&nbsp".$v[$i]."</p>";
echo $ele;
}
echo "<input type='text' name='numc' id='numc' value='".$nc."'hidden>";
// echo ;
}
if($lh!="" && $vh!="")
{
    $lhh=explode(",",$lh);
$vhh=explode(",",$vh);
$nho=sizeof($lhh);
echo "Hospitals<br>";
for($i=1;$i<$nho;$i++)
{
$ele="<p>Location &nbsp:&nbsp".$lhh[$i]."</p><p>Visiting Hours &nbsp:&nbsp".$vhh[$i]."</p>";
echo $ele;
}
echo "<input type='text' name='numh' id='numh' value='".$nho."'hidden>";
}
if($lnh!="" && $vnh!="")
{
    $lnnh=explode(",",$lnh);
$vnnh=explode(",",$vnh);
$nnh=sizeof($lnnh);
echo "Nursing Homes<br>";
for($i=1;$i<$nnh;$i++)
{
$ele="<p>Location &nbsp:&nbsp".$lnnh[$i]."</p><p>Visiting Hours &nbsp:&nbsp".$vnnh[$i]."</p>";
echo $ele;
}
echo "<input type='text' name='numnh' id='numnh' value='".$nnh."'hidden>";
}
echo "<a href='veri.php?id=".$em."'><button style='font-size:14px;padding:10px;margin:10px;'>Verified</button></a>";
            echo "<a href='rejec.php?id=".$em."'><button style='font-size:14px;padding:10px;margin:10px;'>Rejected</button></a><br><br></div><br><hr>";
        }
    }
    
    ?>
</body>
</html>