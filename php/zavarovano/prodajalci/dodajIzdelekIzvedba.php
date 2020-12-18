<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$ime = $_POST['ime'];
	$opis = $_POST['opis'];
	$cena = $_POST['cena'];

	// vnos podatkov v bazo
	$query = mysqli_prepare($dbConnection, "INSERT INTO artikli SET ime = ?, opis = ?, cena = ?, activeOrNot=1");
	mysqli_stmt_bind_param($query, 'ssi', $ime, $opis, $cena);
	mysqli_stmt_execute($query);
	$query = $query->get_result();

	// dobi iD artikla
	$query = mysqli_prepare($dbConnection, "SELECT * FROM images WHERE id=(SELECT max(id) FROM images)");
	mysqli_stmt_execute($query);
	$query = $query->get_result();
	$curUser = mysqli_fetch_array($query);
	$idArt=$curUser['idArtikla'];

	if(!empty($_FILES["slika1"]["name"])) {
        $fileName = basename($_FILES["slika1"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif');
				if(in_array($fileType, $allowTypes)){
					$slika1 = $_FILES['slika1']['tmp_name'];
          $imgContent = addslashes(file_get_contents($slika1));
					$query = mysqli_prepare($dbConnection, "INSERT INTO images SET idArtikla = ?, image=?");
					mysqli_stmt_bind_param($query, 'ib', $idArt, $imgContent);
					mysqli_stmt_execute($query);
					$query = $query->get_result();
				}
				else {
					echo "Podpiramo samo jpg,png,jpeg,gif.";
				}
	}
	else{
		echo "Prosimo izberite sliko za upload";
	}

	header("Location: seznamIzdelkov.php");
?>
