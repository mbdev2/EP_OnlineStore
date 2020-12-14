<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idProdajalec = $_SESSION['idProdajalec'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $emailUp, $password, $idProdajalec);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $emailUp, $idProdajalec);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>