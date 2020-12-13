<?php
	include('navigacija.php');
	$administrator = mysqli_query($povezavaDoBaze, "SELECT * FROM administrator");

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - administrator - moj profil</title>
	</head>

	<body>
		<?php
			echo $navigacijaAdmin;
		?>

		<div>
			<?php
				while($ediniAdministrator = mysqli_fetch_array($administrator, MYSQLI_ASSOC)){
			?>
			<form action="profilIzvedba.php" method="post">
				<h3>Moj profil</h3>
				<div>
					<label for="name">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" value="<?php echo $ediniAdministrator['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" value="<?php echo $ediniAdministrator['priimek'] ?>" required>
				</div>
				<div>
					<label for="uporabniskoIme">
						Uporabniško ime:
					</label>
					<input type="email" id="uporabniskoIme" name="uporabniskoIme" value="<?php echo $ediniAdministrator['elektronskiNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="geslo1">
						Geslo:
					</label>
					<input type="password" id="geslo1" name="geslo1">
				</div>
				<div>
					<label for="geslo2">
						Ponovi geslo:
					</label>
					<input type="password" id="geslo2" name="geslo2">
				</div>
				<br>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
			<?php
				}
			?> 
		</div>
	</body>
</html>