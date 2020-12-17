<?php
	include('navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../stranke/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);

	if ($password == $passwordCheck) {
		$query = mysqli_prepare($dbConnection, "INSERT prodajalci SET ime = ?, priimek = ?, eNaslov = ?, geslo = ?, activeOrNot=1");
		mysqli_stmt_bind_param($query, 'ssss', $ime, $priimek, $emailUp, $password);
	}
	else{
		echo "Gesli morata biti enaki!";
	}
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	header("Location: ../admin/seznamProdajalcev.php");
?>
