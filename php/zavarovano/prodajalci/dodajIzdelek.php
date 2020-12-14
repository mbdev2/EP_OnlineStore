<?php
	include('../admin/navigacija.php');

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - prodajalec - dodaj izdelek</title>
	</head>

	<body>
		<?php
			echo $navBarProd;
		?>

		<div class="container">
			<h3>Dodajanje izdelka</h3>

			<form action="dodajIzdelekIzvedba.php" method="post">
				<div>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" size="60" required>
				</div>
				<div>
					<label for="opis">
						Opis:
					</label>
					<textarea name="opis" id="opis" cols="60" rows="10" required></textarea>
				</div>
				<div>
					<label for="cena">
						Cena:
					</label>
					<input type="text" id="cena" name="cena" size="10" required>€
				</div>
				<br>
				<input type="submit" name="dodaj" value="Dodaj izdelek">
			</form>
		</div>
	</body>
</html>