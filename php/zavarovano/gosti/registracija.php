<?php
	include('../stranke/navigacija.php');
?>

<html>
	<head>
		<title>eSHOP MMA</title>
		<script src="https://www.google.com/recaptcha/api.js?render=6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7"></script>
		<script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
	</head>
	<body>
		<?php
			echo $navBarGost;
		?>
		<div>
			<form action="registracijaIzvedba.php" method="post">
				<div>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+"  required>
				</div>
				<div>
					<label for="naslov">
						Domači naslov:
					</label>
					<input type="text" id="naslov" name="naslov" size=30 required>
				</div>
				<div>
					<label for="telefonskaStevilka">
						Telefonska številka:
					</label>
					<input type="text" id="telefonskaStevilka" name="telefonskaStevilka" required>
				</div>
				<div>
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko" required>
				</div>
				<br>
				<input type="submit" name="registracija" value="Pošlji registracijo">
				<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
			</form>
		</div>
	</body>
</html>
