<?php
  error_reporting(E_ALL);
  ini_set("display_errors","on");
  $server="fall-2020.cs.utexas.edu";
  $user="cs329e_bulko_sungho98";
  $pwd="melt2raid6Mood";
  $dbName="cs329e_bulko_sungho98";

  $mysqli= new mysqli($server, $user, $pwd, $dbName);

  if ($mysqli-> connect_errno) {
	  die ('Connect Error: '. $mysqli->connect_errno .":" . $mysqli->connect_error);
  }

  $user= $_GET['user'];
  $pass= $_GET['pass'];
  $fav=$_GET['fav'];
  $favarray=explode(",",$fav);
  $mysqli->select_db($dbName) or die($mysqli->error);
  
  $query= "SELECT * FROM passwords WHERE Username= '$user'";
  $result=$mysqli->query($query) or die($mysqli->error);
  

  
  $row= $result->fetch_array(MYSQLI_ASSOC);
  if ($row['ID']==""){
	  $query="INSERT INTO passwords(Username, Password) VALUES ('$user', '$pass')";
	 
	  if (mysqli_query($mysqli,$query)){
		
		  echo "New user registered";
		  
	  }
	  else{
		 echo $mysqli->error; 
	  }
	  foreach($favarray as $item){
		  $query ="INSERT INTO favorite(Username, Artist) VALUES ('$user','$item')";
	  if (mysqli_query($mysqli,$query)){
		  echo "";
	  }
	  
	  
	  }
  }
 

  

  else{
	  echo"Username already exists";
  }

?>


