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
<li><a href="doc.php" class="current">View Doctors</a></li>
<li><a href="pat.php">View Patients</a></li>
<li><a href="sgnout.php">Sign Out</a></li>
</ul>
</div>
<div class="as" style="height:30px;"></div>
<?php
$con=mysqli_connect("localhost","root","","db1234");
$q="SELECT * FROM docto WHERE sta='1'";
$r=mysqli_query($con,$q);
if($r==true)
{
    $num=mysqli_num_rows($r);
    while($row=mysqli_fetch_assoc($r))
    {
        $id=$row["dcid"];
        $nam=$row["dcnam"];
        $gen=$row["gen"];
        $ad=$row["ad"];
        $qual=$row["qual"];
        $atach=$row["atach"];
        $ag=$row["age"];
        $pho=$row["pho"];
        $em=$row["ema"];
        echo "<div class='abcd' style='margin:20px;'>Id:".$id."<br>"."Name:".$nam."<br>"."Gender:".$gen."<br>"."Qualifications:".$qual."<br>"."Age:".$ag."<br>"."Contact:".$pho."<br>"."Email:".$em."<br>Certificates:</div>";
        if(strpos($atach,",")!==false)
        {
            $d=explode(",",$atach);
            $dc=sizeof($d);
            for($m=0;$m<$dc;$m++)
            {
                echo "<img src='../docd/".$d[$m]."' width=100 height=100 style='margin-left:20px;'> &nbsp ";
            }
        }
        else{
            echo "<img src='../docd/".$atach."' width=100 height=100 style='margin-left:20px;'>";
        }
        echo "<br><a href='rejec.php?id=".$em."'><button style='font-size:14px;padding:10px;margin:10px;'>Delete Account</button></a><hr>";
    }
}
//echo "docctorrss";
?>
</body>
</html>