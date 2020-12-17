<?php
	include('navigacija.php');
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../stranke/prijavaOsebja.php");
	}

	$idProdajalca = $_POST['idProdajalca'];
	$trenutniProdajalecQuery = mysqli_query($dbConnection, "SELECT * FROM prodajalci WHERE idProdajalca = '$idProdajalca'");
	$trenutniProdajalec = mysqli_fetch_array($trenutniProdajalecQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>eSHOP MMA</title>
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
					<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
				</div>
				<div>
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" value="<?php echo  $trenutniProdajalec['eNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
				</div>
				<div>
					<label for="activeOrNot">
						Aktivnost:
					</label>
					<input type="checkbox" id="activeOrNot" name="activeOrNot" <?php if ($trenutniProdajalec['activeOrNot'] == 1) { echo "checked='checked'"; } ?> >
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>
