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

	if(isset($_POST['base64slika'])){
		$base64slika = $_POST['base64slika'];
		$query = mysqli_prepare($dbConnection, "UPDATE artikli SET slika1=? WHERE idArtikla = ?");
		mysqli_stmt_bind_param($query, 'si', $base64slika, $id);
		mysqli_stmt_execute($query);
		$query = $query->get_result();
	}
	if(isset($_POST['base64slika2'])){
		$base64slika2 = $_POST['base64slika2'];
		$query = mysqli_prepare($dbConnection, "UPDATE artikli SET slika2=? WHERE idArtikla = ?");
		mysqli_stmt_bind_param($query, 'si', $base64slika2, $id);
		mysqli_stmt_execute($query);
		$query = $query->get_result();
	}
	if(isset($_POST['base64slika3'])){
		$base64slika3 = $_POST['base64slika3'];
		$query = mysqli_prepare($dbConnection, "UPDATE artikli SET slika3=? WHERE idArtikla = ?");
		mysqli_stmt_bind_param($query, 'si', $base64slika3, $id);
		mysqli_stmt_execute($query);
		$query = $query->get_result();
	}

	header("Location: seznamIzdelkov.php");
?>
