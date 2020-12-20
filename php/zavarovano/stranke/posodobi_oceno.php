<?php
	include('../skupno/navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}


	$idIzdelka = $_POST['idIzdelka'];
	$ocena = $_POST['ocena'];

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
