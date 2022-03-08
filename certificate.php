<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){

    $conn=mysqli_connect("localhost","root","","db1234");
    
    $em=$_SESSION["em"];
    $aid=mysqli_real_escape_string($conn,$_GET['id']);
    $q="SELECT dcnam,qual,stam FROM docto WHERE ema='$em'";
    $r=mysqli_query($conn,$q);
    $v=mysqli_fetch_object($r);
    $nam=$v->dcnam;
    $stam=$v->stam;
    $qual=$v->qual;
    $qu="SELECT ptnam,emause FROM appoint WHERE apid='$aid'";
    $re=mysqli_query($conn,$qu);
    $va=mysqli_fetch_object($re);
    $pnam=$va->ptnam;

    $emause=$va->emause;
}
    else{
        header("Location:sin.php");
    }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style>
    input[type=button] {

            width: 15%;
            border: 2px solid #aaa;
            border-radius: 6px;
            margin: 8px 0;
            outline: none;
            padding: 10px;
            box-sizing: border-box;
            transition: .3s;
            font-family: 'Franklin Gothic',sans-serif,serif;
            font-size: 15px;
        }

            input[type=text]:focus {
                border-color: lightblue;
                box-shadow: 0 0 8px 0 lightblue;
            }
        input[type=text] {
            width: 10%;
            border: 2px solid #aaa;
            border-radius: 2px;
            margin: 8px 0;
            outline: none;
            padding: 5px;
            box-sizing: border-box;
            transition: .3s;
            font-family: 'Franklin Gothic',sans-serif,serif;
            font-size: 15px;
        }

            input[type=text]:focus {
                border-color: lightblue;
                box-shadow: 0 0 8px 0 lightblue;
            }
        
       </style>
        <meta charset="utf-8" / >
        <link rel="stylesheet" type="text/css" href="../csss/helpdemocss.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        </head >
        <body >
        <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi" style="height:110px;">
           
           <h1>Doctor-Patient Portal</h1>
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
                    I, the undersigned Dr <input type="text" id="txt1" value="<?php echo $nam;?>" > . Doctor of <input type="text" id="txt2" value="<?php echo $qual;?>">, <br / > <br / >
                    Certify that the examination of Mr/Mrs <input type="text" id="txt3" value="<?php echo $pnam;?>"> of Age: <input type="text" id="txt4" / > <br / > <br / >
                    was examined and treated by me <br> <br> From:<input type="text" id="txt10" / > To:
                    <input type="text" id="txt11" / ><br> <br>and now is in good position to get back to work. <br / > <br / > <br / > <br / > <br / >
                    Medical certificate issued in (place): <input type="text" id="txt5" / > <br / > <br / > <br / > <br / > <br / >
                    Dated: <input type="text" id="txt6" / >
                </div>
                <div class="certibottom">
                    Doctor's Stamp: <br />
                    <div class="stamp"><img src="../docd/<?php echo $stam;?>" alt="No stamp" height="100" width="150"></div> <br /><br />
                    <input type="text" id="txt7" value=<?php echo $stam;?> hidden>
                    <input type="text" id="txt8" value=<?php echo $emause;?> hidden>
                    <input type="text" id="txt9" value=<?php echo $aid;?> hidden>
                </div>

            </div>
            <dic class="bto" style="margin:0px 600px;"><input type="button" value="OK" id="cli"></div>
        </div>
        <script>
    $(document).ready(function(){
        $("#cli").click(function(){
            //alert("hii");
            var dnm=$("#txt1").val();
     var qual=$("#txt2").val();
     var pnam=$("#txt3").val();
     var ag=$("#txt4").val();
     var pla=$("#txt5").val();
     var dat=$("#txt6").val();
     var sig=$("#txt7").val();
     var emuse=$("#txt8").val();
     var aid=$("#txt9").val();
     var fr=$("#txt10").val();
     var to=$("#txt11").val();
     var dataa='dnam='+dnm+'&qual='+qual+'&pnam='+pnam+'&ag='+ag+'&pla='+pla+'&dat='+dat+'&sig='+sig+'&emuse='+emuse+'&aid='+aid+'&fr='+fr+'&to='+to;
         //alert(dataa);
         $.ajax({
     type:"POST",
     url:"certp.php",
     data:dataa,
     success:function(result){
         //console.log(result);
         //alert(result);
     }
     });

        });

    });

</script>
        </body >
        </html >
