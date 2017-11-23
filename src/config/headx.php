<?php
	// Get the application settings and parameters
	date_default_timezone_set('Asia/Dhaka');
	require_once "config/config.php";
	require_once "libs/session.php";
	require_once "config/db.php";
	require_once "libs/common.php";
	!isset($_SESSION) ? session::init(): null;
	$dbh 	= new Dbconnect();
	$commons = new Commons($dbh);
?>