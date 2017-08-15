<?php
	session_start();

	$db_host= "dbhome.cs.nctu.edu.tw";
	$db_name= "chiyi0811_cs_cloud";
	$db_user= "chiyi0811_cs";
	$db_password= "5566";
	$dsn= "mysql:host=$db_host;dbname=$db_name";
	$db= new PDO($dsn, $db_user, $db_password);
?>