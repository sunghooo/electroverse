<?php
/*
$user=$_GET['user'];
$server="fall-2020.cs.utexas.edu";
$user="cs329e_bulko_sungho98";
$pwd="melt2raid6Mood";
$dbName="cs329e_bulko_sungho98";


$mysqli= new mysqli($server, $user, $pwd, $dbName);

if ($mysqli-> connect_errno) {
	die ('Connect Error: '. $mysqli->connect_errno .":" . $mysqli->connect_error);
}
  
$mysqli->select_db($dbName) or die($mysqli->error);
    
$query= "SELECT Artist, Date, Name, Price, Place FROM concert join favorite on favorite.Artist=concert.Artist WHERE Username= '$user'";
$result= $mysqli->query($query) or die($mysqli->error);

$rowcount=mysqli_num_rows($result);

$row= $result->fetch_array_all(MYSQLI_ASSOC);

if($rowcount>0){
	for($i=0;$i<$rowcount;$i++){
		print "<tr><td> $Artist</td> <td>$Date </td> <td>$Name</td> <td>$Price</td> <td>$Place</td></tr>";
	}
}
else{
	print "<h2> No upcoming concerts </h2>";
}

 */
print<<<TOP
<html>
<head>
<title>Stub Account</title>
<link rel="stylesheet" href="homePage.css">
<link rel="icon" href="EV_logo.png">
</head>
  
<h1>Stub Account Page</h1>

<h2>This page will contain user info and show concert times and news based on user's favorited artists</h2>
<a href="homePage.html"><h2>Click to return home</h2></a>

<div id="contactbox">
  <a href="contact.html"><h3>Contact Us Here!</h3></a>
  Last Updated: 11/2/2020
</div>
</html>
TOP;
