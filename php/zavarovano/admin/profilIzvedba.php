<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idAdministrator = 1;
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE administrator SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ? WHERE idAdministrator = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $uporabniskoIme, $password, $idAdministrator);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE administrator SET ime = ?, priimek = ?, elektronskiNaslov = ? WHERE idAdministrator = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $uporabniskoIme, $idAdministrator);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>