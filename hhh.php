<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../csss/homad.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
    <div class="mobo">
    <div class="sym"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="contain"><ul><li><a href="homuser.php" class="current">Search</a></li>
<li><a href="appcer.php">My Appointments</a></li>
<li><a href="viewcerti.php">My Certificates</a></li>
</ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a><a href="updmdr.php">Update Medical Records</a>
<a href="sgnout.php">Sign Out</a></div></div><br>
<p style='margin:0px 20px;'>  <a href="homuser.php">Back</a> </p>
    </div>
    </body>
    </html>

<?php
$conn=mysqli_connect("localhost","root","","db1234");
$cate=$_SESSION["cat"];
$txt=$_SESSION["txt"]; 
$dat=$_SESSION["dat"]; 

$em=$_SESSION["em"];
$cou=0;         
// echo $txt;
// echo $cate;
if($cate!="")
{
    if($cate=="Name")
    {
        $ssp="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE sta='1'AND dcnam LIKE '%$txt%'";
        //echo $ssp;
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
      $di.="<table><tr><td><p id='nm".$aa."'style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."' style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}
else{
    echo "Sorry No Doctors Found";
}


    }
    if($cate=="Qualification")
    {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema FROM docto WHERE sta='1'AND qual LIKE '%$txt%'";
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
      $di.="<table><tr><td><p id='nm".$aa."' style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."'style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }

    }
    else{
        echo "Sorry No Doctors Found";
    }
}
if($cate=="Location")
    {
        $ssp="SELECT dcnam,gen,age,pho,qual,ema,sta FROM docto WHERE adc LIKE '%$txt%' OR adh LIKE '%$txt%' OR adnh LIKE '%$txt%'";
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
      $sta=$row["sta"];
      if($sta==1)
      {
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."' style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."' style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
      }
  }

    }
    else{
        echo "Sorry No Doctors Found";
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
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
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
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
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
      $di.="<tr><td><p id='qu".$aa."'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr>";
      $di.="<tr><td><p id='bk".$aa."' style='margin:0px 20px;'><a href='bookap.php?iddoc=$ema&amp;iduse=$em&amp;dat=$dat'>Book an appointment</a></p></td></tr><tr><td><p id='minf".$aa."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
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
         
?>