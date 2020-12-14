<?php
	include('navigacija.php');
	
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../skupno/prijava.php");
	}

	$_SESSION['kosarica'] = NULL;
	$idStranke = $_SESSION['idStranka'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'ssssssi', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $password, $idStranke);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'sssssi', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $idStranke);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>