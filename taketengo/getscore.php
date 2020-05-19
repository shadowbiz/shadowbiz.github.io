<?php
    $db = mysql_connect('localhost', 'shadowbiz', '5P5c9YSH') or die('Could not connect: ' . mysql_error());
    mysql_select_db('shadowbiz') or die('Could not select database');
 
    $difficulty = mysql_real_escape_string($_GET['difficulty']);

	//$query = sprintf("SELECT time FROM taketengo WHERE diff='%n' ORDER by time DESC LIMIT 1", $difficulty);
	$query = "SELECT time FROM taketengo WHERE diff='$difficulty' ORDER by time ASC LIMIT 1";

    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    $num_results = mysql_num_rows($result);  
 
    for($i = 0; $i < $num_results; $i++) {
         $row = mysql_fetch_array($result);
         echo $row['time'] . "\n";
    }
?>