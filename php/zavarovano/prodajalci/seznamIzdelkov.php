<?php
include('../skupno/navigacija.php');
$vsiIzdelki = mysqli_query($dbConnection, "SELECT * FROM artikli");
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
	<div class="container-fluid domaca">
		<div class="card-deck row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
			<?php
			while ($curItem = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)) {
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
						<div>

							<p class="price-tag">
								<i class="fas fa-tag"></i>
								Cena za kos:
								<?php
								echo $curItem['cena'] . "€";
								?>
							</p>
						</div>
						<div style="margin: auto;">
							<form method="post" action="urediIzdelek.php">
								<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla'] ?>">
								<input type="submit" class="btn btn-primary" value="Uredi">
							</form>
						</div>

					</div>
				</div>
			<?php
			}
			?>
			<div class="card artikel-card border-dark mb-3 card-cascade wider">
				<div style="text-align: center; margin: auto;">
					<a class="btn btn-primary btn-lg" href="dodajIzdelek.php">
						Dodaj izdelek
					</a>
				</div>
			</div>
		</div>

	</div>
</body>

</html>