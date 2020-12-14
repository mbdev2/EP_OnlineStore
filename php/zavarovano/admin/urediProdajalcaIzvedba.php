<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = $_POST['idProdajalca'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);
	if(isset($_POST['aktivnost'])) {
		$aktivnost = 1;
	} else {
		$aktivnost = 0;
	}

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, aktivnost = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssii', $ime, $priimek, $uporabniskoIme, $password, $aktivnost, $id);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, aktivnost = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssii', $ime, $priimek, $uporabniskoIme, $aktivnost, $id);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamProdajalcev.php");
?>