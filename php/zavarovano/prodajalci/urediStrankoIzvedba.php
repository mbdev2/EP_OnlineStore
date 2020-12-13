<?php
	include('../admin/navigacija.php');
	
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$id = $_POST['idStranke'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);
	if(isset($_POST['aktivnost'])) {
		$aktivnost = 1;
	} else {
		$aktivnost = 0;
	}

	if ($geslo1 != "" && $geslo1 == $geslo2) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, aktivnost = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'ssssssii', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $geslo1, $aktivnost, $id);
	} else if ($geslo1 != "" && $geslo1 != $geslo2) {
		echo "Gesli se ne ujemata!";
	} else if ($geslo1 == "" && $geslo2 == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, aktivnost = ? WHERE idStranke = ?");
		mysqli_stmt_bind_param($query, 'sssssii', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $aktivnost, $id);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamStrank.php");
?>