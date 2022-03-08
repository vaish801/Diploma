<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="../csss/ho1.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION["na"]) && isset($_SESSION["em"]))
{
    $typ=$_SESSION["ty"];
    if($typ=="Doctor")
    {
        header("Location:homus.php");
    }
    if($typ=="User")
    {
        header("Location:homuser.php");
    }
}
?>
    <div class="mobo">
    <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
       <div class="asa" style="background-image: url('../docd/docc.jpg');
  background-repeat: 'no-repeat';
  background-attachment: 'fixed';  
  background-size: 'cover'">
       <div class="as" style="position: absolute; width:100%;
            
            height:100%; border:1px solid black;padding:30px 60px;background-color:rgb(211,211,211);background-image: url('../docd/docc.jpg');background-repeat:no-repeat;background-size:cover">
            <div class="box" style="border:1px solid black;width:400px;height:450px;margin:auto;">
     <h1>Sign In</h1>
     
    <div class="hea"><label for="nam">Enter Username</label></div>
    <div class="inp"><input type="text" id="nam" name="nam" size="30" value="<?php if(isset($_COOKIE["Cookname"])){echo $_COOKIE["Cookname"];}else{echo "";}?>"></div>
    <div class="hea"><label for="pass">Enter Password</label></div>
    <div class="inp"><input type="password" id="pass" name="pass" size="30"></div>
    <div class="hea"><label for="em">Enter email</label></div>
    <div class="inp"><input type="email" id="em" name="em" size="30"></div>

    <!-- <div class="inp"><input type="checkbox" id="rem" name="rem" value="1">Remember Me</div>
     <div class="forgo"> <a href="#">Forgot Password</a></div> -->
    <br>
    <div class="but"> <input type="button" value="Sign In" id="butto"></div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
    $(document).ready(function(){
        $("#butto").click(function(){
            var nam=$("#nam").val();
    var pas=$("#pass").val();
    var em=$("#em").val();
    var rm=$("input[name='rem']:checked").val();
    //alert(rm);
    if(nam=="")
    {
        alert("Enter Username");
        return false;
    }
    if(pas=="")
    {
        alert("Enter Password");
        return false;
    }
    if(em=="")
    {
        alert("Enter Email");
        return false;
    }
    if((nam!="")&& (pas!="")&&(em!="")&&(rm!=""))
    {
var dat='name='+nam+'&passs='+pas+'&emai='+em+'&jadu='+rm;
$.ajax({
    type:"POST",
    url:"sing.php",
    data:dat,
    success:function(result){

    alert(result);
        if(result=="User")
        {
         window.location.href="homuser.php";
        }
        if(result=="Doctor")
        {
          window.location.href="homus.php";
        }
        if(result=="Admin")
        {
         window.location.href="homad.php";
        }
        // alert(result);
    }
});
    }
        });
    
    });
    </script>
</body>
</html>