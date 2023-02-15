<?php

use PhpParser\Node\Stmt\TryCatch;

	// $serverName = "localhost";
	// $userName = "root";
	// $passWord = "";
	// $database = "digishop";
	// $post = "3306";

	// $serverName = "192.168.163.128";
	// $userName = "root";
	// $passWord = "";
	// $database = "digishop";

	$serverName = "103.200.23.160";
	$userName = "digishop_nampp";
	$passWord = "TiniWorld1@3";
	$database = "digishop_data";

	$dsn = "mysql:host=$serverName;dbname=$database;charset=UTF8";
	try {
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		return new PDO($dsn,$userName,$passWord, $options);

	} catch(PDOException $e) {
		echo $e->getMessage();
	}
	

	// $conn = new mysqli($serverName, $userName, $passWord, $database);
	// // var_dump($conn);
	// if($conn->connect_error) {
	// 	echo "connect fail";
	// 	die();
	// }
	// echo "connect success";
	
?>

