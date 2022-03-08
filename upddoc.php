<?php
session_start();
$conn=mysqli_connect("localhost","root","","db1234");
$iid=$_SESSION["id"];
$q="SELECT * FROM docto WHERE dcid='$iid'";
$s=mysqli_query($conn,$q);
$v=mysqli_fetch_object($s);
$id=$v->dcid;
$nam=$v->dcnam;
$n=explode(" ",$nam);
$gen=$v->gen;
$ad=$v->ad;
$pho=$v->pho;
$qual=$v->qual;
$age=$v->age;
$ema=$v->ema;
$sql="SELECT Nam,Pas FROM userlog WHERE Ema='$ema'";
$ss=mysqli_query($conn,$sql);
$vv=mysqli_fetch_object($ss);
$usnam=$vv->Nam;
$uspas=$vv->Pas;
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
    <div class="dat" style="margin:10px 550px; font-size:20px;border:2px solid black; padding:10px;">
<table><tr><td><label for="Fname">First Name</label></td><td>
<input type="text" name="Fname" id="Fname" value="<?php echo $n[0];?>"></td></tr>
<tr><td><label for="Sname">Middle Name</label></td><td>
<input type="text" name="Sname" id="Sname" value="<?php echo $n[1];?>"></td></tr>
<tr><td><label for="Lname">Last Name</label></td><td>
<input type="text" name="Lname" id="Lname" value="<?php echo $n[2];?>"></td></tr>
<tr><td><label for="ag">Age</label></td><td>
<input type="number" name="ag" id="ag" value="<?php echo $age;?>"></td></tr>
<tr><td><label for="gen">Select Gender</label></td><td>
<input type="radio" name="gen" value="Male" <?php echo ($gen=='Male')?'checked':'' ?>>Male <input type="radio" name="gen" value="Female" <?php echo ($gen=='Female')?'checked':'' ?>>Female <input type="radio" name="gen" value="Other" <?php echo ($gen=='Other')?'checked':'' ?>>Other</td><tr>
<tr><td><label for="ph">Phone Number</label></td><td>
<input type="text" name="ph" id="ph" value="<?php echo $pho;?>"></td></tr>
<tr><td><label for="em">Email-Id</label></td><td>
<input type="email" name="em" id="em" value="<?php echo $ema;?>"></td></tr>
<tr><td><label for="qual">Qualification</label></td><td>
<input type="text" name="qual" id="qual" value="<?php echo $qual;?>"readonly></td></tr>
<tr><td><label for="ad">Address</label></td><td>
<textarea name="ad" id="ad" cols="30" rows="10"><?php echo $ad;?></textarea></td></tr>
<tr><td><label for="use">Username</label></td><td>
<input type="text" name="use" id="use" value="<?php echo $usnam;?>"></td></tr>
<tr><td><label for="pas">Password</label></td><td> 
<input type="text" name="pas" id="pas" value="<?php echo $uspas;?>"></td></tr>
<tr><td></td><td><input type="button" value="Update" id="up">
    </div>
    <div class="bac">  </div></div>
    <script>
        $(document).ready(function(){
            $("#up").click(function(){
                var fn=$("#Fname").val();
     var mn=$("#Sname").val();
     var ln=$("#Lname").val();
     var un=$("#use").val();
     var ag=$("#ag").val();
     var gen=$("input[name='gen']:checked").val();
     var pho=$("#ph").val();
     var em=$("#em").val();
     var ad=$("#ad").val();
     var ps=$("#pas").val();
     var qual=$("#qual").val();
     if(fn=="")
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
     if(qual=="")
     {
        alert("Enter Qualifications");
        return false; 
     }
     if(un!="")
     {
         var reg=/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
         var t=reg.test(un);
         if(!t)
         {
             alert("Username must contain alphabets,numbers and special characters");
             return false;
         }
     }
     if(ps!="")
     {
         var reg=/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
         var te=reg.test(ps);
         if(!te)
         {
            alert("Password must contain alphabets,numbers and special characters");
             return false;
         }
     }
     var dataa='fnam='+fn+'&mnam='+mn+'&lnam='+ln+'&ag='+ag+'&gen='+gen+'&ad='+ad+'&ph='+pho+'&em='+em+'&us='+un+'&ps='+ps+'&qual='+qual;
         //alert(dataa);
         $.ajax({
     type:"POST",
     url:"updadoc.php",
     data:dataa,
     success:function(result){ 
alert("Updated");
window.history.back();

         //console.log(result);
         //alert(result);
     }
     });

            });
        });
    
    </script>
</body>
</html>