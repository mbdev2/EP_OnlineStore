<?php
include('../skupno/navigacija.php');
include('preverjanjeVloge.php');
if (!isset($_SESSION['idAdmin'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}

$idProdajalca = $_POST['idProdajalca'];
$trenutniProdajalecQuery = mysqli_query($dbConnection, "SELECT * FROM prodajalci WHERE idProdajalca = '$idProdajalca'");
$trenutniProdajalec = mysqli_fetch_array($trenutniProdajalecQuery, MYSQLI_ASSOC);
?>

<html>

<head>
	<title>eSHOP MMA - Uredi Prodajalca</title>
</head>

<body>
	<?php
	echo $navBarAdmin;
	?>
	<div class="container-fluid center-top">
		<div class="row">
			<div class="artikli-row" style="margin-top: 20px;">
				<h3>Urejanje prodajalca</h3>
			</div>
			<div class="artikli-row" style="margin-top: 20px;">

				<form action="urediProdajalcaIzvedba.php" method="post">
					<div class="form-group">
						<div class="row">
							<input type="text" id="idProdajalca" name="idProdajalca" value="<?php echo $trenutniProdajalec['idProdajalca'] ?>" hidden>
							<div class="col-5">
								Ime:
							</div>
							<div class="col-3">
								<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								Priimek:
							</div>
							<div class="col-3">
								<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								eMail naslov:
							</div>
							<div class="col-3">
								<input type="email" id="emailUp" name="emailUp" value="<?php echo  $trenutniProdajalec['eNaslov'] ?>" size=30 required>
							</div>
						</div>
						<div class="row">
							<div class="col-5">
								Geslo:
							</div>
							<div class="col-3">
								<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								Ponovi geslo:
							</div>
							<div class="col-3">
								<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
							</div>
						</div>

						<div class="row" style="margin-top:5px;">
							<div class="col-5">
								Aktivnost:
							</div>
							<div class="col-3">
								<input type="checkbox" id="activeOrNot" name="activeOrNot" <?php if ($trenutniProdajalec['activeOrNot'] == 1) {
																								echo "checked='checked'";
																							} ?>>
							</div>
						</div>
						<br>
						<div class="artikli-row" style="margin-bottom: 10px;">
						<input type="submit" name="shrani" value="Shrani spremembe">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>