<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

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
	$password = md5($password);
	$passwordCheck = md5($passwordCheck);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "INSERT stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot=1");
		mysqli_stmt_bind_param($query, 'ssssis', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password);
	}
	else{
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../prodajalci/profil.php';
		</script>";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: seznamStrank.php");
?>
