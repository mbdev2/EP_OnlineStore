<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$opis = $_POST['opis'];
	$cena = $_POST['cena'];

	$query = mysqli_prepare($dbConnection, "INSERT artikli SET ime = ?, opis = ?, cena = ?, activeOrNot=1");
	mysqli_stmt_bind_param($query, 'ssi', $ime, $opis, $cena);
	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: seznamIzdelkov.php");
?>
