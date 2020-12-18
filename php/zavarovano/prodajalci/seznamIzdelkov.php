<?php
	include('../admin/navigacija.php');
	$vsiIzdelki = mysqli_query($dbConnection, "SELECT * FROM artikli");
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
		<div>
			<?php
				while($curItem = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
					$nasID=$curItem['idArtikla'];
					$query = mysqli_prepare($dbConnection, "SELECT * FROM images WHERE idArtikla = ? LIMIT 1");
					mysqli_stmt_bind_param($query, 'i', $nasID);
					mysqli_stmt_execute($query);
					$query = $query->get_result();
					$curSlika = mysqli_fetch_array($query);
			?>
			<div>
				<?php if(isset($curSlika)){ ?>
		    <div class="gallery">
		    	<img src="data:image/jpg;charset=utf8mb4;base64,<?php echo base64_encode($curSlika['image']); ?>" />
		    </div>
				<div>
					<h3>
						<?php
							echo $curItem['ime']
						?>
					</h3>
					<form method="post" action="urediIzdelek.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla'] ?>">
		    			<input type="submit" value="Uredi">
					</form>
				</div>
				<div>
					<?php
						echo $curItem['opis']
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $curItem['cena']."€"
						?>
					</p>
					<br>
				</div>
			</div>
			<?php
				}
			?>
			<div style="text-align: center">
				<a href="dodajIzdelek.php">
					Dodaj izdelek
				</a>
			</div>
		</div>
	</body>
</html>
