<?php
	header('Content-Type: text/html');
	$db_host = "localhost";
	$db_username = "root";
	$db_password = "rootroot";
	$db_name = "final_project";
	$db_link = @mysqli_connect($db_host, $db_username, $db_password, $db_name);
	mysqli_set_charset($db_link, 'utf8');
?>