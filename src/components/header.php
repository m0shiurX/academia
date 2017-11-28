<?php
    require_once 'components/headx.php';
    if (!isset($_SESSION['user']) ){
        $commons->redirectTo(SITE_PATH.'login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Dashboard | Academia</title>
</head>
<body>