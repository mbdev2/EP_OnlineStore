<?php
	include('navigacija.php');

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - administrator - dodaj prodajalca</title>
	</head>

	<body>
		<?php
			echo $navigacijaAdmin;
		?>

		<div class="container">
			<h3>Dodajanje prodajalca</h3>
			
			<form action="dodajProdajalcaIzvedba.php" method="post">
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
					<label for="uporabniskoIme">
						Uporabniško ime:
					</label>
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password" required>
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck" required>
				</div>
				<br>
				<input type="submit" name="dodajProdajalca" value="Dodaj prodajalca">
			</form>
		</div>
	</body>
</html>