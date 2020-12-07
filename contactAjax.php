<?php

   $server = "fall-2020.cs.utexas.edu";
   $user = "cs329e_bulko_junho";
   $pwd = "Dull!Flung7Khaki";;
   $dbName = "cs329e_bulko_junho";
   $mysqli = new mysqli ($server,$user,$pwd,$dbName);

   $first = $_GET["first"];
   $last = $_GET["last"];
   $email = $_GET["email"];
   $phone = $_GET["phone"];
   $comment = $_GET["comment"];

   // Escape User Input to help prevent SQL Injection

   $last = $mysqli->real_escape_string($last);
   $first = $mysqli->real_escape_string($first);
   $email = $mysqli->real_escape_string($email);
   $phone = $mysqli->real_escape_string($phone);
   $comment = $mysqli->real_escape_string($comment);

   if (strlen($first) == 0 || strlen($last) == 0 || strlen($email) == 0 || strlen($comment) == 0){
       echo 'Please check again.';
   } else{
    echo 'Successfully submitted!';
    $first = "'".$first."'";
    $last = "'".$last."'";
    $email = "'".$email."'";
    $phone = "'".$phone."'";
    $comment = "'".$comment."'";

    $command = "INSERT INTO contact_info VALUES ($first,$last,$email,$phone,$comment)";
    
    // Issue the query
    $result = $mysqli->query($command);
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command
        = $command");
    }

   }

?>