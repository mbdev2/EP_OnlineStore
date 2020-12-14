<?php
	define('STREZNIK', 'localhost:3306');
	define('UPORABNISKO_IME', 'root');
	define('GESLO', 'ep');
	define('DB', 'eSHOPmma');
	$povezavaDoBaze = mysqli_connect(STREZNIK, UPORABNISKO_IME, GESLO, DB);
	mysqli_set_charset($povezavaDoBaze,"utf8");
?>