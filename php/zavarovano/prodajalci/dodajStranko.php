<?php
include('../skupno/navigacija.php');
include('../admin/preverjanjeVloge.php');
if (!isset($_SESSION['idProd'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA - dodaj stranko</title>
</head>

<body>
	<?php
	echo $navBarProd;
	?>

	<div class="container-fluid center-top">
		<div class="row">
			<div class="artikli-row" style="margin-top: 20px;">
				<h3>Nova stranka</h3>
			</div>
			<div class="artikli-row" style="margin-top: 20px;">

				<form action="dodajStrankoIzvedba.php" method="post">
					<div class="form-group">
						<div class="row">
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
								Domači naslov:
							</div>
							<div class="col-3">
								<input type="text" id="naslov" name="naslov" size=30 required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								Telefonska številka:
							</div>
							<div class="col-3">
								<input type="text" id="telefonskaStevilka" name="telefonskaStevilka" required>
							</div>

						</div>
						<div class="row">
							<div class="col-5">
								eMail naslov:
							</div>
							<div class="col-3">
								<input type="email" id="emailUp" name="emailUp" size=30 required>
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
						<br>
						<div class="artikli-row" style="margin-bottom: 10px;">
						<input type="submit" name="dodajStranko" value="Dodaj stranko">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>