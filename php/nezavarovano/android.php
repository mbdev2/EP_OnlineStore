<?php
	include('navigacija.php');

	$allItems = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");

	while($currenItem = mysqli_fetch_array($allItems, MYSQLI_ASSOC)){
		echo $currenItem['ime']."NOV-ATRIBUT".$currenItem['opis']."NOV-ATRIBUT".$currenItem['cena']."NOV-IZDELEK";
	};
?>