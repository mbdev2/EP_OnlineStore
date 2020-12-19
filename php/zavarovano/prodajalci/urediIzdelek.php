<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}

	$idIzdelka = $_POST['idIzdelka'];
	$currenItemQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelka'");
	$currenItem = mysqli_fetch_array($currenItemQuery, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarProd;
		?>
		<div>
			<h3>Urejanje izdelka</h3>
			<form method="post" action="" enctype='multipart/form-data'>
				<input type='file' name='file' />
				<input type='submit' value='Dodaj sliko 1' name='but_upload'>
			</form>
			<form method="post" action="" enctype='multipart/form-data'>
				<input type='file' name='file2' />
				<input type='submit' value='Dodaj sliko 2' name='but_upload2'>
			</form>
			<form method="post" action="" enctype='multipart/form-data'>
				<input type='file' name='file3' />
				<input type='submit' value='Dodaj sliko 3' name='but_upload3'>
			</form>
			<form action="urediIzdelekIzvedba.php" method="post">
				<div>
					<input type="text" id="idIzdelka" name="idIzdelka" value="<?php echo $currenItem['idArtikla'] ?>" hidden>
					<label for="ime">
						Ime:
					</label>
					<input type="text" id="ime" name="ime" size="50" value="<?php echo $currenItem['ime'] ?>" required>
				</div>
				<div>
					<label for="opis">
						Opis:
					</label>
					<textarea name="opis" id="opis" cols="70" rows="12" required><?php echo $currenItem['opis'] ?></textarea>
				</div>
				<div>
					<label for="cena">
						Cena:
					</label>
					<input type="text" id="cena" name="cena" size="10" value="<?php echo  $currenItem['cena'] ?>" required>€
				</div>
				<div>
					<label for="activeOrNot">
						Aktivnost:
					</label>
					<input type="checkbox" id="activeOrNot" name="activeOrNot" <?php if ($currenItem['activeOrNot'] == 1) { echo "checked='checked'";  } ?> >
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
						<input type="hidden" id="base64slika" name="base64slika" maxlength="5242880" value="<?php echo $image; ?>" >
						<?php
					}
				}
				?>
				<?php
				if(isset($_POST['but_upload2'])){
					$name = $_FILES['file2']['name'];
					$target_dir = "upload/";
					$target_file = $target_dir . basename($_FILES["file2"]["name"]);
				  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				  $extensions_arr = array("jpg","jpeg","png","gif");
				  if( in_array($imageFileType,$extensions_arr) ){
						$image_base64 = base64_encode(file_get_contents($_FILES['file2']['tmp_name']) );
    				$image2 = 'data:image/'.$imageFileType.';base64,'.$image_base64;
						?>
						<input type="hidden" id="base64slika2" name="base64slika2" maxlength="5242880" value="<?php echo $image2; ?>">
						<?php
					}
				}
				?>
				<?php
				if(isset($_POST['but_upload3'])){
					$name = $_FILES['file3']['name'];
					$target_dir = "upload/";
					$target_file = $target_dir . basename($_FILES["file3"]["name"]);
				  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				  $extensions_arr = array("jpg","jpeg","png","gif");
				  if( in_array($imageFileType,$extensions_arr) ){
						$image_base64 = base64_encode(file_get_contents($_FILES['file3']['tmp_name']) );
    				$image3 = 'data:image/'.$imageFileType.';base64,'.$image_base64;
						?>
						<input type="hidden" id="base64slika3" name="base64slika3" maxlength="5242880" value="<?php echo $image3; ?>">
						<?php
					}
				}
				?>
				<input type="submit" name="shrani" value="Shrani spremembe">
			</form>
		</div>
	</body>
</html>
