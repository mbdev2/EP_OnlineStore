<?php
	include("../admin/preverjanjeVloge.php");
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>

	<body>
		<a href="../gosti/domaca.php">
			Domača
		</a>
		<h3>Welcome back to work! (administrator in prodajalci)</h3>

		<form action="../stranke/prijavaOsebja.php" method="post">
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
