<?php
    if(isset($_COOKIE["PHPSESSID"])) {
		$s = $_COOKIE["NAMEID"];
		
		if($_COOKIE["PHPSESSID"] == $s) {
			if(session_id() === '') {
				session_start();
			}
			$conn = require "config.php";
			require "show-manage.php";
		} else {
			header("location: login.php");
		}
		
	} else {
		header("location: login.php");
	}

?>