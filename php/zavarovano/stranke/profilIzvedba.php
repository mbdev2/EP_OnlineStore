<?php
	include('../skupno/navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}

	$_SESSION['kosarica'] = NULL;
	$idStranke = $_SESSION['idStranka'];
	$ime = strip_tags(($_POST['ime']));
	$ime = stripslashes(($_POST['ime']));
	$ime = mysqli_real_escape_string($dbConnection, ($_POST['ime']));
	$ime = htmlspecialchars($ime);
	$priimek = strip_tags(($_POST['priimek']));
	$priimek = stripslashes(($_POST['priimek']));
	$priimek = mysqli_real_escape_string($dbConnection, ($_POST['priimek']));
	$priimek = htmlspecialchars($priimek);
	$naslov = strip_tags(($_POST['naslov']));
	$naslov = stripslashes(($_POST['naslov']));
	$naslov = mysqli_real_escape_string($dbConnection, ($_POST['naslov']));
	$naslov = htmlspecialchars($naslov);
	$telefonskaStevilka = strip_tags(($_POST['telefonskaStevilka']));
	$telefonskaStevilka = stripslashes(($_POST['telefonskaStevilka']));
	$telefonskaStevilka = mysqli_real_escape_string($dbConnection, ($_POST['telefonskaStevilka']));
	$telefonskaStevilka = htmlspecialchars($telefonskaStevilka);
	$emailUp = strip_tags(($_POST['emailUp']));
	$emailUp = stripslashes(($_POST['emailUp']));
	$emailUp = mysqli_real_escape_string($dbConnection, ($_POST['emailUp']));
	$emailUp = htmlspecialchars($emailUp);
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
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../stranke/profil.php';
		</script>";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: profil.php");
