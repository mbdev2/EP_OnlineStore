<?php
	session_start();
	if (isset($_SESSION['idAdmin']) || isset($_SESSION['idProd'])){
		session_destroy();
		header("Location: ../stranke/prijavaOsebja.php");
	}
	else{
		session_destroy();
		header("Location: ../stranke/prijava.php");
	}
	exit();
?>
