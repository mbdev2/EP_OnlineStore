<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);

	if ($geslo1 == $geslo2) {
		$query = mysqli_prepare($povezavaDoBaze, "INSERT prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, aktivnost=0");
		mysqli_stmt_bind_param($query, 'ssss', $ime, $priimek, $uporabniskoIme, $geslo1);
	} else if ($pass1 != $pass2) {
		echo "Gesli se ne ujemata!";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamProdajalcev.php");
?>