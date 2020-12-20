<?php
include('../skupno/navigacija.php');
include('../admin/preverjanjeVloge.php');
$id = $_SESSION['idProd'];
$prodajalec = mysqli_query($dbConnection, "SELECT * FROM prodajalci WHERE idProdajalca = '$id'");

if (!isset($_SESSION['idProd'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarProd;
	?>
	<div class="container-fluid top-center">
		<?php
		while ($trenutniProdajalec = mysqli_fetch_array($prodajalec, MYSQLI_ASSOC)) {
		?>
			<div class="row">
				<div class="artikli-row" style="margin-top: 20px;">
					<h3>Moj profil</h3>
				</div>
				<div class="artikli-row" style="margin-top: 20px;">

					<form action="profilIzvedba.php" method="post">
						<div class="form-group">
							<div class="row">
								<div class="col-4">
									Ime:
								</div>
								<div class="col-3">
									<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
								</div>

							</div>
							<div class="row">
								<div class="col-4">
									Priimek:
								</div>
								<div class="col-3">
									<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
								</div>

							</div>
							<div class="row">
								<div class="col-4">
									eMail naslov:
								</div>
								<div class="col-3">
									<input type="email" id="emailUp" name="emailUp" value="<?php echo $trenutniProdajalec['eNaslov'] ?>" size=30 required>
								</div>

							</div>
							<div class="row">
								<div class="col-4">
									Geslo:
								</div>
								<div class="col-3">
									<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
								</div>

							</div>
							<div class="row">
								<div class="col-4">
									Ponovi geslo:
								</div>
								<div class="col-3">
									<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
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
		<?php
		}
		?>
	</div>
</body>

</html>
