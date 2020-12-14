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

		$preverbaQuery = mysqli_prepare($povezavaDoBaze, "SELECT * FROM stranke WHERE elektronskiNaslov = ? LIMIT 1");
		mysqli_stmt_bind_param($preverbaQuery, 's', $uporabniskoIme);
		mysqli_stmt_execute($preverbaQuery);
		$preverbaQuery = $preverbaQuery->get_result();
		$trenutnaStranka = mysqli_fetch_array($preverbaQuery);
		if(isset($trenutnaStranka)){
			$idStranke = $trenutnaStranka['idStranke'];
			$gesloBaza = $trenutnaStranka['geslo'];

			if(md5($geslo) == $gesloBaza){
				$_SESSION['idStranka'] = $idStranke;
				header("Location: domaca.php");
			}
		}
		else{
			echo '<script>alert("Uporabnisko ime ali geslo ni pravilno")</script>';
		}
	}
?>
