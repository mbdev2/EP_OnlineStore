<?php
	include('../skupno/navigacija.php');
	$vsiIzdelki = mysqli_query($dbConnection, "SELECT * FROM artikli");
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarProd;
		?>
		<div>
			<?php
				while($curItem = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
			?>
			<div>
				<img src='<?php echo $curItem['slika1']; ?>' >
				<div>
					<h3>
						<?php
							echo $curItem['ime']
						?>
					</h3>
					<form method="post" action="urediIzdelek.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla'] ?>">
		    			<input type="submit" value="Uredi">
					</form>
				</div>
				<div>
					<?php
						echo $curItem['opis']
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $curItem['cena']."€"
						?>
					</p>
					<br>
				</div>
			</div>
			<?php
				}
			?>
			<div style="text-align: center">
				<a href="dodajIzdelek.php">
					Dodaj izdelek
				</a>
			</div>
		</div>
	</body>
</html>
