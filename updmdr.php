<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
    
</body>
</html>
<?php
session_start();
$em=$_SESSION["em"];
$conn=mysqli_connect("localhost","root","","db1234");
$qq="SELECT doc FROM usero WHERE ema='$em'";;
$rr=mysqli_query($conn,$qq);
$doc=mysqli_fetch_object($rr);
$docu=$doc->doc;
    // echo $docu[$i];
    $d=strpos($docu,",");
     if($d)
    {
        $dar=explode(",",$docu);
        $dc=count($dar);
        for($i=0;$i<$dc;$i++)
        {
            $ele='<img src="../used/'.$dar[$i].'" width="300" height="350" style="margin:10px 20px">'."<br>";
            echo $ele;
        }
    }
    else{ 
    
        $ele='<img src="../used/'.$docu.'" width="300" height="350" style="margin:10px 20px">'."<br>";
        echo $ele;
    // }


}
?>