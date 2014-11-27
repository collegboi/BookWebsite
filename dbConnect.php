<?php
//php page for login into root database 

$dbhost = 'localHost:8888'
$dbusername = 'root';
$dbpassword = 'root';

$connect = mysql_connect($dbhost, $dbusername, $dbpassword);

if(! $connect) {
	echo ('Error in Connection'.mysql_error());
}

?>