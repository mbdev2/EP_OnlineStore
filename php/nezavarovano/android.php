
<?php
	include('konfiguracija.php');

	$allItems = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");

	$myArray = array();
	if ($allItems) {

    		while($row = $allItems->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    	}
	header('Content-Type: application/json');
    	echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
	}

$allItems->close();



?>
