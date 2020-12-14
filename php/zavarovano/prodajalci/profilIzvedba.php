<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$idProdajalec = $_SESSION['idProdajalec'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $uporabniskoIme, $password, $idProdajalec);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $uporabniskoIme, $idProdajalec);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>