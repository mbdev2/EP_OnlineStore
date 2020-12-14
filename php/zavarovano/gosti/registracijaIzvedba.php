<?php
	include('../stranke/navigacija.php');

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$uporabniskoIme = $_POST['uporabniskoIme'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	$queryAction = mysqli_prepare($povezavaDoBaze, "SELECT * FROM stranke WHERE elektronskiNaslov = ? LIMIT 1");
	mysqli_stmt_bind_param($queryAction, 's', $uporabniskoIme);
	mysqli_stmt_execute($queryAction);
	$queryAction = $queryAction->get_result();
	$curUser = mysqli_fetch_array($queryAction);

	if(!isset($curUser)){
		if ($password != "" && $password == $passwordCheck) {
			$registerUserQuery = mysqli_prepare($povezavaDoBaze, "INSERT stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, aktivnost = 1");
			mysqli_stmt_bind_param($registerUserQuery, 'ssssss', $ime, $priimek, $uporabniskoIme, $naslov, $telefonskaStevilka, $password);
			mysqli_stmt_execute($registerUserQuery);
			$registerUserQuery = $registerUserQuery->get_result();
			echo $registerUserQuery;
		} else if ($password != "" && $password != $passwordCheck) {
			echo "Gesli se ne ujemata!";
		}
	} else{
		echo '<script>alert("Ta email je že v uporabi")</script>';
	}

	header("Location: ../stranke/prijava.php");
?>
