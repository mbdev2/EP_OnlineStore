<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$potrjenost = $_POST['potrjenost'];
	$datumPotrditve = date('Y-m-d H:i:s');
	$idNarocila = $_POST['idNarocila'];

	$posodobitevPotrjenostiQuery = mysqli_prepare($povezavaDoBaze, "UPDATE narocila SET potrjenost = ?, datumPotrditve = ? WHERE idNarocila = ?");
	mysqli_stmt_bind_param($posodobitevPotrjenostiQuery, 'isi', $potrjenost, $datumPotrditve, $idNarocila);
	mysqli_stmt_execute($posodobitevPotrjenostiQuery);
	$posodobitevPotrjenostiQuery = $posodobitevPotrjenostiQuery->get_result();

	header("Location: seznamNarocil.php");
?>