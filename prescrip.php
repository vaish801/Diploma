
<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
    echo $_SESSION["na"];
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=mysqli_real_escape_string($conn,$_GET['id']);
    $q="SELECT dat,tims,ptid,ptnam,pro,dcid,dcnam,loc FROM appoint WHERE apid='$v' AND sta=0";
    $s=mysqli_query($conn,$q);
    $re=mysqli_fetch_object($s);
    $da=$re->dat;
    $ti=$re->tims;
    $pid=$re->ptid;
    $pnm=$re->ptnam;
    $pr=$re->pro;
    $dnm=$re->dcnam;
    $did=$re->dcid;
    $lo=$re->loc;
}
else{
    header("Location:sin.php");
}
// $conn=mysqli_connect("localhost","root","","db1234");
// $q="SELECT * ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../csss/ho1.css">
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
    <div class="conten">
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
    <div class="inp"><input type="text" name="prblm" id="prblm" value="<?php echo $pr;?>"></div>
    <div class="hea"><label for="sym">Symptoms</label></div>
    <div class="inp"><textarea name="sym" id="sym" cols="30" rows="10"></textarea></div>
    <div class="hea"><label for="med">Medicines with Dosage</label></div>
    <div class="inp"><textarea name="med" id="med" cols="30" rows="10"></textarea></div>
    <div class="hea"><label for="sug">Other Suggestions</label> </div>
    <div class="inp"><textarea name="sug" id="sug" cols="30" rows="10"></textarea></div>
    <div class="inp"><input type="checkbox" name="nap" id="nnap" value="1">Next Appointment (If Required)</div>
     <div class="optio" style="display:none;"> <div class="hea"><label for="napid">Next Appointment Id</label></div>
    <div class="inp"><input type="text" name="napid" id="napid"></div>
    <div class="hea"><label for="ndat">Next Date</label></div>
    <div class="inp"><input type="text" name="ndat" id="ndat"></div>
    <div class="hea"><label for="ntim">Timing</label> </div>
    <div class="inp"><input type="text" name="ntim" id="ntim"></div>
    <div class="hea"><label for="nloc">Location</label></div>
    <div class="inp"><input type="text" name="nloc" id="nloc"></div></div>
    <div class="but"><input type="button" value="Submit" id="butto"></div>
    </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('#nnap').change(function(){
                // alert("Checkedd");
                if ($(this).is(":checked")) {
                $(".optio").show();
            } else {
                $(".optio").hide();
            }
            });
             $("#butto").click(function(){
              var apid=$("#apid").val();
              var datee=$("#dat").val();                
              var tim=$("#tim").val();                
              var loc=$("#loc").val();                
              var dcnam=$("#dcnam").val();                
              var dcid=$("#dcid").val();                
              var pnam=$("#pnam").val();   
                           
              var pid=$("#pid").val();                
              var prblm=$("#prblm").val();    
              var sym=$("#sym").val();                
              var med=$("#med").val();     
                                     
              var sug=$("#sug").val();                
              var napid=$("#napid").val();                
              var ndat=$("#ndat").val();                
              var ntim=$("#ntim").val(); 
              var nloc=$("#nloc").val();      
            // alert(apid+datee+tim+loc+dcnam+dcid+pnam+pid+prblm+sym+med+sug+napid+ndat+ntim+nloc);          
            //   var ch=$('input[name="nap"]:checked').val();     
            var vaal=$('#nnap').val();
        // alert(vaal);
              if(sym=="")
              {
                  alert("Enter Symptoms");
                  return false;
              }
              if(med=="")
              {
                  alert("Enter medicines");
                  return false;
              }
              var chh=0;
              if($("input[type=checkbox]").is( 
                      ":checked"))
              {
                  alert("heheheheheh");
                   chh=1;
                  if(ndat=="")
                {
                    alert("Enter Next Appointment Date");
                    return false;
                }
                if(ntim=="")
                {
                    alert("Enter Next Appointment Timing");
                    return false;
                }
                if(nloc=="")
                {
                    alert("Enter Next Appointment Location");
                    return false;
                }
                // var ddd="ndat="++""
                
              }
              
              var dataa="sym="+sym+"&med="+med+"&sug="+sug+"&ch="+chh+"&napid="+napid+"&ndat="+ndat+"&ntim="+ntim+"&nloc="+nloc+"&apid="+apid+"&prblm="+prblm;
            //alert(dataa);
              $.ajax({
                type:"POST",
                url:"prphp.php",
                data:dataa,
                success:function(result){
                  //alert(result);
                }
            });
             });
           
        });
    
    </script>
</body>
</html>