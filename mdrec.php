<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    //echo $_SESSION["na"];
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=mysqli_real_escape_string($conn,$_GET['id']);
    //$va=mysqli_real_escape_string($conn,$_GET['idd']);
    $q="SELECT * FROM appoint WHERE apid='$v'";
    $r=mysqli_query($conn,$q);
    $va=mysqli_fetch_object($r);
    $da=$va->dat;
    $ti=$va->tims;
    $pid=$va->ptid;
    $pnm=$va->ptnam;
    $pr=$va->pro;
    $dnm=$va->dcnam;
    $did=$va->dcid;
    $lo=$va->loc;
    $emd=$va->emai;
    $emu=$va->emause;
    $sym=$va->sym;
    $med=$va->med;
    $osug=$va->osug;
    //echo $sym.$med.$osug;
}
else{
    header("Location:sin.php");
}
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
<div class="main">
    <div class="up"></div>
    <div class="hea"><label for="apid">Appointment Id:</label></div>
    <div class="inp"><input type="text" name="apid" id="apid" value="<?php echo $v; ?>" readonly></div>
    <div class="hea"><label for="dat">Date</label></div>
    <div class="inp"><input type="text" name="dat" id="dat" value="<?php echo $da;?>"readonly></div>
    <div class="hea"><label for="tim"> Timing</label></div>
    <div class="inp"><input type="text" name="tim" id="tim" value="<?php echo $ti;?>"readonly></div>
    <div class="hea"><label for="loc">Location</label></div>
    <div class="inp"><input type="text" name="loc" id="loc" value="<?php echo $lo;?>"readonly></div>
    <div class="hea"><label for="dcnam">Name Of Doctor</label></div>
    <div class="inp"><input type="text" name="dcnam" id="dcnam" value="<?php echo $dnm;?>"readonly></div>
    <div class="hea"><label for="dcid">Doctor Id</label></div>
    <div class="inp"><input type="text" name="dcid" id="dcid" value="<?php echo $did;?>"readonly></div>
    <div class="hea"><label for="pnam">Name Of Patient</label></div>
    <div class="inp"><input type="text" name="pnam" id="pnam" value="<?php echo $pnm;?>"readonly></div>
    <div class="hea"><label for="pid">Patient Id</label></div>
    <div class="inp"><input type="text" name="pid" id="pid" value="<?php echo $pid;?>"readonly></div>
    <div class="hea"><label for="prblm">Problem</label></div>
    <div class="inp"><input type="text" name="prblm" id="prblm" value="<?php echo $pr;?>"readonly></div>
    <div class="hea"><label for="sym">Symptoms</label></div>
    <div class="inp"><textarea name="sym" id="sym" cols="30" rows="10" readonly><?php echo $sym;?></textarea></div>
    <div class="hea"><label for="med">Medicines with Dosage</label></div>
    <div class="inp"><textarea name="med" id="med" cols="30" rows="10" readonly><?php echo $med;?></textarea></div>
    <div class="hea"><label for="sug">Other Suggestions</label> </div>
    <div class="inp"><textarea name="sug" id="sug" cols="30" rows="10" readonly><?php echo $osug;?></textarea></div>
    
    
    </div>
    
    </div>
</body>
</html>