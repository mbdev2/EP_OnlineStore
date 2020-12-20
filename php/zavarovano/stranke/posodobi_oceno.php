<?php
	include('../skupno/navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}


	$idIzdelka = strip_tags(($_POST['idIzdelka']));
	$idIzdelka = stripslashes(($_POST['idIzdelka']));
	$idIzdelka = mysqli_real_escape_string($dbConnection, ($_POST['idIzdelka']));
	$idIzdelka = htmlspecialchars($idIzdelka);
	$ocena = strip_tags(($_POST['ocena']));
	$ocena = stripslashes(($_POST['ocena']));
	$ocena = mysqli_real_escape_string($dbConnection, ($_POST['ocena']));
	$ocena = htmlspecialchars($ocena);
	
  $query = mysqli_prepare($dbConnection, "SELECT * FROM artikli WHERE idArtikla = ? LIMIT 1");
	mysqli_stmt_bind_param($query, 'i', $idIzdelka);
	mysqli_stmt_execute($query);
	$query = $query->get_result();
  $izdelek = mysqli_fetch_array($query);

  $novoStOcen = $izdelek['stOcen'] + 1;
  $novSestevekOcen = $izdelek['sestevekOcen'] + $ocena;


  $query = mysqli_prepare($dbConnection, "UPDATE artikli SET sestevekOcen = ?, stOcen = ? WHERE idArtikla = ?");
	mysqli_stmt_bind_param($query, 'iii', $novSestevekOcen, $novoStOcen, $idIzdelka);
	mysqli_stmt_execute($query);
	$query = $query->get_result();


	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
