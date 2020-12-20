<?php
	include('../skupno/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$opis = $_POST['opis'];
	$cena = $_POST['cena'];
	$base64slika = $_POST['base64slika'];

	$query = mysqli_prepare($dbConnection, "INSERT artikli SET ime = ?, opis = ?, cena = ?, slika1 = ?, activeOrNot=1");
	mysqli_stmt_bind_param($query, 'ssis', $ime, $opis, $cena, $base64slika);
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	$vsiIzdelki = mysqli_query($dbConnection, "SELECT * FROM artikli ORDER BY idArtikla DESC LIMIT 1");
	$curItem = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC);
	$id=$curItem['idArtikla'];
	echo $id;

	if(isset($_POST['base64slika2'])){
		$base64slika2 = $_POST['base64slika2'];
		$query = mysqli_prepare($dbConnection, "UPDATE artikli SET slika2=? WHERE idArtikla=?");
		mysqli_stmt_bind_param($query, 'si', $base64slika2, $id);
		mysqli_stmt_execute($query);
		$query = $query->get_result();
	}
	if(isset($_POST['base64slika3'])){
		$base64slika3 = $_POST['base64slika3'];
		$query = mysqli_prepare($dbConnection, "UPDATE artikli SET slika3=? WHERE idArtikla=?");
		mysqli_stmt_bind_param($query, 'si', $base64slika3, $id);
		mysqli_stmt_execute($query);
		$query = $query->get_result();
	}
	header("Location: seznamIzdelkov.php");
?>
