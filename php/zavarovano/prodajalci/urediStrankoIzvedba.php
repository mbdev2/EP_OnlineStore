<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = $_POST['idStranke'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);
	if(isset($_POST['activeOrNot'])) {
		$activeOrNot = 1;
	} else {
		$activeOrNot = 0;
	}

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'ssssssii', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password, $activeOrNot, $id);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, activeOrNot = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'sssssii', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $activeOrNot, $id);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamStrank.php");
?>