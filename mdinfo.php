<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../csss/homad.css">
    <title>Document</title>
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div class="mobo">
    <div class="sym"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
</div>  

<?php
if(isset($_SESSION["na"])&&isset($_SESSION["em"]))
{
    $conn=mysqli_connect("localhost","root","","db1234");
    $v=mysqli_real_escape_string($conn,$_GET['id']);
    echo "<h1 style='text-style:italic;margin-top:20px;margin-left:20px;'>Certificates of Doctor:</h1><br>";
    $qu="SELECT atach FROM docto WHERE ema='$v'";
    // echo $qu;
    $re=mysqli_query($conn,$qu);
    $co=mysqli_num_rows($re);
    $ar=mysqli_fetch_object($re);
        $doc=$ar->atach;
        if(strpos($doc,",")!==false)
    {
        $dar=explode(",",$doc);
        // print_r($dar);
        $dc=sizeof($dar);
        // echo "Countt".$dc;
         for($m=0;$m<$dc;$m++)
        {
            // echo "hii";
            $ele='<img src="../docd/'.$dar[$m].'" width="300" height="350" style="margin:10px 20px">'."<br>";
            echo $ele; 
        } 
    }
    else{
        $ele='<img src="../docd/'.$doc.'" width="300" height="350" style="margin:10px 20px">'."<br>";
        echo $ele;
    }
    
    $q="SELECT * FROM feed WHERE emd='$v'";
    // echo $q;
    $r=mysqli_query($conn,$q);
    $c=mysqli_num_rows($r);
    if($c>0)
    {
        echo "<h1 style='text-style:italic'>Feedback Given:</h1><br>";
        for($i=0;$i<$c;$i++)
        {
            $row=mysqli_fetch_assoc($r);
            $ptnam=$row["ptnam"];
            $dcid=$row["dcid"];
            $dcnam=$row["dcnam"];
            $emd=$row["emd"];
            $emu=$row["emu"];
            $rat=$row["rat"];
            $fed=$row["fed"];
            $con="<div class='f".$i."' style='font-size:20px;'><table><tr><td><p id='ptnam".$i."'>User &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp</td><td>".$ptnam."</p></td></tr><tr><td><p id='rt".$i."'>Rating &nbsp &nbsp &nbsp &nbsp:&nbsp</td><td>".$rat."</p></td></tr><tr><td><p id='fed".$i."'>Feedback &nbsp: &nbsp</td><td>".$fed."</p></td></tr></table></div>";
            echo $con;
        }
    }
}
?>
</body>
</html>