<?php
	require_once 'components/headx.php';
	if (isset($_SESSION['user']) ){
		session::destroy('user');
		$commons->redirectTo(SITE_PATH.'login.php');
	}else{
		$commons->redirectTo(SITE_PATH.'login.php');
	}