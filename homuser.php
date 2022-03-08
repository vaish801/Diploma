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
       <div class="contain"><ul><li><a href="#" class="current">Search</a></li>
<li><a href="appcer.php">My Appointments</a></li>
<li><a href="viewcerti.php">My Certificates</a></li>
</ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="updu.php">Update Profile</a>
<!-- <a href="updmdr.php">Update Medical Records</a> -->
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
 
  <div class="datinp" style="float:left;"> <label for="dat">For Date:</label><input type="text" name="dat" id="dat" placeholder="dd-mm-yyyy" style="padding:8px;margin:10px;"></div>
  <div class="texbut"> <input type="button" value="    OK    " id="oo" style="padding:10px;margin:10px;"><br></div>
  </div> 
  <div class="spephp"></div>
  <div class="w3-content w3-section"  style="width:900px;margin:0 auto">
  <img class="mySlides" src="../used/1580152479534_user-converted (1)-1.jpg" style="width:100%" height="300" >
  <img class="mySlides" src="../used/1580152479534_user-converted (1)-3.jpg" style="width:100%" height="300">
  <img class="mySlides" src="../used/1580152479534_user-converted (1)-2.jpg" style="width:100%" height="300">
  <img class="mySlides" src="../used/1580152479534_user-converted (1)-4.jpg" style="width:100%" height="300">
</div>
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
            var dat=$("#dat").val();
            $.ajax({
                method:"post",
                url:"hh.php",
                data:"cat="+cat+"&txt="+txt+'&dat='+dat,
                success:function(result)
                {
                    
                    window.location.href='hhh.php';
                    }
                });
            //alert(cat);
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
$conn=mysqli_connect("localhost","root","","db1234");
echo "<h2 style='text-align:center;'>Heart-Specialists</h2>";
$ssp="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE sta='1'AND qual LIKE '%MD-Heart%'";
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
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr><tr><td><p style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}

$sp="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE sta='1'AND qual LIKE '%ENT%'";
        $r=mysqli_query($conn,$sp);
        $co=mysqli_num_rows($r);
        if($co>0)
{
    echo "<h2 style='text-align:center;'>ENT</h2>";
    //echo "inside if";
  for($a=0;$a<$co;$a++)
  {
      //echo "inside for";
      $rowi=mysqli_fetch_assoc($r);
      $dcnam=$rowi["dcnam"];
      $gen=$rowi["gen"];
      $age=$rowi["age"];
      $pho=$rowi["pho"];
      $qual=$rowi["qual"];
      $ema=$rowi["ema"];
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."' style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."' style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr><tr><td><p style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}
$sk="SELECT dcnam,dcid,gen,age,pho,qual,ema FROM docto WHERE sta='1'AND qual LIKE '%MD-Brain%'";

        $rk=mysqli_query($conn,$sk);
        $ck=mysqli_num_rows($rk);
        if($ck>0)
{
    echo "<h2 style='text-align:center;'>Brain-Specialists</h2>";
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
      $di="<br><div class='apd' ><div class='app".$aa."'>";
      $di.="<table><tr><td><p id='nm".$aa."' style='margin:0px 20px;'>Doctor Name &nbsp : &nbsp</td><td>".$dcnam."</p></td></tr>";
      $di.="<tr><td><p id='gen".$aa."' style='margin:0px 20px;'>Gender &nbsp : &nbsp</td><td>".$gen."</p></td></tr>";
      $di.="<tr><td><p id='ag".$aa."' style='margin:0px 20px;'>Age &nbsp : &nbsp</td><td>".$age."</p></td></tr>";
      $di.="<tr><td><p id='ph".$aa."' style='margin:0px 20px;'>Phone &nbsp : &nbsp</td><td>".$pho."</p></td></tr>";
      $di.="<tr><td><p id='qu".$aa."' style='margin:0px 20px;'>Qualifications &nbsp : &nbsp</td><td>".$qual."</p></td></tr><tr><td><p style='margin:0px 20px;'><a href='mdinfo.php?id=".$ema."'>More Information</a></p></td></tr></table></div><br><hr><br>";
      echo $di;
  }
  
}
?>
</body>
</html>