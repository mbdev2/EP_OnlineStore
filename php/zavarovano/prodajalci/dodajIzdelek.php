<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
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
		<div class="container">
			<h3>Vnos novega izdelka</h3>
			<form method="post" action="" enctype='multipart/form-data'>
				<input type='file' name='file' />
				<input type='submit' value='Save name' name='but_upload'>
			</form>
			<form action="dodajIzdelekIzvedba.php" method="post">
				<div>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" size="50" required>
				</div>
				<div>
					<label for="opis">
						Opis:
					</label>
					<textarea name="opis" id="opis" cols="70" rows="12" required></textarea>
				</div>
				<div>
					<label for="cena">
						Cena:
					</label>
					<input type="text" id="cena" name="cena" size="10" required>€
				</div>
				<br>
				<?php
				if(isset($_POST['but_upload'])){
					$name = $_FILES['file']['name'];
					$target_dir = "upload/";
					$target_file = $target_dir . basename($_FILES["file"]["name"]);
				  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				  $extensions_arr = array("jpg","jpeg","png","gif");
				  if( in_array($imageFileType,$extensions_arr) ){
						$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    				$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
						?>
						<input type="hidden" id="base64slika" name="base64slika" maxlength="5242880" value="<?php echo $image; ?>" required>
						<?php
					}
				}
				?>
				<input type="submit" name="dodaj" value="Dodaj izdelek">
			</form>
		</div>
	</body>
</html>

