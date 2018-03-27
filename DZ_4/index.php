<?php
	require_once('connectDb.php');
	require_once('Classes.php');

	$mysqli = mysqli_connect(SERVER, USER, PASSWORD, NAME_DB) 
		or die ("Ошибка подключения к базе! ".mysqli_connect_errno().": ".mysqli_connect_error());


	$oPages = new pages();

	$oPages->writeСortege(['pageTitle'=>'один', 'text'=>'2'], $mysqli);

