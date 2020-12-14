<?php
	include('../stranke/navigacija.php');

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$geslo1 = md5($_POST['geslo1']);
	$geslo2 = md5($_POST['geslo2']);

	if ($geslo1 != "" && $geslo1 == $geslo2) {
		$registracijaQuery = mysqli_prepare($povezavaDoBaze, "INSERT stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, aktivnost = 1");
		mysqli_stmt_bind_param($registracijaQuery, 'ssssss', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $geslo1);
		mysqli_stmt_execute($registracijaQuery);
		$registracijaQuery = $registracijaQuery->get_result();
		echo $registracijaQuery;
	} else if ($geslo1 != "" && $geslo1 != $geslo2) {
		echo "Gesli se ne ujemata!";
	}

	header("Location: ../stranke/prijava.php");
?>
