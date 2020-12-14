<?php
	include('navigacija.php');
	
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$id = $_POST['idProdajalca'];
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);
	if(isset($_POST['activeOrNot'])) {
		$activeOrNot = 1;
	} else {
		$activeOrNot = 0;
	}

	if ($password != "" && $password == $passwordCheck) {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, geslo = ?, activeOrNot = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'ssssii', $ime, $priimek, $emailUp, $password, $activeOrNot, $id);
	} else if ($password != "" && $password != $passwordCheck) {
		echo "Gesli se ne ujemata!";
	} else if ($password == "" && $passwordCheck == "") {
		$query = mysqli_prepare($povezavaDoBaze, "UPDATE prodajalci SET ime = ?, priimek = ?, elektronskiNaslov = ?, activeOrNot = ? WHERE idProdajalca = ?");
		mysqli_stmt_bind_param($query, 'sssii', $ime, $priimek, $emailUp, $activeOrNot, $id);
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: seznamProdajalcev.php");
?>