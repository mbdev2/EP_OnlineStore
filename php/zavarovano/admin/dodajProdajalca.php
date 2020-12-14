<?php
	include('navigacija.php');

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - administrator - dodaj prodajalca</title>
	</head>

	<body>
		<?php
			echo $navBarAdmin;
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
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" size=30 required>
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