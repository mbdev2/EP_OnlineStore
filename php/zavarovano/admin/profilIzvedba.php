<?php
	include('../skupno/navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idAdmin = 1;
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
	$password = md5($password);
	$passwordCheck = md5($passwordCheck);

	if (!empty($_POST['password']) && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE administrator SET ime = ?, priimek = ?, eNaslov = ?, geslo = ? WHERE idAdmin = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $emailUp, $password, $idAdmin);
	}
	else if (empty($_POST['password'])&& empty($_POST['passwordCheck'])) {
		$query = mysqli_prepare($dbConnection, "UPDATE administrator SET ime = ?, priimek = ?, eNaslov = ? WHERE idAdmin = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $emailUp, $idAdmin);
	}
	else if (!empty($_POST['password'])) {
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../admin/profil.php';
		</script>";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: profil.php");
?>
