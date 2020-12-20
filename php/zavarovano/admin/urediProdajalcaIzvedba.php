<?php
	include('../skupno/navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = $_POST['idProdajalca'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

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

	if(isset($_POST['activeOrNot'])) {
		$activeOrNot = 1;
	} else {
		$activeOrNot = 0;
	}

	if (isset($_POST['password']) && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE prodajalci SET ime = ?, priimek = ?, eNaslov = ?, geslo = ?, activeOrNot = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssii', $ime, $priimek, $emailUp, $password, $activeOrNot, $id);
	}
	else if (!isset($_POST['password'])&& !isset($_POST['passwordCheck'])) {
		$query = mysqli_prepare($dbConnection, "UPDATE prodajalci SET ime = ?, priimek = ?, eNaslov = ?, activeOrNot = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssii', $ime, $priimek, $emailUp, $activeOrNot, $id);
	}
	else if ($password != "") {
		echo "<script>
			alert('Gesli se morata ujemati!');
			window.location.href='../admin/seznamProdajalcev.php';
		</script>";
	}


	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: seznamProdajalcev.php");
?>
