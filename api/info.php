<?php
	$debug = false;
	error_reporting(0);
	
	if($debug == true){
		
	}
	
	if($_POST['api_key'] != null){
		
		/*
		+ The reason that the $_SERVER method may be disabled is for
		+ testing purposes. Disble $_POST method and enable $_SERVER
		+ Method for main release. :) 
		*/
		$serverIp = $_SERVER["REMOTE_ADDR"];
		//$serverIp = $_POST['srvip'];
		$serverPort = $_POST['port'];
		$online = $_POST['online'];
		$apikey = $_POST['api_key'];
		
		if($serverPort == null){
			$ar = array(
				"sucsess" => false,
				"id" => 403);
			echo json_encode($ar);
		}
		else if($online == null){
			$ar = array(
				"sucsess" => false,
				"id" => 405);
			echo json_encode($ar);
		}
		else if($apikey == null){
			$ar = array(
				"sucsess" => false,
				"id" => 406);
			echo json_encode($ar);
		}
		
		else{
	
			try {
        		$dbh = new PDO('mysql:host=localhost;dbname=mcpluginstats','root');
        		foreach ($dbh->query("SELECT * FROM `servers` WHERE `srvip` = '" . $serverIp . "' AND `srvport` = '" . $serverPort . "' AND `api_key`='".$apikey."'") as $row) {
        	    	//print_r($row);
					$dbh->query("UPDATE `servers` SET online = '".$online . "' WHERE `srvip` = '" . $serverIp . "' AND `srvport` = '" . $serverPort . "'");
        		}
				if ($row == null){
					$dbh->query("INSERT INTO `servers` (srvip, srvport, online, api_key, srvname) VALUES ('".$serverIp."','".$serverPort."','".$online."','".$apikey."','test')");
					foreach ($dbh->query("SELECT `srvnum` FROM `plugins` WHERE `api_key` = '".$apikey."'") as $num){
					
					}
					$newnum = $num['srvnum']+1;
					//echo $num;
					$dbh->query("UPDATE `plugins` SET srvnum='".$newnum."' WHERE api_key = '".$apikey."'");
				}
        		$dbh = null;
    		} catch (PDOException $e) {
        		$ar = array(
					"sucsess" => false,
					"id" => 300);
				echo json_encode($ar);
        		die();
    		}
	
		/* Unneeded code *for now*
		$info = $serverIp . ':' . $serverPort;
		if ($online == true) { $info = $info . " online\r\n"; }
		else { $info = $info . " offline\r\n"; }
	
		$serverlist = fopen("servers.log", "a+");
		fwrite($serverlist, $info);
		fclose($serverlist);
		*/
		
			$ar = array(
				"sucsess" => true,
				"id" => 1);
			echo json_encode($ar);
		}
		
	} else {
		$ar = array(
		"sucsess" => false,
		"id" => 404);
		echo json_encode($ar);
	}

	header('Content-Type: application/json');
?>