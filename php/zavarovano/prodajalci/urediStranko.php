<?php
	include('../admin/navigacija.php');

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$idStranke = $_POST['idStranke'];
	$trenutnaStrankaQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM stranke WHERE idStranke = '$idStranke'");
	$trenutnaStranka = mysqli_fetch_array($trenutnaStrankaQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - uredi stranko</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div>
			<h3>Urejanje stranke</h3>
			
			<form action="urediStrankoIzvedba.php" method="post">
				<div>
					<input type="text" id="idStranke" name="idStranke" value="<?php echo $trenutnaStranka['idStranke'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" value="<?php echo $trenutnaStranka['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" value="<?php echo $trenutnaStranka['priimek'] ?>" required>
				</div>
				<div>
					<label for="naslov">
						Domači naslov:
					</label>
					<input type="text" id="naslov" name="naslov" value="<?php echo $trenutnaStranka['naslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="telefonskaStevilka">
						Telefonska številka:
					</label>
					<input type="text" id="telefonskaStevilka" name="telefonskaStevilka" value="<?php echo $trenutnaStranka['telefonskaStevilka'] ?>" required>
				</div>
				<div>
					<label for="uporabniskoIme">
						Uporabniško ime:
					</label>
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" value="<?php echo  $trenutnaStranka['elektronskiNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="geslo1">
						Geslo:
					</label>
					<input type="password" id="geslo1" name="geslo1">
				</div>
				<div>
					<label for="geslo2">
						Ponovi geslo:
					</label>
					<input type="password" id="geslo2" name="geslo2">
				</div>
				<div>
					<label for="aktivnost">
						Aktivnost:
					</label>
					<input type="checkbox" id="aktivnost" name="aktivnost" <?php if ($trenutnaStranka['aktivnost'] == 1) { echo "checked"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>