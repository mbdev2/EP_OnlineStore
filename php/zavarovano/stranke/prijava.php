<?php
include("../stranke/preverjanjePrijave.php");
include('../skupno/navigacija.php');
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarGost;
	?>
	<div class="container-fluid narocila">
		<div class="row">
			<div class="artikli-row" style="margin-bottom: 10px;">
				<h3>Prijava za stranke</h3>
			</div>
			<div class="artikli-row" style="margin-bottom: 10px;">
				<form action="../stranke/prijava.php" method="post">

					<div class="form-group">
						<div class="row">
							<div class="col-3">
								eMail naslov:
							</div>
							<div class="col-3">
								<input type="text" id="emailUp" style="width: 350px" name="emailUp" size=40 required>
							</div>

						</div>
						<div class="row">
							<div class="col-3">
								Geslo:
							</div>
							<div class="col-3">
								<input type="password" id="geslo" style="width: 350px" name="geslo" required>
							</div>

						</div>

						<br>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<input type="submit" class="btn btn-primary" name="prijava" value="Prijava">
						</div>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<a class="btn btn-outline-primary" href="../gosti/registracija.php">
								Nov uporabnik?
							</a>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</body>

</html>