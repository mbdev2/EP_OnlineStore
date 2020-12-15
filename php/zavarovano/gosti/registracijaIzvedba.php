<?php
define("RECAPTCHA_V3_SECRET_KEY", '6LdtrgcaAAAAAIeL8R8DLbo8lVULvckFBIqBX-Ip');
include('../stranke/navigacija.php');

	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$telefonskaStevilka = $_POST['telefonskaStevilka'];
	$emailUp = $_POST['emailUp'];
	$password = md5($_POST['password']);
	$passwordCheck = md5($_POST['passwordCheck']);
	$token = $_POST['token'];
	$action = $_POST['action'];

	// call curl to POST request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	$arrResponse = json_decode($response, true);

	// verify the response
	if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
		$queryAction = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 's', $emailUp);
		mysqli_stmt_execute($queryAction);

		$queryAction = $queryAction->get_result();
		$curUser = mysqli_fetch_array($queryAction);

		if(!isset($curUser)){
			if ($password != "" && $password == $passwordCheck) {
				$registerUserQuery = mysqli_prepare($dbConnection, "INSERT stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, activeOrNot = 1");
				mysqli_stmt_bind_param($registerUserQuery, 'ssssss', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password);
				mysqli_stmt_execute($registerUserQuery);
				$registerUserQuery = $registerUserQuery->get_result();
				echo $registerUserQuery;
			}
			else{
				echo "Gesli mroata biti enaki";
			}
		}
		else{
			echo '<script>alert("Ta email je že v uporabi")</script>';
		}

		header("Location: ../skupno/prijava.php");
	}
	else {
	    echo '<script>alert("Ah ja, zakaj si robot?")</script>';
	    header("Location: ../gosti/registracija.php");
	}
?>
