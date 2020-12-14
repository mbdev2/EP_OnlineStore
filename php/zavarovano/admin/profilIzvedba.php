<?php
	include('navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idAdmin = 1;
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "UPDATE administrator SET ime = ?, priimek = ?, eNaslov = ?, geslo = ? WHERE idAdmin = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $emailUp, $password, $idAdmin);
	}
	else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($dbConnection, "UPDATE administrator SET ime = ?, priimek = ?, eNaslov = ? WHERE idAdmin = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $emailUp, $idAdmin);
	}
	else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli morata biti enaki";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: profil.php");
?>
