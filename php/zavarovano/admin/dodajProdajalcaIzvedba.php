<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "INSERT prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, aktivnost=0");
		mysqli_stmt_bind_param($query, 'ssss', $ime, $priimek, $uporabniskoIme, $password);
	} else if ($pass1 != $pass2) {
		echo "Gesli se ne ujemata!";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamProdajalcev.php");
?>