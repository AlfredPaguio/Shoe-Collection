<?php

$host = "localhost"; // MySQL host name eg. localhost

$user = "root"; // MySQL user. eg. root ( if your on localserver)


$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )

$db = "shoe_collection"; // MySQL Database name
	//for MySQLi Procedural
	$con = mysqli_connect($host, $user, $password, $db);
	if(!$con){
	     die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_report(MYSQLI_REPORT_ERROR);
?>