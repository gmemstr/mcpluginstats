<?php
	
	$name = $_POST['plname'];
	$desc = $_POST['pldesc'];
	$user = $_POST['userid'];
	$api_key = $_POST['api_key'];
	
	$dbh = new PDO('mysql:host=localhost;dbname=mcpluginstats','root');
	
	$dbh->query("INSERT INTO `plugins` (user, api_key, description, srvnum, name) 
				VALUES ('".$user."','".$api_key."','".$desc."','0','".$name."')");
				
	header( 'Location: index.php' );
	
?>