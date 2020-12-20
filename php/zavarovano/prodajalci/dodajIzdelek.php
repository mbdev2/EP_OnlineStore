<?php
include('../skupno/navigacija.php');
include('../admin/preverjanjeVloge.php');
if (!isset($_SESSION['idProd'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarProd;
	?>
	<div class="container-fluid top-center">
		<div class="urejanje-izdelka">
			<div>
				<h3>Vnos novega izdelka</h3>
				<br>
				<p>Izberite 1-3 slike</p>
				<form method="post" action="" enctype='multipart/form-data'>
					<input type='file' name='file' />
					<input type='file' name='file2' />
					<input type='file' name='file3' />
					<input type='submit' value="Dodaj slike" class="btn btn-secondary" name='but_upload'>
				</form>
				<div class="border-line"></div>
				<form action="dodajIzdelekIzvedba.php" method="post">
					<div style="margin-bottom:20px;">
						<p> Ime izdelka</p>
						<input type="text" id="ime" name="ime" size="50" required>
					</div>
					<div style="margin-bottom:20px;">
						<p> Opis izdelka</p>
						<textarea name="opis" id="opis" cols="70" rows="12" required></textarea>
					</div>
					<div style="margin-bottom:10px;">
						<label for="cena">
							Cena:
						</label>
						<input type="text" id="cena" name="cena" size="10" required>€
					</div>
					<br>
					<?php
					if (isset($_POST['but_upload'])) {
						$name = $_FILES['file']['name'];
						$target_dir = "upload/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						$extensions_arr = array("jpg", "jpeg", "png", "gif");
						if (in_array($imageFileType, $extensions_arr)) {
							$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
							$image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
					?>
							<input type="hidden" id="base64slika" name="base64slika" maxlength="5242880" value="<?php echo $image; ?>" required>
						<?php
						}
						$name2 = $_FILES['file2']['name'];
						$target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
						$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
						if (in_array($imageFileType2, $extensions_arr)) {
							$image_base642 = base64_encode(file_get_contents($_FILES['file2']['tmp_name']));
							$image2 = 'data:image/' . $imageFileType2 . ';base64,' . $image_base642;
						?>
							<input type="hidden" id="base64slika2" name="base64slika2" maxlength="5242880" value="<?php echo $image2; ?>">
						<?php
						}
						$name3 = $_FILES['file3']['name'];
						$target_file3 = $target_dir . basename($_FILES["file3"]["name"]);
						$imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
						if (in_array($imageFileType3, $extensions_arr)) {
							$image_base643 = base64_encode(file_get_contents($_FILES['file3']['tmp_name']));
							$image3 = 'data:image/' . $imageFileType3 . ';base64,' . $image_base643;
						?>
							<input type="hidden" id="base64slika3" name="base64slika3" maxlength="5242880" value="<?php echo $image3; ?>">
					<?php
						}
					}
					?>
					<input type="submit" class="btn btn-dark" name="dodaj" value="Dodaj izdelek">
				</form>
			</div>
		</div>
	</div>
</body>

</html>
