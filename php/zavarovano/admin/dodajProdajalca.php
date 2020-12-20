<?php
include('../skupno/navigacija.php');
include('preverjanjeVloge.php');
if (!isset($_SESSION['idAdmin'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarAdmin;
	?>
	<div class="container-fluid center-top">
		<div class="row">
			<div class="artikli-row" style="margin-top: 20px;">
				<h3>Dodajanje novega prodajalca</h3>
			</div>
			<div class="artikli-row" style="margin-top: 20px;">

				<form action="dodajProdajalcaIzvedba.php" method="post">
					<div class="form-group">
						<div class="row">
							<input type="text" id="idProdajalca" name="idProdajalca" value="<?php echo $trenutniProdajalec['idProdajalca'] ?>" hidden>
							<div class="col-5">
								Ime:
							</div>
							<div class="col-3">
								<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								Priimek:
							</div>
							<div class="col-3">
								<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								eMail naslov:
							</div>
							<div class="col-3">
								<input type="email" id="emailUp" name="emailUp" size=25 placeholder="uporabnik@domena.si" required>
							</div>
						</div>
						<div class="row">
							<div class="col-5">
								Geslo:
							</div>
							<div class="col-3">
								<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								Ponovi geslo:
							</div>
							<div class="col-3">
								<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
							</div>
						</div>
					</div>
					<br>
					<div class="artikli-row" style="margin-bottom: 10px;">
						<input type="submit" name="dodajProdajalca" value="Dodaj prodajalca">
					</div>
			</div>
			</form>
		</div>
	</div>
</body>

</html>