<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
$conn=mysqli_connect("localhost","root","","db1234");
$emai=$_SESSION["em"];
// echo $emai;
$q="SELECT *FROM usero WHERE ema='$emai'";
$s=mysqli_query($conn,$q);
$v=mysqli_fetch_object($s);
$usnam=$v->usnam;
$gen=$v->gen;
$ad=$v->ad;
$pho=$v->pho;
$ema=$v->ema;
$ag=$v->ag;
$bgrp=$v->bgrp;
$probl=$v->probl;
$alleg=$v->alleg;
$posur=$v->posur;
$poorr=$v->poorr;
$opro=$v->opro;
// $doc=$v->doc;
// $sta=$v->sta;

$sql="SELECT Nam,Pas FROM userlog WHERE Ema='$emai'";
$ss=mysqli_query($conn,$sql);
$vv=mysqli_fetch_object($ss);
$usnamm=$vv->Nam;
$uspass=$vv->Pas; 
}
else{
    header("Location:sin.php");
}
// echo $id;
//print_r($v);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../csss/ho1.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<div class="mobo">
<div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
    <div class="dat" style="margin:10px 550px; font-size:20px;">
        <table>
    <tr><td><label for="usnam">Name</label></td><td>
<input type="text" name="usnam" id="usnam" value="<?php echo $usnam;?>" style="font-size:15px;"></td></tr>

<tr><td><label for="gen">Select Gender</label></td><td>
<input type="radio" name="gen" value="Male" <?php echo ($gen=='Male')?'checked':'' ?>>Male <input type="radio" name="gen" value="Female" <?php echo ($gen=='Female')?'checked':'' ?>>Female <input type="radio" name="gen" value="Other" <?php echo ($gen=='Other')?'checked':'' ?>>Other</td><tr>

<tr><td><label for="ad">Address</label></td><td>
<textarea name="ad" id="ad" cols="30" rows="10" style="font-size:15px;"><?php echo $ad;?></textarea></td></tr>


<tr><td><label for="ph">Phone Number</label></td><td>
<input type="text" name="ph" id="ph" value="<?php echo $pho;?>" style="font-size:15px;"></td></tr>


<tr><td><label for="ema">Email-Id</label></td><td>
<input type="email" name="ema" id="ema" value="<?php echo $ema;?>" style="font-size:15px;"></td></tr>



<tr><td><label for="ag">Age</label></td><td>
<input type="number" name="ag" id="ag" value="<?php echo $ag;?>" style="font-size:15px;"></td></tr>

<tr><td><label for="bgrp">Select Blood Group</label></td><td>
<input type="radio" name="bgrp" value="A+ve" <?php echo ($bgrp=='A+ve')?'checked':'' ?>>A+
 <input type="radio" name="bgrp" value="A-ve" <?php echo ($bgrp=='A-ve')?'checked':'' ?>>A-
 <input type="radio" name="bgrp" value="B+ve" <?php echo ($bgrp=='B+ve')?'checked':'' ?>>B+ 
 <input type="radio" name="bgrp" value="B-ve" <?php echo ($bgrp=='B-ve')?'checked':'' ?>>B- 
 <input type="radio" name="bgrp" value="AB+ve" <?php echo ($bgrp=='AB+ve')?'checked':'' ?>>AB+
 <input type="radio" name="bgrp" value="AB-ve" <?php echo ($bgrp=='AB-ve')?'checked':'' ?>>AB-
 <input type="radio" name="bgrp" value="O+ve" <?php echo ($bgrp=='O+ve')?'checked':'' ?>>O+
 <input type="radio" name="bgrp" value="O-ve" <?php echo ($bgrp=='O-ve')?'checked':'' ?>>O-

 <tr><td><label for="ad">Problem:</label></td><td>
<textarea name="probl" id="probl" cols="30" rows="10" style="font-size:15px;"><?php echo $probl;?></textarea></td></tr>


<tr><td><label for="alleg">Any Allergy:</label></td><td>
<textarea name="alleg" id="alleg" cols="30" rows="10" style="font-size:15px;"><?php echo $alleg;?></textarea></td></tr>

<tr><td><label for="posur">Post Surgery(if any)</label></td><td>
<textarea name="posur" id="posur" cols="30" rows="10" style="font-size:15px;"><?php echo $posur;?></textarea></td></tr>

<tr><td><label for="poorr">Post Operation(Ortho):</label></td><td>
<textarea name="poorr" id="poorr" cols="30" rows="10" style="font-size:15px;"><?php echo $poorr;?></textarea></td></tr> 


<tr><td><label for="opro">Other Problems:</label></td><td>
<textarea name="opro" id="opro" cols="30" rows="10" style="font-size:15px;"><?php echo $opro;?></textarea></td></tr>
<tr><td><label for="unam">Username</label></td><td>
<input type="text" name="unam" id="unammu" value="<?php echo $usnamm;?>" style="font-size:15px;"></td></tr>
<tr><td><label for="upas">Password</label></td><td>
<input type="text" name="upas" id="upassu" value="<?php echo $uspass;?>" style="font-size:15px;"></td></tr>

</td><tr>   </table>  

<div class="but"><input type="button" value="Update" id="up"></div>
    </div>
    <div class="bac"> <a href="homuser.php">Back</a> </div></div>
    <script>
        $(document).ready(function(){
            $("#up").click(function(){
     var usnam=$("#usnam").val();
     var gen=$("input[name='gen']:checked").val();
     var ad=$("#ad").val();
     var pho=$("#ph").val();
     var em=$("#ema").val();
     var ag=$("#ag").val();
     var bgrp=$("input[name='bgrp']:checked").val();
     var probl=$("#probl").val();
     var alleg=$("#alleg").val();
     var posur=$("#posur").val();
     var poorr=$("#poorr").val();
     var opro=$("#opro").val();
     var usnamm=$("#unammu").val();
     var uspass=$("#upassu").val();
    //  var doc=$("#doc").val();
    //  var sta=$("#sta").val();
    
     if(usnam=="")
     {
         alert("Enter name");
         return false;
     }
     
     /*if(fn=="")
     {
         alert("Please enter your First Name");
         return false;
     }
     if(mn=="")
     {
         alert("Please enter your Middle Name");
         return false;
     }
     if(ln=="")
     {
         alert("Please enter your Last Name");
         return false;
     }*/


     if(usnam=="")
     {
         alert("ENter Name");
         return false;
     }

     if(ag==""||(isNaN(ag)))
     {
         alert("Enter valid age");
         return false;
     }



     if(gen=="")
     {
         alert("Select valid gender");
         return false;
     }


     if(pho==""||(isNaN(pho))||(pho.length<10))
     {
         alert("Enter valid Phone Number");
         return false;
     }


     if(em=="")
     {
         alert("Enter Email");
         return false;
     }
     if(ad=="")
     {
         alert("Enter Address");
         return false;
     }

     
     if(bgrp=="")
     {
         alert("Select valid blood group");
         return false;
     }
     if(usnamm=="")
     {
         alert("Enter Username");
         return false;

     }
     if(uspass=="")
     {
         alert("Enter Password");
         return false;

     }

     var dataa='usnam='+usnam+'&ag='+ag+'&gen='+gen+'&ad='+ad+'&pho='+pho+'&em='+em+'&probl='+probl+'&alleg='+alleg+'&posur='+posur+'&poorr='+poorr+'&opro='+opro+'&usnamm='+usnamm+'&uspass='+uspass;
         //alert(dataa);
         $.ajax({
     type:"POST",
     url:"updus.php",
     data:dataa,
     success:function(result){
        alert("Updated");
window.history.back();
         //console.log(result);
        //  alert(result);
     }
     });

            });
        });
    
    </script>
</body>
</html>