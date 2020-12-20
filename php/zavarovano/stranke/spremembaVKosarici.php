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
	$kolicina = strip_tags(($_POST['kolicina']));
	$kolicina = stripslashes(($_POST['kolicina']));
	$kolicina = mysqli_real_escape_string($dbConnection, ($_POST['kolicina']));
	$kolicina = htmlspecialchars($kolicina);

	if (isset($_SESSION['kosarica'][$idIzdelka]) && $kolicina != 0) {
		$_SESSION['kosarica'][$idIzdelka]['kolicina'] = $kolicina;
	}
	elseif (isset($_SESSION['kosarica'][$idIzdelka]) && $kolicina == 0) {
		unset($_SESSION['kosarica'][$idIzdelka]);
	}
	elseif (!isset($_SESSION['kosarica'][$idIzdelka]) && $kolicina != 0) {
		$_SESSION['kosarica'][$idIzdelka] = array(
			'idIzdelka' => $idIzdelka,
			'kolicina' => $kolicina
		);
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
