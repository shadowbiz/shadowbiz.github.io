<?php
    // Send variables for the MySQL database class.
    $database = mysql_connect('localhost', 'shadowbiz', '5P5c9YSH') or die('Could not connect: ' . mysql_error());
    mysql_select_db('shadowbiz') or die('Could not select database');
 
    $query = "SELECT * FROM `bluesbowling` ORDER by `score` DESC LIMIT 5";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
    $num_results = mysql_num_rows($result);  
 
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_array($result);
         echo $row['name'] . " - " . $row['score'] . "\n";
    }
?>