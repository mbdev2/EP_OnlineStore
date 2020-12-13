<?php
	include('../admin/navigacija.php');

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}

	$idIzdelka = $_POST['idIzdelka'];
	$trenutniIzdelekQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelka'");
	$trenutniIzdelek = mysqli_fetch_array($trenutniIzdelekQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - uredi izdelek</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div>
			<h3>Urejanje izdelka</h3>
			
			<form action="urediIzdelekIzvedba.php" method="post">
				<div>
					<input type="text" id="idIzdelka" name="idIzdelka" value="<?php echo $trenutniIzdelek['idArtikla'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" size="60" value="<?php echo $trenutniIzdelek['ime'] ?>" required>
				</div>
				<div>
					<label for="opis">
						Opis:
					</label>
					<textarea name="opis" id="opis" cols="60" rows="10" required><?php echo $trenutniIzdelek['opis'] ?></textarea>
				</div>
				<div>
					<label for="cena">
						Cena:
					</label>
					<input type="text" id="cena" name="cena" size="10" value="<?php echo  $trenutniIzdelek['cena'] ?>" required>€
				</div>
				<div>
					<label for="aktivnost">
						Aktivnost:
					</label>
					<input type="checkbox" id="aktivnost" name="aktivnost" <?php if ($trenutniIzdelek['aktivnost'] == 1) { echo "checked"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>