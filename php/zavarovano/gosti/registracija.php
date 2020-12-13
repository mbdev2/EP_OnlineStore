<?php
	include('../stranke/navigacija.php');
?>

<html>
	<head>
		<title>Spletna prodajalna - gost - registracija</title>
	</head>

	<body>
		<?php
			echo $navigacijaGost;
		?>

		<div>
			<form action="registracijaIzvedba.php" method="post">
				<div>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" required>
				</div>
				<div>
					<label for="naslov">
						Domači naslov:
					</label>
					<input type="text" id="naslov" name="naslov" size=30 required>
				</div>
				<div>
					<label for="telefonskaStevilka">
						Telefonska številka:
					</label>
					<input type="text" id="telefonskaStevilka" name="telefonskaStevilka" required>
				</div>
				<div>
					<label for="uporabniskoIme">
						Uporabniško ime:
					</label>
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" size=30 required>
				</div>
				<div>
					<label for="geslo1">
						Geslo:
					</label>
					<input type="password" id="geslo1" name="geslo1" required>
				</div>
				<div>
					<label for="geslo2">
						Ponovi geslo:
					</label>
					<input type="password" id="geslo2" name="geslo2" required>
				</div>
				<br>
				<input type="submit" name="registracija" value="Pošlji registracijo">
			</form>
		</div>
	</body>
</html>