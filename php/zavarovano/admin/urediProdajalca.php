<?php
	include('navigacija.php');

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idProdajalca = $_POST['idProdajalca'];
	$trenutniProdajalecQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM prodajalci WHERE idProdajalca = '$idProdajalca'");
	$trenutniProdajalec = mysqli_fetch_array($trenutniProdajalecQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>eSHOP MMA - administrator - uredi prodajalca</title>
	</head>

	<body>
		<?php
			echo $navBarAdmin;
		?>

		<div>
			<h3>Urejanje prodajalca</h3>
			
			<form action="urediProdajalcaIzvedba.php" method="post">
				<div>
					<input type="text" id="idProdajalca" name="idProdajalca" value="<?php echo $trenutniProdajalec['idProdajalca'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
				</div>
				<div>
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" value="<?php echo  $trenutniProdajalec['elektronskiNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password">
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck">
				</div>
				<div>
					<label for="activeOrNot">
						Aktivnost:
					</label>
					<input type="checkbox" id="activeOrNot" name="activeOrNot" <?php if ($trenutniProdajalec['activeOrNot'] == 1) { echo "checked"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>