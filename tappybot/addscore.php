<?php 
	$db = mysql_connect('localhost', 'shadowbiz', '5P5c9YSH') or die('Could not connect: ' . mysql_error()); 
	mysql_select_db('shadowbiz') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$name = mysql_real_escape_string($_GET['name'], $db); 
	$score = mysql_real_escape_string($_GET['score'], $db); 
	$hash = $_GET['hash']; 

	$secretKey="tappyBot092875"; # Change this value to match the value stored in the client javascript below 

	$real_hash = md5($name . $score . $secretKey); 
	if($real_hash == $hash) { 
		// Send variables for the MySQL database class. 
		$query = "INSERT INTO scores VALUES (NULL, '$name', '$score');"; 
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	} 
?>