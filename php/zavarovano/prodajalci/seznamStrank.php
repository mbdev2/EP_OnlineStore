<?php
	include('../admin/navigacija.php');
	$vseStranke = mysqli_query($povezavaDoBaze, "SELECT * FROM stranke");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - seznam strank</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div>
			<?php
				while($trenutnaStranka = mysqli_fetch_array($vseStranke, MYSQLI_ASSOC)){
			?>
			<div>
				<h3>
					<?php
						echo $trenutnaStranka['ime']
					?>
					<?php
						echo $trenutnaStranka['priimek']
					?>
				</h3>
				<form method="post" action="urediStranko.php">
		    		<input type="hidden" name="idStranke" value="<?php echo $trenutnaStranka['idStranke'] ?>">
		    		<input type="submit" value="Uredi">
				</form>
				<br>
			</div>
			<?php
				}
			?> 

			<div style="text-align: center">
				<a href="dodajStranko.php">
					Dodaj stranko
				</a>
			</div>
		</div>
	</body>
</html>