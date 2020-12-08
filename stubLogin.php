<?php
  error_reporting(E_ALL);
ini_set("display_errors","on");
$script=$_SERVER['PHP_SELF'];
if (isset($_POST["submit"])){
	dosql();
}


function dosql(){
  $server="fall-2020.cs.utexas.edu";
  $user="cs329e_bulko_sungho98";
  $pwd="melt2raid6Mood";
  $dbName="cs329e_bulko_sungho98";

  $mysqli= new mysqli($server, $user, $pwd, $dbName);
  if ($mysqli-> connect_errno) {
	die ('Connect Error: '. $mysqli->connect_errno .":" . $mysqli->connect_error);
  }

  
	    
  $mysqli->select_db($dbName) or die($mysqli->error);
	    
  $user=$_POST["username"];
  $pass=$_POST["password"];
  var_dump($user);
  var_dump($pass);

  $query= "SELECT * FROM passwords WHERE Username= '$user'";
  $result=$mysqli->query($query) or die($mysqli->error);
	     

	      
  $row= $result->fetch_array(MYSQLI_ASSOC);
  var_dump($row);
   if ($row['ID']==""){	
	   $msg="Incorrect username or passwordsss";
	  print '<script type="text/javascript">alert("'.$msg.'")</script>'; 
				    }
	       

	        
   else if($row['Password']!= $pass){
	   $msg="Incorrect username or password";
	   print '<script type="text/javascript">alert("'.$msg.'")</script>';
   }
	
	
   else{
	  header("location: stubAccount.php?user=$user");
	}


}

/*
$visited='visited';
$script=$_SERVER['PHP_SELF'];

$file=fopen("./passwd.txt","r");
$data=array();
if (filesize('passwd.txt') != 0){
	while(!feof($file)){
	$line=fgets($file);
	$parts=explode(':',$line);
	$username=$parts[0];
	$password=$parts[1];
	$data[trim($username)]=trim($password);
	}
}


fclose($file);

if (isset($_POST["submit"])){
	$uniqueu=$_POST["username"];
	$uniquep=$_POST["password"];
	if (array_key_exists($uniqueu,$data)){
	    if($data[$uniqueu]==$uniquep){
		nextstep();
	    }
	    else{
		    wrong();
	    }
    }
    else{
		 wrong();
    }
}

function wrong(){
   $msg= "Incorrect username or password";	
   print '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function nextstep(){
	header("Location:stubAccount.html");
}
 */
print <<<TOP
<html lang="en">

<head>
<link rel="stylesheet" href="homePage.css">

</head>

<h1 id="header" style=width:100%>Sign In</h1>



<div id="accountdiv">
	<form method="post" action="$script">
	<table id="accounttable">
	<tr>

	<td> <h3> Username: </h3></td> <td> <input id="username" name="username" type="text" size ="65" required/></label> </td>
	</tr>
	<tr>
	<td><h3> Password: </h3> </td><td><input id="password" name="password" type="password" size="65" Required/></label></td>
	</tr>
	</table>

	<a style=color:cyan href=stubCreate.php>First time user? click here to register</a>
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




