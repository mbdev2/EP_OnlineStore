<?php
	include('../skupno/navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}

	$idStranke = strip_tags(($_POST['idStranke']));
	$idStranke = stripslashes(($_POST['idStranke']));
	$idStranke = mysqli_real_escape_string($dbConnection, ($_POST['idStranke']));
	$idStranke = htmlspecialchars($idStranke);
	$datumNarocila = date('Y-m-d H:i:s');
	$znesek = strip_tags(($_POST['znesek']));
	$znesek = stripslashes(($_POST['znesek']));
	$znesek = mysqli_real_escape_string($dbConnection, ($_POST['znesek']));
	$znesek = htmlspecialchars($znesek);
	$naroceniIzdelki = strip_tags(($_POST['naroceniIzdelki']));
	$naroceniIzdelki = stripslashes(($_POST['naroceniIzdelki']));
	$naroceniIzdelki = mysqli_real_escape_string($dbConnection, ($_POST['naroceniIzdelki']));
	$naroceniIzdelki = htmlspecialchars($naroceniIzdelki);
	
	$narociloQuery = mysqli_prepare($dbConnection, "INSERT narocila SET idStranke = ?, datumNarocila = ?, znesek = ?, orderStatus = 0");
	mysqli_stmt_bind_param($narociloQuery, 'isd', $idStranke, $datumNarocila, $znesek);
	mysqli_stmt_execute($narociloQuery);
	$narociloQuery = $narociloQuery->get_result();

	$idNarocilaQuery = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE idStranke = '$idStranke' AND datumNarocila = '$datumNarocila'AND znesek = '$znesek'");
	while($edinoIzbrano = mysqli_fetch_array($idNarocilaQuery, MYSQLI_ASSOC)) {
		$idNarocila = $edinoIzbrano['idNarocila'];
	};

	foreach ($naroceniIzdelki as $idArtikla=>$kolicina) {
		$trenutniNaroceniIzdelekQuery = mysqli_prepare($dbConnection, "INSERT naroceniIzdelki SET idNarocila = ?, idArtikla = ?, kolicina = ?");
		mysqli_stmt_bind_param($trenutniNaroceniIzdelekQuery, 'iii', $idNarocila, $idArtikla, $kolicina);
		mysqli_stmt_execute($trenutniNaroceniIzdelekQuery);
		$trenutniNaroceniIzdelekQuery = $trenutniNaroceniIzdelekQuery->get_result();
	};

	$_SESSION['naroceniIzdelki'] = NULL;
	$_SESSION['kosarica'] = NULL;
	header("Location: seznamNarocil.php");
?>
