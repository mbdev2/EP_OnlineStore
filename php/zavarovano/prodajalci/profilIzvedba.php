<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idProd = $_SESSION['idProd'];
	$ime = strip_tags(($_POST['ime']));
	$ime = stripslashes(($_POST['ime']));
	$ime = mysqli_real_escape_string($dbConnection, ($_POST['ime']));
	$ime = htmlspecialchars($ime);
	$priimek = strip_tags(($_POST['priimek']));
	$priimek = stripslashes(($_POST['priimek']));
	$priimek = mysqli_real_escape_string($dbConnection, ($_POST['priimek']));
	$priimek = htmlspecialchars($priimek);
	$emailUp = strip_tags(($_POST['emailUp']));
	$emailUp = stripslashes(($_POST['emailUp']));
	$emailUp = mysqli_real_escape_string($dbConnection, ($_POST['emailUp']));
	$emailUp = htmlspecialchars($emailUp);
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE prodajalci SET ime = ?, priimek = ?, eNaslov = ?, geslo = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $emailUp, $password, $idProd);
	}
	else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($dbConnection, "UPDATE prodajalci SET ime = ?, priimek = ?, eNaslov = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $emailUp, $idProd);
	}
	else if ($password != "" && $password != $passwordCheck) {
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../prodajalci/profil.php';
		</script>";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: profil.php");
?>
