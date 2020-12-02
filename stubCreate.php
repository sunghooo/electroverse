<?php

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
print <<<TOP
<html lang="en">

<head>
<link rel="stylesheet" href="homePage.css">

</head>
<h1 id="header" style=width:100%>Create an Account </h1>



<div id="accountdiv">
	<form method="post" action="$script">
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
		<td><h3>Favorite Artist:</h3></td> <td>Illenium<input name="illenium" type="checkbox" value="illenium"> Alan Walker<input name="alan" type="checkbox" value="alan">Kygo<input name="kygo" type="checkbox" value="kygo">Martin Garrix<input name="martin" type="checkbox" value="martin">Porter Robinson<input name="porter" type="checkbox" value="porter">Flume<input name="flume" type="checkbox" value="flume"></td></tr>
	<tr>
		<td>&nbsp</td>
		<td>Calvin Harris<input name="calvin" type="checkbox" value="calvin">
			Marshmello<input name="marshmello" type="checkbox" value="marshmello">
			Skrillex<input name="skrillex" type="checkbox" value="skrillex">
			Tiesto<input name="tiesto" type="checkbox" value="tiesto">
			DJ Snake<input name="snake" type="checkbox" value="snake">
			Zedd<input name="zedd" type="checkbox" value="zedd">
			Avicii<input name="avicii" type="checkbox" value="avicii"></td></tr>
	<tr> 
		<td>&nbsp</td><td>&nbsp</td>
	</tr>
	</table>
	
	<br/>

	<a style=color:cyan href=stubLogin.php>Already have an account? click here to sign in</a>
	<button type="submit" name="submit" id="accountbutton">Create</button>
	</form>
</div>

<div id="contactbox">
  <a href="homePage.html"><h3>Click to return home</h3></a>
  <a href="contact.html"><h3>Contact Us Here!</h3></a>
  Last Updated: 11/2/2020

</div>
</body>
</html>
TOP;

?>
