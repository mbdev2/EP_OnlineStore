<?php
	session_start();

	if (isset($_SESSION['idAdministrator']) || isset($_SESSION['idProdajalec'])){
		session_destroy();
		header("Location: ../skupno/prijavaOsebja.php");
	}
	else{
		session_destroy();
		header("Location: ../skupno/prijava.php");
	}

	exit();
?>
