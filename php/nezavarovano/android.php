<?php
	include('navigacija.php');

	$vsiIzdelki = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE activeOrNot = '1'");

	while($trenutniIzdelek = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
		echo $trenutniIzdelek['ime']."NOV-ATRIBUT".$trenutniIzdelek['opis']."NOV-ATRIBUT".$trenutniIzdelek['cena']."NOV-IZDELEK";
	};
?>