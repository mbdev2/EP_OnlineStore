<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = $_POST['idIzdelka'];
	$ime = $_POST['ime'];
	$opis = $_POST['opis'];
	$cena = $_POST['cena'];
	if(isset($_POST['activeOrNot'])) {
		$activeOrNot = 1;
	}
	else {
		$activeOrNot = 0;
	}

	$query = mysqli_prepare($dbConnection, "UPDATE artikli SET ime = ?, opis = ?, cena = ?, activeOrNot = ? WHERE idArtikla = ?");
	mysqli_stmt_bind_param($query, 'sssii', $ime, $opis, $cena, $activeOrNot, $id);
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamIzdelkov.php");
?>
