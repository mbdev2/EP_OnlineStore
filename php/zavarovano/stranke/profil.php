<?php
	include('navigacija.php');
	$id = $_SESSION['idStranka'];
	$stranka = mysqli_query($povezavaDoBaze, "SELECT * FROM stranke WHERE idStranke = '$id'");

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: prijava.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - stranka - moj profil</title>
	</head>

	<body>
		<?php
			echo $navigacijaStranka;
		?>

		<div>
			<?php
				while($trenutnaStranka = mysqli_fetch_array($stranka, MYSQLI_ASSOC)){
			?>
			<form action="profilIzvedba.php" method="post">
				<h3>Moj profil</h3>
				<div>
					<label for="name">
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
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" value="<?php echo $trenutnaStranka['elektronskiNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password">
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck">
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
			<?php
				}
			?> 
		</div>
	</body>
</html>