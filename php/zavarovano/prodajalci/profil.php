<?php
	include('../admin/navigacija.php');
	$id = $_SESSION['idProdajalec'];
	$prodajalec = mysqli_query($povezavaDoBaze, "SELECT * FROM prodajalci WHERE idProdajalca = '$id'");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - prodajalec - moj profil</title>
	</head>

	<body>
		<?php
			echo $navBarProd;
		?>

		<div>
			<?php
				while($trenutniProdajalec = mysqli_fetch_array($prodajalec, MYSQLI_ASSOC)){
			?>
			<form action="profilIzvedba.php" method="post">
				<h3>Moj profil</h3>
				<div>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" value="<?php echo $trenutniProdajalec['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" value="<?php echo $trenutniProdajalec['priimek'] ?>" required>
				</div>
				<div>
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" value="<?php echo $trenutniProdajalec['elektronskiNaslov'] ?>" size=30 required>
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
