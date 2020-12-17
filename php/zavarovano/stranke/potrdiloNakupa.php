<?php
	include('navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}

	$idStranke = $_POST['idStranke'];
	$datumNarocila = date('Y-m-d H:i:s');
	$znesek = $_POST['skupniZnesek'];
	$naroceniIzdelki = $_SESSION['naroceniIzdelki'];

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
