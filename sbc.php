<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="sbc.css">
    <?php
session_start();
if((isset($_SESSION["na"])) && isset($_SESSION["em"])){}
else{
    header("Location:sin.php");
}?>
</head>
<body>
<div>
<div class="mobo">
        <div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
        <div class="headi">

            <h1>Sakali 5 , Dupari 4 Ani Ratri 5</h1>
            <div class="he">Better Health Better Future</div>
        </div>
        <div class="na">
            <h1>THE CARE THAT YOU WANT!!!</h1>
            <p >SEARCH BY CATEGORY:</p>
            <select>
  <option value="ENT">ENT</option>
  <option value="HEART">HEART</option>
  <option value="DENTIST">DENTIST</option>
  <option value="HOMEOPATH">HOMEOPATH</option>
</select>
<select> SELECT BY DOCTORS NAME:
  <option value="volvo">DR.VAISHNAVI</option>
  <option value="saab">DR.ANUSHKA</option>
  <option value="mercedes">DR.MINAL</option>
  <option value="audi">DR.PRADNYA</option>
</select>

<button type="button">SEARCH</button>
<h2> "GET WELL SOON,VISIT AGAIN"</h2>
        </div>
        
</body>
</html>