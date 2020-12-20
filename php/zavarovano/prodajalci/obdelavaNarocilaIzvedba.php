<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$orderStatus = $_POST['orderStatus'];
	$datumPotrditve = date('Y-m-d H:i:s');
	$idNarocila = $_POST['idNarocila'];

	$posodobitevPotrjenostiQuery = mysqli_prepare($dbConnection, "UPDATE narocila SET orderStatus = ?, datumPotrditve = ? WHERE idNarocila = ?");
	mysqli_stmt_bind_param($posodobitevPotrjenostiQuery, 'isi', $orderStatus, $datumPotrditve, $idNarocila);
	mysqli_stmt_execute($posodobitevPotrjenostiQuery);
	$posodobitevPotrjenostiQuery = $posodobitevPotrjenostiQuery->get_result();
	header("Location: seznamNarocil.php");
?>
