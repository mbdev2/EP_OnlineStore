<?php
	include("../admin/preverjanjeVloge.php");
?>

<html>
	<head>
		<title>eSHOP MMA - prijava osebja</title>
	</head>

	<body>
		<a href="../gosti/domaca.php">
			Domača
		</a>

		<h3>Prijava za osebje (administrator in prodajalci)</h3>

		<form action="../skupno/prijavaOsebja.php" method="post">
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
		</form>
	</body>

</html>
