<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../csss/homad.css">
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
       <div class="contain"><ul><li><a href="homus.php">Search</a></li>
<li><a href="apodoc.php">Appointments</a></li>
<li><a href="pendr.php">Requested Appointments</a></li>
<li><a href="mdr.php" class="current">Medical Records</a></li>
<li><a href="cert.php">Certificate</a></li> 
<li><a href="sch.php">Schedule</a></li></ul>
<div class="drp"><div class="drpbtn">Settings </div><div class="drpcon"> <a href="upddoc.php">Update Profile</a>
<a href="sgnout.php">Sign Out</a></div></div>
</div>
</body>
</html>

<?php
$em=$_SESSION["em"];
$conn=mysqli_connect("localhost","root","","db1234");
$q="SELECT apid,ptid,ptnam,emause FROM appoint WHERE emai='$em' 
ORDER BY apid DESC";
$s=mysqli_query($conn,$q);
$r=mysqli_num_rows($s);
$arr=array();
$pti=array();
$ptnam=array();
while($ar=mysqli_fetch_assoc($s))
{
    $arr[]=$ar["emause"];
    $pti[]=$ar["ptid"];
    $ptnam[]=$ar["ptnam"];
}

$arrr=array_unique($arr);
$prrr=array_unique($pti);
$ptrrr=array_unique($ptnam);
// print_r($arrr);
// print_r($prrr);
// print_r($ptrrr);
 $c=count($arrr);
//  echo $c;
$docu=array();
$n=current($arrr);
$pn=current($prrr);
$ptn=current($ptrrr);
for($i=0;$i<$c;$i++)
{
    // $n=next($arrr);
    // echo $n;
    $qq="SELECT doc FROM usero WHERE ema='$n'";
    echo "Patient Id: ".$pn."<br>";
     echo "Patient Name: ".$ptn."<br>"."Documents:<br> ";
    $rr=mysqli_query($conn,$qq);
    $doc=mysqli_fetch_object($rr);
    $docu[$i]=$doc->doc;
    // echo $docu[$i];
    // $d=strpos($docu[$i],",");
    // echo $d;
 //}
     if(strpos($docu[$i],",")!==false)
    {
        $dar=explode(",",$docu[$i]);
        // print_r($dar);
        $dc=sizeof($dar);
        // echo "Countt".$dc;
         for($m=0;$m<$dc;$m++)
        {
            // echo "hii";
            $ele='<img src="../used/'.$dar[$m].'" width="300" height="350" style="margin:10px 20px">'."<br>";
            echo $ele; 
        } 
    }

    else{ 
    
        $ele='<img src="../used/'.$docu[$i].'" width="300" height="350" style="margin:10px 20px">'."<br>";
        echo $ele;
     }
     $n=next($arrr);
     $pn=next($prrr);
     $ptn=next($ptrrr);

}
//} */
// print_r($docu);
/* for($i=0;$i<$r;$i++)
{
    $row=mysqli_fetch_assoc($s);
    $ptid= $row["ptid"];
    $ptnam=$row["ptnam"];
    $pr
    echo '<div class="asa"><table><tr><td><label for="aa">Date of Appointment</label></td><td>
    <input type="text" id="aa" name="aa" value='.$date.'></td></tr><br>
    <tr><td><label for="bb"> Appointment Id</label></td><td>
    <input type="text" id="bb" name="bb" value='.$apid.'></td></tr>   <br> 
    <tr><td><label for="cc">Time of Appointment</label></td><td><input type="text" id="cc" name="cc" value='.$tims.'></td></tr><br>  
    <tr><td><label for="dd">Pateint Id</label></td><td>  
    <input type="text" id="dd" name="dd" value='.$ptid.'></td></tr><br>
    <tr><td><label for="ee">Patient Name</label>  </td><td>  
    <input type="text" id="ee"  name="ee" value='.$ptnam.'></td></tr><br>    
    <tr><td><label for="ff">Problem</label></td><td>
    <input type="text" id="ff" name="ff" value='.$pro.'></td></tr><br>    
    <tr><td><label for="gg">Location</label></td><td>
    <input type="text" id="gg" name="gg"value='.$loc.'></td></tr></table><br></div>';
} */
// print_r($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
          <div class="bac"> <a href="homus.php">Back</a> </div>
</body>
</html>

























