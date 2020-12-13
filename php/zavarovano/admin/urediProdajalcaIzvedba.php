<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}

	$id = $_POST['idProdajalca'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);
	if(isset($_POST['aktivnost'])) {
		$aktivnost = 1;
	} else {
		$aktivnost = 0;
	}

	if ($geslo1 != "" && $geslo1 == $geslo2) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, aktivnost = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssii', $ime, $priimek, $uporabniskoIme, $geslo1, $aktivnost, $id);
	} else if ($geslo1 != "" && $geslo1 != $geslo2) {
		echo "Gesli se ne ujemata!";
	} else if ($geslo1 == "" && $geslo2 == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, aktivnost = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssii', $ime, $priimek, $uporabniskoIme, $aktivnost, $id);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamProdajalcev.php");
?>