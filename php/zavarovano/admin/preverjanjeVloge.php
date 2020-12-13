<?php
	if(isset($_POST['prijava'])){
		include("konfiguracija.php");
		session_start();

		$uporabniskoIme = strip_tags(($_POST['uporabniskoIme']));
		$geslo = strip_tags(($_POST['geslo']));
		$uporabniskoIme = stripslashes(($_POST['uporabniskoIme']));
		$geslo = stripslashes(($_POST['geslo']));
		$uporabniskoIme = mysqli_real_escape_string($povezavaDoBaze, ($_POST['uporabniskoIme']));
		$geslo = mysqli_real_escape_string($povezavaDoBaze, ($_POST['geslo']));
		$uporabniskoIme = htmlspecialchars($uporabniskoIme);
		$geslo = htmlspecialchars($geslo);

		$preverbaQuery = mysqli_prepare($povezavaDoBaze, "SELECT * FROM prodajalci WHERE elektronskiNaslov = ? LIMIT 1");
		mysqli_stmt_bind_param($preverbaQuery, 's', $uporabniskoIme);
		mysqli_stmt_execute($preverbaQuery);
		$preverbaQuery = $preverbaQuery->get_result();

		$trenutniUporabnik = mysqli_fetch_array($preverbaQuery);
		$idUporabnika = $trenutniUporabnik['idProdajalca'];
		$gesloUporabnika = $trenutniUporabnik['geslo'];

		if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
			$_SESSION['idProdajalec'] = $idUporabnika;
			header("Location: ../prodajalci/seznamNarocil.php");
		} else {
			$preverbaQuery = mysqli_prepare($povezavaDoBaze, "SELECT * FROM administrator WHERE elektronskiNaslov = ? LIMIT 1");
			mysqli_stmt_bind_param($preverbaQuery, 's', $uporabniskoIme);
			mysqli_stmt_execute($preverbaQuery);
			
			$preverbaQuery = $preverbaQuery->get_result();
			$trenutniUporabnik = mysqli_fetch_array($preverbaQuery);
			$idUporabnika = $trenutniUporabnik['idAdministrator'];
			$gesloUporabnika = $trenutniUporabnik['geslo'];

			if(md5($geslo) == $gesloUporabnika) {
				$_SESSION['idAdministrator'] = $idUporabnika;
				header("Location: seznamProdajalcev.php");
			}
		}
	}
?>