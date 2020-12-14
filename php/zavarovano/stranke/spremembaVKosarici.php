<?php
	include('navigacija.php');

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../skupno/prijava.php");
	}

	$idIzdelka = $_POST['idIzdelka'];
	$kolicina = $_POST['kolicina'];

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
