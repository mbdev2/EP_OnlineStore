<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}


	$datumPotrditve = date('Y-m-d H:i:s');
	$orderStatus = strip_tags(($_POST['orderStatus']));
	$orderStatus = stripslashes(($_POST['orderStatus']));
	$orderStatus = mysqli_real_escape_string($dbConnection, ($_POST['orderStatus']));
	$orderStatus = htmlspecialchars($orderStatus);
	$idNarocila = strip_tags(($_POST['idNarocila']));
	$idNarocila = stripslashes(($_POST['idNarocila']));
	$idNarocila = mysqli_real_escape_string($dbConnection, ($_POST['idNarocila']));
	$idNarocila = htmlspecialchars($idNarocila);
	
	$posodobitevPotrjenostiQuery = mysqli_prepare($dbConnection, "UPDATE narocila SET orderStatus = ?, datumPotrditve = ? WHERE idNarocila = ?");
	mysqli_stmt_bind_param($posodobitevPotrjenostiQuery, 'isi', $orderStatus, $datumPotrditve, $idNarocila);
	mysqli_stmt_execute($posodobitevPotrjenostiQuery);
	$posodobitevPotrjenostiQuery = $posodobitevPotrjenostiQuery->get_result();
	header("Location: seznamNarocil.php");
?>
