
<?php

include('konfiguracija.php');

	if (isset($_GET["idArtikla"])) {
    	$id = $_GET["idArtikla"];
}

	$query = mysqli_prepare($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1' AND idArtikla=?");
	mysqli_stmt_bind_param($query, 'i', $id);
	mysqli_stmt_execute($query);
	$query = $query->get_result();
	$curItem = mysqli_fetch_array($query);
	header('Content-Type: application/json');
	echo json_encode($curItem, JSON_UNESCAPED_UNICODE);


?>
