<?php
	include('../stranke/navigacija.php');
?>

<html>
	<head>
		<title>eSHOP MMA</title>
		<script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7"></script>
	</head>
	<body>
		<?php
			echo $navBarGost;
		?>
		<div>
			<form id="registracijaStranke" action="registracijaIzvedba.php" method="post">
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
			</form>
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
            grecaptcha.execute('6LdtrgcaAAAAALIg8Em7TnQWhbhjB51ZYp1Gekj7', {action: 'izvedi_resgitracijo'}).then(function(token) {
                $('#registracijaStranke').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#registracijaStranke').prepend('<input type="hidden" name="action" value="izvedi_resgitracijo">');
                $('#registracijaStranke').unbind('submit').submit();
            });;
        });
  });
  </script>
	</body>
</html>
