<?php
	include('../stranke/navigacija.php');

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	$queryAction = mysqli_prepare($povezavaDoBaze, "SELECT * FROM stranke WHERE elektronskiNaslov = ? LIMIT 1");
	mysqli_stmt_bind_param($queryAction, 's', $emailUp);
	mysqli_stmt_execute($queryAction);
	$queryAction = $queryAction->get_result();
	$curUser = mysqli_fetch_array($queryAction);

	if(!isset($curUser)){
		if ($password != "" && $password == $passwordCheck) {
			$registerUserQuery = mysqli_prepare($povezavaDoBaze, "INSERT stranke SET ime = ?, priimek = ?, elektronskiNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot = 1");
			mysqli_stmt_bind_param($registerUserQuery, 'ssssss', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password);
			mysqli_stmt_execute($registerUserQuery);
			$registerUserQuery = $registerUserQuery->get_result();
			echo $registerUserQuery;
		} else if ($password != "" && $password != $passwordCheck) {
			echo "Gesli se ne ujemata!";
		}
	} else{
		echo '<script>alert("Ta email je že v uporabi")</script>';
	}

	header("Location: ../skupno/prijava.php");
?>
