<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="mobo">
    <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="contain"><ul><li><a href="homus.php" class="current">Search</a></li>
<li><a href="apodoc.php" >Appointments</a></li>
<li><a href="pendr.php">Requested Appointments</a></li>
<li><a href="mdr.php">Medical Records</a></li>
<li><a href="cert.php">Certificate</a></li> 
<li><a href="sch.php">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","db1234");
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){

$cate=$_SESSION["cat"];
$txt=$_SESSION["txt"]; 
$em=$_SESSION["em"];
$cou=0;         
if($cate!="")
{
    if($cate=="Name")
    {
        $ssp="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE dcnam LIKE '%$txt%'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}


    }
    if($cate=="Qualification")
    {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE qual LIKE '%$txt%'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
      echo $di;
  }

    }
}
if($cate=="Location")
    {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE adc LIKE '%$txt%' OR adh LIKE '%$txt%' OR adnh LIKE '%$txt%'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
    
      echo $di;
  }

    }
}
if($cate=="Clinics/Hospitals/Nursing-Homes")
    {
        if($txt=="Clinics" || $txt=="clinics")
        {
            $ss="SELECT adc,ema FROM docto";
            $r=mysqli_query($conn,$ss);
        $n=mysqli_num_rows($r);
        if($n>0)
{
    //echo "inside if";
  for($aa=0;$aa<$n;$aa++)
  {
      //echo "inside for";
      $roww=mysqli_fetch_assoc($r);
      $adc=$roww["adc"];
      $ema=$roww["ema"];
      if($adc!="")
      {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE ema='$ema'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
      echo $di;
  }

    }


      }
      
        }
    }
}
else{
    echo "Please Chcek entry";
}
if($txt=="Hospitals" || $txt=="hospitals")
        {
            $ss="SELECT adh,ema FROM docto";
            $r=mysqli_query($conn,$ss);
        $n=mysqli_num_rows($r);
        if($n>0)
{
    //echo "inside if";
  for($aa=0;$aa<$n;$aa++)
  {
      //echo "inside for";
      $roww=mysqli_fetch_assoc($r);
      $adc=$roww["adh"];
      $ema=$roww["ema"];
      if($adc!="")
      {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE ema='$ema'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
      echo $di;
  }

    }


      }
      
        }
    }
}
else{
    echo "Please Chcek entry";
}
if($txt=="Nursing-Homes" || $txt=="nursing-homes" || $txt=="Nursing-homes" || $txt=="nursing-Homes")
        {
            $ss="SELECT adnh,ema FROM docto";
            $r=mysqli_query($conn,$ss);
        $n=mysqli_num_rows($r);
        if($n>0)
{
    //echo "inside if";
  for($aa=0;$aa<$n;$aa++)
  {
      //echo "inside for";
      $roww=mysqli_fetch_assoc($r);
      $adc=$roww["adnh"];
      $ema=$roww["ema"];
      if($adc!="")
      {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE ema='$ema'";
        $rr=mysqli_query($conn,$ssp);
        $c=mysqli_num_rows($rr);
        if($c>0)
{
    //echo "inside if";
  for($aa=0;$aa<$c;$aa++)
  {
      //echo "inside for";
      $row=mysqli_fetch_assoc($rr);
      $dcnam=$row["dcnam"];
      $gen=$row["gen"];
      $age=$row["age"];
      $pho=$row["pho"];
      $qual=$row["qual"];
      $ema=$row["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr></table></div><br><hr><br>";
      echo $di;
  }

    }


      }
      else{
          $cou++;
      }
      
        }
        if($cou!=0)
        {
        echo "Sorry not available here";
        }

    }
}
else{
    echo "Please Chcek entry";
}
    }
}
}
else{
    header("Location:sin.php");
}
         
?>