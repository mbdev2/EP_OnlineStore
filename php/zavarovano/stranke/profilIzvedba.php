<?php
	include('navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}

	$_SESSION['kosarica'] = NULL;
	$idStranke = $_SESSION['idStranka'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'ssssssi', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password, $idStranke);
	}
	else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($dbConnection, "UPDATE stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'sssssi', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $idStranke);
	}
	else if ($password != "" && $password != $passwordCheck) {
		echo "Geslo mroa biti enako!";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: profil.php");
?>
