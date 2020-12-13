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
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);

	if ($geslo1 != "" && $geslo1 == $geslo2) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssi', $ime, $priimek, $uporabniskoIme, $geslo1, $idProdajalec);
	} else if ($geslo1 != "" && $geslo1 != $geslo2) {
		echo "Gesli se ne ujemata!";
	} else if ($geslo1 == "" && $geslo2 == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssi', $ime, $priimek, $uporabniskoIme, $idProdajalec);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: profil.php");
?>