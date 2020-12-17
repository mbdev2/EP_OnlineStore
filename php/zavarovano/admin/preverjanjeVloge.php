<?php
	if(isset($_POST['prijava'])){
		include("../admin/konfiguracija.php");
		session_start();

		$emailUp = strip_tags(($_POST['emailUp']));
		$emailUp = stripslashes(($_POST['emailUp']));
		$emailUp = mysqli_real_escape_string($dbConnection, ($_POST['emailUp']));
		$emailUp = htmlspecialchars($emailUp);
		$geslo = strip_tags(($_POST['geslo']));
		$geslo = stripslashes(($_POST['geslo']));
		$geslo = mysqli_real_escape_string($dbConnection, ($_POST['geslo']));
		$geslo = htmlspecialchars($geslo);

		$queryAction = mysqli_prepare($dbConnection, "SELECT * FROM prodajalci WHERE eNaslov = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 's', $emailUp);
		mysqli_stmt_execute($queryAction);
		$queryAction = $queryAction->get_result();

		$curUser = mysqli_fetch_array($queryAction);
		if(isset($curUser)){
			$idUporabnika = $curUser['idProdajalca'];
			$gesloUporabnika = $curUser['geslo'];
			$mailUp = $curUser['eNaslov'];

			$client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_CERT");
			$cert_data = openssl_x509_parse($client_cert);
			$cert_email = $cert_data['subject']['emailAddress'];

			if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
				if($cert_email==$mailUp){
					$_SESSION['idProd'] = $idUporabnika;
					header("Location: ../prodajalci/seznamNarocil.php");
				}
				else{
					echo '<script>alert("Certifikat se ne ujema z uporabnikim emailom")</script>';
				}
			}
		}
		else{
			$queryAction = mysqli_prepare($dbConnection, "SELECT * FROM administrator WHERE eNaslov = ? LIMIT 1");
			mysqli_stmt_bind_param($queryAction, 's', $emailUp);
			mysqli_stmt_execute($queryAction);

			$queryAction = $queryAction->get_result();
			$curUser = mysqli_fetch_array($queryAction);

			if(!isset($curUser)){
				echo '<script>alert("Uporabnisko ime ali geslo ni pravilno")</script>';
			}
			else{
				$idUporabnika = $curUser['idAdmin'];
				$gesloUporabnika = $curUser['geslo'];
				$mailUp = $curUser['eNaslov'];

				$client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_CERT");
				$cert_data = openssl_x509_parse($client_cert);
				$cert_email = $cert_data['subject']['emailAddress'];

				if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
					if($cert_email==$mailUp){
						$_SESSION['idAdmin'] = $idUporabnika;
						header("Location: ../admin/seznamProdajalcev.php");
					}
					else{
						echo '<script>alert("Certifikat se ne ujema z uporabnikim emailom")</script>';
					}
				}
			}
		}
	}
?>
