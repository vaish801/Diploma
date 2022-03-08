<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$apid=mysqli_real_escape_string($con,$_GET["id"]);
$q="SELECT * FROM certi WHERE apid='$apid'";
$r=mysqli_query($con,$q);
$v=mysqli_fetch_object($r);
$dcnam=$v->dcnam;
$emai=$v->emai;
$pnam=$v->pnam;
$emause=$v->emause;
$qual=$v->qual;
$ag=$v->ag;
$place=$v->place;
$dat=$v->dat;
$sig=$v->sig;
$fr=$v->fr;
$to=$v->too;
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
    <link rel="stylesheet" type="text/css" href="../csss/helpdemocss.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi" style="height:110px;">
           <h1>Doctor Patient Portal</h1>
           <div class="he" style="font-size:18px;">Better Health Better Future</div>
       </div>
        <div class="outline">
            <div class="certitop">
                DOCTOR-PATIENT PORTAL
            </div>
            <div class="certisecond">
                Medical Certificate
            </div>
            <div class="mainframe">
                <div class="certimain">
                    I, the undersigned Dr <input type="text" id="txt1" value="<?php echo $dcnam;?>"readonly > . Doctor of <input type="text" id="txt2" value="<?php echo $qual;?>" readonly>, <br / > <br / >
                    Certify that the examination of Mr/Mrs <input type="text" id="txt3" value="<?php echo $pnam;?>" readonly> of Age: <input type="text" id="txt4"  value="<?php echo $ag;?>" readonly/ > <br / > <br / >
                    was examined and treated by me <br> <br> From:<input type="text" id="txt10" value="<?php echo $fr;?>" readonly/ > To:
                    <input type="text" id="txt11" value="<?php echo $to;?>" readonly ><br> <br>and now is in good position to get back to work.<br / > <br / > <br / > <br / > <br / >
                    Medical certificate issued in (place): <input type="text" id="txt5" value="<?php echo $place;?>"readonly/ > <br / > <br / > <br / > <br / > <br / >
                    Date: <input type="text" id="txt6" value="<?php echo $dat;?>"readonly / >
                </div>
                <div class="certibottom">
                    Doctor's Stamp: <br />
                    <div class="stamp"><img src="../docd/<?php echo $sig;?>" alt="No stamp" height="100" width="150"></div> <br /><br />
            
                </div>

            </div>

        </div>
</body>
</html>