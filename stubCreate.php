<?php
print <<<FIRST
<html lang="en">

<head>
<link rel="stylesheet" href="homePage.css">

</head>
<body>
   <script language="javascript" type="text/javascript">
   function ajaxFunction(){
	var ajaxRequest;
	ajaxRequest= new XMLHttpRequest();
	ajaxRequest.onreadystatechange=function(){
	if(ajaxRequest.readyState == 4){
		var ajaxDisplay= document.getElementById('ajaxdiv')
		var user=document.getElementById('username').value;
		ajaxDisplay.innerHTML = ajaxRequest.responseText;
		if(ajaxRequest.responseText.trim()=="New user registered"){
			window.location="stubAccount.php?user="+user;
} 
	}
		}
		var user= document.getElementById('username').value;
		var pass= document.getElementById('password').value;
		var array=[]
		var fav=document.querySelectorAll('input[type=checkbox]:checked');
		for (var i=0; i<fav.length;i++){
			array.push(fav[i].value);
		
		}
		console.log(array);
		var queryString="?user="+user +"&pass="+ pass + "&fav=" +array;
		ajaxRequest.open("GET", "register.php"+queryString, true);
		ajaxRequest.send(null);
	}

</script>
FIRST;





/*
$value;
$script=$_SERVER['PHP_SELF'];
$file=fopen("./passwd.txt","r");
$data=array();

if (filesize('passwd.txt') != 0){
	while(!feof($file)){
	$line=fgets($file);
	$parts=explode(':',$line);
	$username=$parts[0];
	$password=$parts[1];
	$data[]=$username;
	}
}

fclose($file);

if (isset($_POST["submit"])){
	print "hello?";
	$uniquet=$_POST["username"];
    if(in_array($uniquet, $data)){
	    notunique();
    }
    else{
	    nextstep();
    }
}
 
function notunique(){
   $msg= "your username is not unique";	
   print '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function nextstep(){
  $p_user=$_POST["username"];
  $p_pass=$_POST["password"];
  $file=fopen("./passwd.txt","a");
  fwrite($file, "$p_user".":"."$p_pass"."\n");
  fclose($file);	  
  header("Location:stubLogin.php");	 
}
 */
print <<<TOP
<h1 id="header" style=width:100%>Create an Account </h1>



<div id="accountdiv">
<form method= "POST" name='myForm'>
<table id="accounttable">
<tr>

<td> <h3> Username: </h3></td> <td> <input id="username" name="username" type="text" size ="65" required/></label> </td>
</tr>
<tr>
<td><h3> Email:</h3></td> <td> <input id="email" name="email" type="text" size="65" required/></label></td>
</tr>
<tr>
<td><h3> Password: </h3> </td><td><input id="password" name="password" type="password" size="65" required/></label></td>
</tr>
<tr>
<td><h3> Retype Password:</h3></td> <td><input id="retype" name="retype" type="password" size="65" required/></label></td>
</tr>
<tr>
	<td><h3>Favorite Artist:</h3></td> <td>Illenium<input name="illenium" type="checkbox" value="Illenium"> Alan Walker<input name="alan" type="checkbox" value="Alan Walker">Kygo<input name="kygo" type="checkbox" value="Kygo">Martin Garrix<input name="martin" type="checkbox" value="Martin Garrix">Porter Robinson<input name="porter" type="checkbox" value="Porter Robinson">Flume<input name="flume" type="checkbox" value="Flume"></td></tr>
<tr>
	<td>&nbsp</td>
	<td>Calvin Harris<input name="calvin" type="checkbox" value="Calvin Harris">
		Marshmello<input name="marshmello" type="checkbox" value="Marshmello">
		Skrillex<input name="skrillex" type="checkbox" value="Skrillex">
		Tiesto<input name="tiesto" type="checkbox" value="Tiesto">
		DJ Snake<input name="snake" type="checkbox" value="DJ Snake">
		Zedd<input name="zedd" type="checkbox" value="Zedd">
		Avicii<input name="avicii" type="checkbox" value="Avicii"></td></tr>
<tr> 
	<td>&nbsp</td><td>&nbsp</td>
</tr>
</table>
</form>

<br/>

<a style=color:cyan href=stubLogin.php>Already have an account? click here to sign in</a>
<button type="submit" name="submit" onclick="ajaxFunction()" id="accountbutton">Create</button>
</div>
<div id="ajaxdiv"> </div>
<div id="contactbox">
<a href="homePage.html"><h3>Click to return home</h3></a>
<a href="contact.html"><h3>Contact Us Here!</h3></a>
Last Updated: 11/2/2020

</div>
</body>
</html>
TOP;

?>
