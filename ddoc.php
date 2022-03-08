<?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$ImageName=count($_FILES['cerd']['name']);
print_r($_FILES['cerd']['name']);
$o=implode(",",$_FILES['cerd']['name']);
echo $o;
for($i=0;$i<$ImageName;$i++)
{
    $nam=$_FILES['cerd']['tmp_name'][$i];
    //echo $nam;
    $nm='file/'.$_FILES['cerd']['name'][$i];
    $imgty=(pathinfo($nm,PATHINFO_EXTENSION));
echo $imgty;
if($nam!="")
    {
if($imgty=="jpg"||$imgty=="png"||$imgty=="jpeg")
{
        $path = 'C:/xampp/htdocs/docd/'; 
        $location = $path .basename( $_FILES['cerd']['name'][$i]);
        $tr=move_uploaded_file($nam, $location);
        if($tr)
        {
            echo "ohohohoho";
        }
    }

    else{
        echo "Sorry this file format is not supported try jpeg,jpg,png";
    }
}

   // echo "<br>".$nm;
    
    //     if (!(in_array($nm,['zip','pdf','docx']))) {
    //         echo "You file extension must be .zip, .pdf or .docx";
    //         return false;
    //     }
    //     else{
       
    //     echo "<br>".$location;
        
    // }
    // }

     
    //$imgty=(pathinfo($imgn,PATHINFO_EXTENSION));
}
if($tr)
{
    $qu="UPDATE docto SET atach='$o' WHERE ema='$em'";
    $res=mysqli_query($con,$qu);
    if($res)
    {
        header("Location:homus.php");
    }
}
}
else{
    header("Location:sin.php");
}
?>