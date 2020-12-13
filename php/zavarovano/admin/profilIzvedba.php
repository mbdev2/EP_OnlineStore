<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}

	$idAdministrator = 1;
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);

	if ($geslo1 != "" && $geslo1 == $geslo2) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE administrator SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ? WHERE idAdministrator = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $uporabniskoIme, $geslo1, $idAdministrator);
	} else if ($geslo1 != "" && $geslo1 != $geslo2) {
		echo "Gesli se ne ujemata!";
	} else if ($geslo1 == "" && $geslo2 == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE administrator SET ime = ?, priimek = ?, elektronskiNaslov = ? WHERE idAdministrator = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $uporabniskoIme, $idAdministrator);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>