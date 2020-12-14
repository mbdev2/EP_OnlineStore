<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idIzdelka = $_POST['idIzdelka'];
	$currenItemQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelka'");
	$currenItem = mysqli_fetch_array($currenItemQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarProd;
		?>
		<div>
			<h3>Urejanje izdelka</h3>
			<form action="urediIzdelekIzvedba.php" method="post">
				<div>
					<input type="text" id="idIzdelka" name="idIzdelka" value="<?php echo $currenItem['idArtikla'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" size="50" value="<?php echo $currenItem['ime'] ?>" required>
				</div>
				<div>
					<label for="opis">
						Opis:
					</label>
					<textarea name="opis" id="opis" cols="70" rows="12" required><?php echo $currenItem['opis'] ?></textarea>
				</div>
				<div>
					<label for="cena">
						Cena:
					</label>
					<input type="text" id="cena" name="cena" size="10" value="<?php echo  $currenItem['cena'] ?>" required>€
				</div>
				<div>
					<label for="activeOrNot">
						Aktivnost:
					</label>
					<input type="checkbox" id="activeOrNot" name="activeOrNot" <?php if ($currenItem['activeOrNot'] == 1) { echo "checked"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>
