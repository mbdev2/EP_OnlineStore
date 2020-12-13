<?php
	include("preverjanjePrijave.php");
?>

<html>
	<head>
		<title>Spletna prodajalna - prijava</title>
	</head>

	<body>
		<a href="../gosti/domaca.php">
			Domača
		</a>

		<h3>Prijava za stranke</h3>

		<form action="prijava.php" method="post">
			<div>
				<label for="uporabniskoIme">
					Uporabniško ime:
				</label>
				<input type="text" id="uporabniskoIme" name="uporabniskoIme" size=30 required>
			</div>
			<div>
				<label for="geslo">
					Geslo:
				</label>
				<input type="password" id="geslo" name="geslo" required>
			</div>
			<br>
			<input type="submit" name="prijava" value="Prijava">
			<br>
			<br>
			<a href="../gosti/registracija.php">
				Nov uporabnik?
			</a>
			<br>
			<a href="../gosti/domaca.php">
				Vstopi kot gost
			</a>
		</form>
	</body>

</html>
