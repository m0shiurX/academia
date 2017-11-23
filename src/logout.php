<?php
	require_once 'components/header.php';
	if (isset($_SESSION['user']) )
	{
		session::destroy('user');
		$commons->redirectTo(SITE_PATH.'login.php');
	}