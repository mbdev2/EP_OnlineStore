<?php
	include('navigacija.php');

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}

	$idProdajalca = $_POST['idProdajalca'];
	$trenutniProdajalecQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM prodajalci WHERE idProdajalca = '$idProdajalca'");
	$trenutniProdajalec = mysqli_fetch_array($trenutniProdajalecQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>Spletna prodajalna - administrator - uredi prodajalca</title>
	</head>

	<body>
		<?php
			echo $navigacijaAdmin;
		?>

		<div>
			<h3>Urejanje prodajalca</h3>
			
			<form action="urediProdajalcaIzvedba.php" method="post">
				<div>
					<input type="text" id="idProdajalca" name="idProdajalca" value="<?php echo $trenutniProdajalec['idProdajalca'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
				</div>
				<div>
					<label for="uporabniskoIme">
						Uporabniško ime:
					</label>
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" value="<?php echo  $trenutniProdajalec['elektronskiNaslov'] ?>" size=30 required>
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
					<input type="checkbox" id="aktivnost" name="aktivnost" <?php if ($trenutniProdajalec['aktivnost'] == 1) { echo "checked"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>