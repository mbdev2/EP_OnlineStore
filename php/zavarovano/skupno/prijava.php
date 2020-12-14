<?php
	include("../stranke/preverjanjePrijave.php");
?>

<html>
	<head>
		<title>eSHOP MMA - prijava</title>
	</head>

	<body>
		<a href="../gosti/domaca.php">
			Domača
		</a>

		<h3>Prijava za stranke</h3>

		<form action="../skupno/prijava.php" method="post">
			<div>
				<label for="emailUp">
					eMail naslov:
				</label>
				<input type="text" id="emailUp" name="emailUp" size=30 required>
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
