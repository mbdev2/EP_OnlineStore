<?php
	include('../skupno/navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
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
	$emailUp = strip_tags(($_POST['emailUp']));
	$emailUp = stripslashes(($_POST['emailUp']));
	$emailUp = mysqli_real_escape_string($dbConnection, ($_POST['emailUp']));
	$emailUp = htmlspecialchars($emailUp);
	$password = md5($password);
	$passwordCheck = md5($passwordCheck);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "INSERT prodajalci SET ime = ?, priimek = ?, eNaslov = ?, geslo = ?, activeOrNot=1");
		mysqli_stmt_bind_param($query, 'ssss', $ime, $priimek, $emailUp, $password);
	}
	else{
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../admin/dodajProdajalca.php';
		</script>";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: ../admin/seznamProdajalcev.php");
