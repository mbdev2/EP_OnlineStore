<?php
	session_start();

	if (isset($_SESSION['idAdministrator']) || isset($_SESSION['idProdajalec'])){
		session_destroy();
		header("Location: ../admin/prijavaOsebja.php");
	} else{
		session_destroy();
		header("Location: ../stranke/prijava.php");			
	}

	exit();
?>