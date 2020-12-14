<?php
	include('../admin/navigacija.php');
	$vsiIzdelki = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - seznam izdelkov</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div>
			<?php
				while($trenutniIzdelek = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $trenutniIzdelek['ime']
						?>
					</h3>
					<form method="post" action="urediIzdelek.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $trenutniIzdelek['idArtikla'] ?>">
		    			<input type="submit" value="Uredi">
					</form>
				</div>
				<div>
					<?php
						echo $trenutniIzdelek['opis']
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $trenutniIzdelek['cena']."€"
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