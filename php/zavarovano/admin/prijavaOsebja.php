<?php
	include("preverjanjeVloge.php");
?>

<html>
	<head>
		<title>Spletna prodajalna - prijava osebja</title>
	</head>

	<body>
		<a href="../gosti/domaca.php">
			Domača
		</a>

		<h3>Prijava za osebje (administrator in prodajalci)</h3>

		<form action="prijavaOsebja.php" method="post">
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
		</form>
	</body>

</html>