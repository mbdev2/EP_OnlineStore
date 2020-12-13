<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$id = $_POST['idIzdelka'];
	$ime = $_POST['ime'];
	$opis = $_POST['opis'];
	$cena = $_POST['cena'];
	if(isset($_POST['aktivnost'])) {
		$aktivnost = 1;
	} else {
		$aktivnost = 0;
	}

	$query = mysqli_prepare($povezavaDoBaze, "UPDATE artikli SET ime = ?, opis = ?, cena = ?, aktivnost = ? WHERE idArtikla = ?");
	mysqli_stmt_bind_param($query, 'sssii', $ime, $opis, $cena, $aktivnost, $id);
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamIzdelkov.php");
?>