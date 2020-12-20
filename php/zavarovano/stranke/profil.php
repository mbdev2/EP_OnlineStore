<?php
include('../skupno/navigacija.php');
$id = $_SESSION['idStranka'];
$stranka = mysqli_query($dbConnection, "SELECT * FROM stranke WHERE idStranke = '$id'");
include('preverjanjePrijave.php');
if (!isset($_SESSION['idStranka'])) {
	header("Location: ../stranke/prijava.php");
}
?>

<html>

<head>
	<title>eSHOP MMA - Profil</title>
</head>

<body>
	<?php
	echo $navBarStranke;
	?>
	<div class="container-fluid center-top">
		<?php
		while ($trenutnaStranka = mysqli_fetch_array($stranka, MYSQLI_ASSOC)) {
		?>
			<div class="row">
				<div class="artikli-row" style="margin-top: 20px;">
					<h3>Moj profil</h3>
				</div>
				<div class="artikli-row" style="margin-top: 20px;">

					<form action="profilIzvedba.php" method="post">
						<div class="form-group">
							<div class="row">
								<div class="col-5">
									Ime:
								</div>
								<div class="col-3">
									<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutnaStranka['ime'] ?>" required>
								</div>

							</div>
							<div class="row">
								<div class="col-5">
									Priimek:
								</div>
								<div class="col-3">
									<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $trenutnaStranka['priimek'] ?>" required>
								</div>

							</div>
							<div class="row">
								<div class="col-5">
									Domači naslov:
								</div>
								<div class="col-3">
									<input type="text" id="naslov" name="naslov" value="<?php echo $trenutnaStranka['naslov'] ?>" size=30 required>
								</div>

							</div>
							<div class="row">
								<div class="col-5">
									Telefonska številka:
								</div>
								<div class="col-3">
									<input type="text" id="telefonskaStevilka" name="telefonskaStevilka" value="<?php echo $trenutnaStranka['telefonskaStevilka'] ?>" required>
								</div>

							</div>
							<div class="row">
								<div class="col-5">
									eMail naslov:
								</div>
								<div class="col-3">
									<input type="email" id="emailUp" name="emailUp" value="<?php echo $trenutnaStranka['eNaslov'] ?>" size=30 required>
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

							<br>
							<div class="artikli-row" style="margin-bottom: 10px;">
								<input type="submit" name="shrani" value="Shrani spremembe">
							</div>

						</div>
					</form>

				</div>
			<?php
		}
			?>
			</div>

	</div>
</body>

</html>