<?php 
	$db = mysql_connect('localhost', 'shadowbiz', '5P5c9YSH') or die('Could not connect: ' . mysql_error()); 
	mysql_select_db('shadowbiz') or die('Could not select database');

	$difficulty = mysql_real_escape_string($_GET['difficulty'], $db);
	$time = mysql_real_escape_string($_GET['time'], $db); 
	$hash = $_GET['hash']; 

	$secretKey="ilovetaketen"; # Change this value to match the value stored in the client javascript below 

	$real_hash = md5($difficulty . $time . $secretKey); 
	if($real_hash == $hash) { 
		// Send variables for the MySQL database class. 
		$query = "INSERT INTO taketengohard VALUES (NULL, NULL, '$difficulty', '$time');"; 
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	} 
?>