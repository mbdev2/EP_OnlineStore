
<?php

	include('navigacija.php');
	if (isset($_GET["email"]) && isset($_GET["geslo"])) {
    	$email = $_GET["email"];
			$geslo = $_GET["geslo"];

			$query1 = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? LIMIT 1");
			mysqli_stmt_bind_param($query1, 's', $email);
			mysqli_stmt_execute($query1);
			$query1 = $query1->get_result();
			$curUser1 = mysqli_fetch_array($query1);
			$query2 = mysqli_prepare($dbConnection, "SELECT * FROM prodajalci WHERE eNaslov = ? LIMIT 1");
			mysqli_stmt_bind_param($query2, 's', $email);
			mysqli_stmt_execute($query2);
			$query2 = $query2->get_result();
			$curUser2 = mysqli_fetch_array($query2);
			$query3 = mysqli_prepare($dbConnection, "SELECT * FROM administrator WHERE eNaslov = ? LIMIT 1");
			mysqli_stmt_bind_param($query3, 's', $email);
			mysqli_stmt_execute($query3);
			$query3 = $query3->get_result();
			$curUser3 = mysqli_fetch_array($query3);

			if(!isset($curUser1) && !isset($curUser2) && !isset($curUser3)){
				header('Content-Type: application/json');
				echo json_encode("404", JSON_UNESCAPED_UNICODE);
			}
			if(isset($curUser1)){
				$idUporabnika = $curUser1['idStranke'];
				$gesloUporabnika = $curUser1['geslo'];
				if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
					header('Content-Type: application/json');
					echo json_encode($curUser1, JSON_UNESCAPED_UNICODE);
				}
			}
			elseif(isset($curUser2)){
				$idUporabnika = $curUser2['idProdajalca'];
				$gesloUporabnika = $curUser2['geslo'];
				if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
					header('Content-Type: application/json');
					echo json_encode($curUser2, JSON_UNESCAPED_UNICODE);
				}
			}
			elseif(isset($curUser3)){
				$idUporabnika = $curUser3['idAdmin'];
				$gesloUporabnika = $curUser3['geslo'];
				if($gesloUporabnika != NULL && md5($geslo) == $gesloUporabnika) {
					header('Content-Type: application/json');
					echo json_encode($curUser3, JSON_UNESCAPED_UNICODE);
				}
			}
	}
	else{
		header('Content-Type: application/json');
		echo json_encode("404", JSON_UNESCAPED_UNICODE);
	}

?>
