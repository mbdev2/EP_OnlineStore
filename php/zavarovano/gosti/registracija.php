<?php
include('../skupno/navigacija.php');
?>

<html>

<head>
	<title>eSHOP MMA - registracija</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<script src="https://www.google.com/recaptcha/api.js?render=6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7"></script>
	<link href="../css/common.css" rel="stylesheet">
</head>

<body>
	<?php
	echo $navBarGost;
	?>
	<div class="container-fluid center-top">
		<div class="row">
			<div class="artikli-row" style="margin-top: 20px;">
				<h3>
					Registracija
				</h3>
			</div>
			<div class="artikli-row" style="margin-top: 20px;">

				<form id="registracijaStranke" action="registracijaIzvedba.php" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-4">
								Ime:
							</div>
							<div class="col-3">
								<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Priimek:
							</div>
							<div class="col-3">
								<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Domači naslov:
							</div>
							<div class="col-3">
								<input type="text" id="naslov" name="naslov" size=50 required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Telefonska številka:
							</div>
							<div class="col-3">
								<input type="number" id="telefonskaStevilka" name="telefonskaStevilka" required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								eMail naslov:
							</div>
							<div class="col-3">
								<input type="email" id="emailUp" name="emailUp" size=30 required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Geslo:
							</div>
							<div class="col-3">
								<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
							</div>

						</div>
						<div class="row">
							<div class="col-4">
								Ponovi geslo:
							</div>
							<div class="col-3">
								<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
							</div>

						</div>

						<br>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<input type="submit" class="btn btn-primary" name="registracija" value="Pošlji registracijo">
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>

	<script>
		$('#registracijaStranke').submit(function(event) {
			event.preventDefault();
			var ime = $('#ime').val();
			var priimek = $('#priimek').val();
			var naslov = $('#naslov').val();
			var telefonskaStevilka = $('#telefonskaStevilka').val();
			var emailUp = $('#emailUp').val();
			var password = $('#password').val();
			var passwordCheck = $('#passwordCheck').val();

			grecaptcha.ready(function() {
				grecaptcha.execute('6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7', {
					action: 'izvedi_resgitracijo'
				}).then(function(token) {
					$('#registracijaStranke').prepend('<input type="hidden" name="token" value="' + token + '">');
					$('#registracijaStranke').prepend('<input type="hidden" name="action" value="izvedi_resgitracijo">');
					$('#registracijaStranke').unbind('submit').submit();
				});;
			});
		});
	</script>

</body>

</html>