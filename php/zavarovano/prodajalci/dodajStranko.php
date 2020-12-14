<?php
	include('../admin/navigacija.php');

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - dodaj stranko</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div class="container">
			<h3>Dodajanje stranke</h3>
			
			<form action="dodajStrankoIzvedba.php" method="post">
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
				<input type="submit" name="dodajStranko" value="Dodaj stranko">
			</form>
		</div>
	</body>
</html>