<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "INSERT stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, aktivnost=0");
		mysqli_stmt_bind_param($query, 'ssssss', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $password);
	} else if ($pass1 != $pass2) {
		echo "Gesli se ne ujemata!";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamStrank.php");
?>