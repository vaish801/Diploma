<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../csss/fed.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<?php

if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    //echo $_SESSION["na"];
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=mysqli_real_escape_string($conn,$_GET['id']);
    //$va=mysqli_real_escape_string($conn,$_GET['idd']);
    /*$q="SELECT * FROM appoint WHERE apid='$v'";
    $r=mysqli_query($conn,$q);
    $va=mysqli_fetch_object($r);
    $pid=$va->ptid;
    $pnm=$va->ptnam;
    $dnm=$va->dcnam;
    $did=$va->dcid;
    $emd=$va->emai;
    $emu=$va->emause;*/
}
else{
    header("Location:final.html");
}

?>
<div class="mobo">
<div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
    <div class="all">
    <div class="hea">
    <label for="rat">Give Rating</label></div>
    <div class="inp"><input type="radio" name="rat" value="1">1 
    <input type="radio" name="rat" value="2" &nbsp>2
    <input type="radio" name="rat" value="3">3
    <input type="radio" name="rat" value="4">4
    <input type="radio" name="rat" value="5">5</div><br>
    <div class="hea"><label for="fed">Feedback</label></div>
    <div class="inp"><textarea name="fed" id="fed" cols="30" rows="10"></textarea></div>
    <div class="inp"><input type="button" value="Submit" id="bt"></div>
    </div>
    </div>
    <input type="text" id="hid" value="<?php echo $v;?>" hidden>
    <script>
$(document).ready(function(){
$("#bt").click(function(){
    var apid=$("#hid").val();
    var r=$("input[name='rat']:checked").val();
    var fd=$("#fed").val();
    if(fd=="")
    {
        alert("Please enter feedback");
        return false;
    }
    else{
        var dat="rat="+r+"&feed="+fd+"&id="+apid;
        $.ajax({
type:"POST",
url:"feeed.php",
data:dat,
success:function(result){alert("Thanks for your feedback");
window.location.href="appcer.php";
}
        });
    }

});
});
    </script>




    </body>
<?php
/*session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo $_SESSION["na"];
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=mysqli_real_escape_string($conn,$_GET['id']);
    //$va=mysqli_real_escape_string($conn,$_GET['idd']);
    $q="SELECT * FROM appoint WHERE apid='$v'";
    $r=mysqli_query($conn,$q);
    $va=mysqli_fetch_object($r);
    $pid=$va->ptid;
    $pnm=$va->ptnam;
    $dnm=$va->dcnam;
    $did=$va->dcid;
    $emd=$va->emai;
    $emu=$va->emause;*/

?>

</html>