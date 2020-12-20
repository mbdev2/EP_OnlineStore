<?php
include("../admin/preverjanjeVloge.php");
include('navigacija.php');
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarPrijava;
	?>
	<div class="container-fluid narocila" style="width: 75%;">
		<div class="row">
			<div class="artikli-row" style="margin-bottom: 10px;">
				<h3>Welcome back to work! (administrator in prodajalci)</h3>
			</div>
			<div class="artikli-row" style="margin-bottom: 10px;">
				<form action="../skupno/prijavaOsebja.php" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-4">
								eMail naslov:
							</div>
							<div class="col-4">
								<input type="text" id="emailUp" name="emailUp" size=30 required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Geslo:
							</div>
							<div class="col-4">
								<input type="password" id="geslo" name="geslo" size=30 required>
							</div>

						</div>

						<br>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<input type="submit" class="btn btn-primary" name="prijava" value="Prijava">
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</body>

</html>