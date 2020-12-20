<?php
define("RECAPTCHA_V3_SECRET_KEY", '6LdtrgcaAAAAAIeL8R8DLbo8lVULvckFBIqBX-Ip');
include('../skupno/navigacija.php');

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
				$registerHash=md5(rand(0,1000)); //naredimo random hash za mail
				$registerUserQuery = mysqli_prepare($dbConnection, "INSERT stranke SET ime = ?, priimek = ?, eNaslov = ?, naslov = ?, telefonskaStevilka = ?, geslo = ?, registerHash = ?, activeOrNot = 0");
				mysqli_stmt_bind_param($registerUserQuery, 'sssssss', $ime, $priimek, $emailUp, $naslov, $telefonskaStevilka, $password, $registerHash);
				mysqli_stmt_execute($registerUserQuery);
				$registerUserQuery = $registerUserQuery->get_result();
				echo $registerUserQuery;

				// posljemo mail
				$curl = curl_init();

				curl_setopt_array($curl, [
				  CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"EPshopMMA\",\"email\":\"info@epshopmma.si\"},\"to\":[{\"email\":\"$emailUp\"}],\"replyTo\":{\"email\":\"info@epshopmma.si\"},\"textContent\":\"Hvala za registracijo! \\t\\t\\t\\tUporabniški račun je ustvarjen, po potrditvi preko spodnjega linka, se lahko prijaviš.  \\t\\t\\t\\tProsimo kliknite za aktivacijo: \\t\\t\\t\\thttps://localhost/stranke/verify.php?email=$emailUp&hash=$registerHash\",\"subject\":\"Potrdilo registracije\"}",
				  CURLOPT_HTTPHEADER => [
				    "Accept: application/json",
				    "Content-Type: application/json",
				    "api-key: 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"
				  ],
				]);

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}
			}
			else{
				echo "<script>
						alert('Gesli se morata ujemati!');
						window.location.href='../gosti/registracija.php';
					</script>";
			}
		}
		else{
			echo '<script>alert("Ta email je že v uporabi")</script>';
		}

		header("Location: ../gosti/uspesnaRegistracija.php");
	}
	else {
	    echo '<script>alert("Ah ja, zakaj si robot?")</script>';
	    header("Location: ../gosti/registracija.php");
	}
?>
