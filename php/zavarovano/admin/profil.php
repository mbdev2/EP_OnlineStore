<?php
	include('navigacija.php');
	$administrator = mysqli_query($dbConnection, "SELECT * FROM administrator");
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
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
		<div>
			<?php
				while($adminE = mysqli_fetch_array($administrator, MYSQLI_ASSOC)){
			?>
			<form action="../admin/profilIzvedba.php" method="post">
				<h3>Moj profil</h3>
				<div>
					<label for="name">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $adminE['ime'] ?>" required>
				</div>
				<div>
					<label for="priimek">
						Priimek:
					</label>
					<input type="text" id="priimek" name="priimek" pattern="[A-Za-zČčŠšŽžĆć]+" value="<?php echo $adminE['priimek'] ?>" required>
				</div>
				<div>
					<label for="emailUp">
						eMail naslov:
					</label>
					<input type="email" id="emailUp" name="emailUp" value="<?php echo $adminE['eNaslov'] ?>" size=30 required>
				</div>
				<div>
					<label for="password">
						Geslo:
					</label>
					<input type="password" id="password" name="password" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
				</div>
				<div>
					<label for="passwordCheck">
						Ponovi geslo:
					</label>
					<input type="password" id="passwordCheck" name="passwordCheck" placeholder="Geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mora biti dolgo vsaj 8 znakov, vsebovati vsaj eno malo in eno veliko črko ter vsaj eno številko">
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
