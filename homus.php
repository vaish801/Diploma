<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../csss/homad.css">
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
<li><a href="apodoc.php">Appointments</a></li>
<li><a href="pendr.php">Requested Appointments</a></li>
<li><a href="mdr.php">Medical Records</a></li>
<li><a href="cert.php">Certificate</a></li> 
<li><a href="sch.php">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
  <div class="inp" style="overflow:hidden;">
  <div class="sel" style="float:left;">
  <select id="cate" name="cate" style="padding:10px;margin:10px;">
  <option value="Name">Name</option>
  <option value="Location">Location</option>
  <option value="Clinics/Hospitals/Nursing-Homes">Clinics/Hospitals/Nursing-Homes</option>
  <option value="Qualification">Qualification</option>
  <!-- <option value="Specialization">Specialization</option> -->
  </select>
</div>
  
<div class="texinp" style="float:left;"> <input type="text" name="spi" id="spi" placeholder="Specific Name" style="padding:8px;margin:10px;"></div>
<div class="texbut"> <input type="button" value="   OK   " id="oo" style="padding:10px;margin:10px;"></div>
  </div>  
  <div class="w3-content w3-section"  style="width:900px;margin:0 auto">
  <img class="mySlides" src="../docd/Dr-converted (1)-1.jpg" style="width:100%" height="300" >
  <img class="mySlides" src="../docd/Dr-converted (1)-2.jpg" style="width:100%" height="300">
  <img class="mySlides" src="../docd/Dr-converted (1)-3.jpg" style="width:100%" height="300">
</div>
<!-- <a href="prescrip.php?aid=<?php echo $apid;?>">Prepare Case Paper</a> -->
</div>
<script>
    $(document).ready(function(){
        var cat=$("#cate option:selected").val();
        /*  */
        /* $.ajax({
                method:"post",
                url:"h.php",
                data:"cat="+cat,
                success:function(result)
                {
                    var pp=result;
                    alert(pp);
                    }
                }); */
        $("#oo").click(function(){
            var cat=$("#cate option:selected").val();
            var txt=$("#spi").val();
            $.ajax({
                method:"post",
                url:"hh.php",
                data:"cat="+cat+"&txt="+txt,
                success:function(result)
                {
                    
                    window.location.href='hhhd.php';
                    }
                });
            alert(cat);
        });
       /*  $("#spi").keypress(function(){

           
                    alert(pp);
                    $("#spi").autocomplete({
			source:pp,
			autoFocus:true,
	
                

            });

 //alert(pp);
		
	}); */
    var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
    });
</script>

<?php
//session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo "<h1>WELCOME DOCTOR</h1>";
    $con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$dd=date("d-m-Y");
// echo $dd;
// echo $dd;
$qu="SELECT dcid FROM docto WHERE ema='$em'";
// echo $qu;
$re=mysqli_query($con,$qu);
$va=mysqli_fetch_object($re);
$did=$va->dcid;
$q="SELECT apid,dat,tims,ptid,ptnam,pro,loc,timing FROM appoint WHERE dcid='$did' AND dat='$dd' AND sta=0 ORDER BY apid DESC";
// echo $q;
$r=mysqli_query($con,$q);
//echo $r;
$n=mysqli_num_rows($r);
//echo $n;
if($n>0)
{
    echo "<h2 style='margin:0px 20px;'>Today's Appointments</h2>";
    //echo "inside if";
  for($aa=0;$aa<$n;$aa++)
  {
    //   echo "inside for";
      $row=mysqli_fetch_assoc($r);
      $apid=$row["apid"];
      $dat=$row["dat"];
      $tims=$row["timing"];
      $ptid=$row["ptid"];
      $ptnam=$row["ptnam"];
      $pro=$row["pro"];
      $loc=$row["loc"];
    //   echo $tims;
    //   if($tims!="")
    //   {
      $di="<br><div class='apd' style='margin:0px 20px;'><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='aid".$aa."'>Appointment ID &nbsp : &nbsp</td><td>".$apid."</p></td></tr>";
      $di.="<tr><td><p id='daid".$aa."'>Date &nbsp : &nbsp</td><td>".$dat."</p></td></tr>";
      $di.="<tr><td><p id='tid".$aa."'>Timing &nbsp : &nbsp</td><td>".$tims."</p></td></tr>";
      $di.="<tr><td><p id='lid".$aa."'>Location &nbsp : &nbsp</td><td>".$loc."</p></td></tr>";
      $di.="<tr><td><p id='pid".$aa."'><a href='pinfo.php?id=".$ptid."'>Patient ID &nbsp : &nbsp</td><td>".$ptid."</a></p></td></tr>";
      $di.="<tr><td><p id='pnid".$aa."'>Patient Name &nbsp : &nbsp</td><td>".$ptnam."</p></td></tr>";
      $di.="<tr><td><p id='prid".$aa."'>Problem &nbsp : &nbsp</td><td>".$pro."</p></td></tr>";
      $di.="<tr><td><p id='deid".$aa."' style='font-size:20px;'><a href='prescrip.php?id=".$apid."'>Prepare Case Paper</a></p></td></tr></table><br><hr></div></div>";
      echo $di;
    //   }
  }
  
}
$sk="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE qual LIKE '%MD-Brain%' OR qual LIKE '%md-brain%' OR qual LIKE '%Md-brain%' OR qual LIKE '%Md-Brain%'";
echo "<h2 style='margin:0px 20px;'>Brain-Specialists</h2>";
        $rk=mysqli_query($con,$sk);
        $ck=mysqli_num_rows($rk);
        if($ck>0)
{
    //echo "inside if";
  for($aak=0;$aak<$ck;$aak++)
  {
      //echo "inside for";
      $rowk=mysqli_fetch_assoc($rk);
      $dcnam=$rowk["dcnam"];
      $gen=$rowk["gen"];
      $age=$rowk["age"];
      $pho=$rowk["pho"];
      $qual=$rowk["qual"];
      $ema=$rowk["ema"];
      $di="<br><div class='apd' ><div class='app".$aak."'>";
      $di.="<table><tr><td><p id='nm".$aak."' style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aak."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aak."' style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aak."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aak."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr><tr><td><p id='minf".$aak."' style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}

}
else{
    header("Location:sin.php");
}
?>
</body>
</html>