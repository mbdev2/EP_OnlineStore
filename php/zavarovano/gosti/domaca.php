<?php
include('../stranke/navigacija.php');
$allItems = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");
?>

<html>

<head>
	<title>eSHOP MMA</title>
	
</head>

<body>
	<?php
	echo $navBarGost;
	?>
	<div class="container-fluid domaca">
		<div class="card-deck row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
			<?php
			while ($curItem = mysqli_fetch_array($allItems, MYSQLI_ASSOC)) {
			?>


				<div class="card artikel-card border-dark mb-3 card-cascade wider">

					<img class="card-img-top" alt="slika izdelka" src='<?php echo $curItem['slika1']; ?>'>

					<div class="card-body">
						<div class="cardtitle">
							<h5 class="card-title"><?php
													echo $curItem['ime'];
													?></h5><br>
						</div>
						<div class="carddesc">
							<p class="card-text"><?php
													echo $curItem['opis'];
													?></p>
						</div>
					</div>

					<div class="card-footer">
						<div class="card-text">
							<i class="fas fa-star"></i>
							<?php if ($curItem['stOcen'] == 0) {
								echo 'Izdelek se ni ocenjen';
							} else {
								$ocena = round($curItem['sestevekOcen'] / $curItem['stOcen'], 1);
								echo 'Povprecna ocena: ';
								echo $ocena;
							}
							?>
						</div>
						<div>

							<p class="price-tag">
								<i class="fas fa-tag"></i>
								Cena za kos:
								<?php
								echo $curItem['cena'] . "€";
								?>
							</p>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>

	</div>


</body>

</html>