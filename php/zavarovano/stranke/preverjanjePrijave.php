<?php
	if(isset($_POST['prijava'])){
		include("../stranke/konfiguracija.php");
		session_start();

		$emailUp = strip_tags(($_POST['emailUp']));
		$geslo = strip_tags(($_POST['geslo']));
		$emailUp = stripslashes(($_POST['emailUp']));
		$geslo = stripslashes(($_POST['geslo']));
		$emailUp = mysqli_real_escape_string($dbConnection, ($_POST['emailUp']));
		$geslo = mysqli_real_escape_string($dbConnection, ($_POST['geslo']));
		$emailUp = htmlspecialchars($emailUp);
		$geslo = htmlspecialchars($geslo);

		$queryAction = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 's', $emailUp);
		mysqli_stmt_execute($queryAction);
		$queryAction = $queryAction->get_result();
		$trenutnaStranka = mysqli_fetch_array($queryAction);

		if(isset($trenutnaStranka)){
			if($trenutnaStranka['activeOrNot']==1){
				$idStranke = $trenutnaStranka['idStranke'];
				$gesloBaza = $trenutnaStranka['geslo'];
				if(md5($geslo) == $gesloBaza){
					$_SESSION['idStranka'] = $idStranke;
					header("Location: ../stranke/domaca.php");
				}
			}
			else{
				echo '<script>alert("Uporabnisko ime ali geslo ni pravilno")</script>';
			}
		}
		else{
			echo '<script>alert("Uporabnisko ime ali geslo ni pravilno")</script>';
		}
	}
?>
