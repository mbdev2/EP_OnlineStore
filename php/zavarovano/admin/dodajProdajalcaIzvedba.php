<?php
	include('navigacija.php');

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "INSERT prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, activeOrNot=0");
		mysqli_stmt_bind_param($query, 'ssss', $ime, $priimek, $emailUp, $password);
	} else if ($pass1 != $pass2) {
		echo "Gesli se ne ujemata!";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: ../admin/seznamProdajalcev.php");
?>
