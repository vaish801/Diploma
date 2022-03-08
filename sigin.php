<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h2>Sign-in</h2>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function()
{
$("#aau").click(function()
{
var a=$("#nama").val();
var p=$("#pasa").val();
var e=$("#eama").val();
var cr=$("input[name='cr']:checked").val();
if(a=="")
{
	alert("Enter username");
	return false;
}
else
{
if(p=="")
{
	alert("Enter Password");
return false;
}
else
{
	if(e=="")
{
	alert("Enter Email");
	
	return false;
}
else
{
var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(e)) 
  {
	  alert("Invalid Email");
    return false;
  }
}
}	
}
});	
}); 
</script>
</head>
<body>
<table>
<tr><td>Enter Username:</td><td><input type="text" name="aa" id="nama" value="<?php if(isset($_COOKIE["Cookname"])){echo $_COOKIE["Cookname"];}else{echo "";}?>"><br/><br/></td></tr>
<tr><td>Enter Password:</td><td><input type="text" name="bb" id="pasa"><br/><br/></td></tr>
<tr><td>Enter Email:</td><td><input type="text" name="cc" id="eama"><br/><br/></td></tr>
<tr><td>Remember me:</td><td><input type="checkbox" name="cr" id="cra" value="1">Yes<br/><br/></td>
<!--<td><input type="radio" name="cr" id="cra" value="0">No<br/><br/></td></tr>-->
<tr><td><input type="submit" id="aau"></td></tr>
<tr><td><input type="button" value="Sign-up" onclick="location.href='sigup1.html'" /></td></tr><br/>

<tr><td><a href='forgot.php'><p>Forgot password</p></a></td></tr>
</table>
</body>
</html>
