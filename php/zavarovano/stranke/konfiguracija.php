<?php
	define('STREZNIK', 'localhost:3306');
	define('UPORABNISKO_IME', 'root');
	define('GESLO', 'ep');
	define('BAZA', 'spletnaProdajalna');
	$povezavaDoBaze = mysqli_connect(STREZNIK, UPORABNISKO_IME, GESLO, BAZA);
	mysqli_set_charset($povezavaDoBaze,"utf8");
?>