<?php
session_start();
$con=mysqli_connect("localhost","root","","db1234");
$em=$_SESSION["em"];
$ImageName=count($_FILES['img']['name']);
print_r($_FILES['img']['name']);
$o=implode(",",$_FILES['img']['name']);
echo $o;
for($i=0;$i<$ImageName;$i++)
{
    $nam=$_FILES['img']['tmp_name'][$i];
    //echo $nam;
    $nm='file/'.$_FILES['img']['name'][$i];
    $imgty=(pathinfo($nm,PATHINFO_EXTENSION));
echo $imgty;
if($nam!="")
    {
if($imgty=="jpg"||$imgty=="png"||$imgty=="jpeg")
{
        $path = 'C:/xampp/htdocs/used/'; 
        $location = $path .basename( $_FILES['img']['name'][$i]);
        $tr=move_uploaded_file($nam, $location);
        if($tr)
        {
        
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
    $qu="UPDATE usero SET doc='$o' WHERE ema='$em'";
    $res=mysqli_query($con,$qu);
    if($res)
    {
        header("Location:homuser.php");
    }
}
?>