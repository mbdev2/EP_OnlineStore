<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = strip_tags(($_POST['idStranke']));
	$id = stripslashes(($_POST['idStranke']));
	$id = mysqli_real_escape_string($dbConnection, ($_POST['idStranke']));
	$id = htmlspecialchars($id);
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

	if(isset($_POST['activeOrNot'])) {
		$activeOrNot = 1;
	} else {
		$activeOrNot = 0;
	}

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'ssssssii', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password, $activeOrNot, $id);
	}
	else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($dbConnection, "UPDATE stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, activeOrNot = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'sssssii', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $activeOrNot, $id);
	}
	else if ($password != "" && $password != $passwordCheck) {
		echo "<script>
			alert('Gesli se ne ujemata!');
			window.location.href='../prodajalci/seznamStrank.php';
		</script>";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: seznamStrank.php");
?>
