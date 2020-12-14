<?php
	include('navigacija.php');
	$administrator = mysqli_query($povezavaDoBaze, "SELECT * FROM administrator");

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - administrator - moj profil</title>
	</head>

	<body>
		<?php
			echo $navBarAdmin;
		?>

		<div>
			<?php
				while($ediniAdministrator = mysqli_fetch_array($administrator, MYSQLI_ASSOC)){
			?>
			<form action="../admin/profilIzvedba.php" method="post">
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
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" value="<?php echo $ediniAdministrator['elektronskiNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password">
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck">
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
