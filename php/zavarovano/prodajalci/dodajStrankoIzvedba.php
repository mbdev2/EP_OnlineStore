<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../stranke/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "INSERT stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot=1");
		mysqli_stmt_bind_param($query, 'ssssss', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password);
	}
	else{
		echo "Gesli morata biti enaki!";
	}

	mysqli_stmt_execute($query);
	$query = $query->get_result();
	header("Location: seznamStrank.php");
?>
