<?php
include('navigacija.php');
$allItems = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");
include('preverjanjePrijave.php');
if (!isset($_SESSION['idStranka'])) {
	header("Location: ../stranke/prijava.php");
}
?>

<html>

<head>
	<title>eSHOP MMA</title>
	<link href="../css/domaca.css" rel="stylesheet">
</head>

<body>
	<?php
	echo $navBarStranke;
	?>
	<div class="container-fluid domaca">
		<div class="card-deck row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
			<?php
			while ($curItem = mysqli_fetch_array($allItems, MYSQLI_ASSOC)) {
			?>


				<div class="card artikel-card border-dark mb-3">

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
						<form method="post" action="posodobi_oceno.php">
							<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla']; ?>">
							<select style="margin-left:25px; margin-top:15px;" id="ocena" name="ocena">
								<option value="1">1</option>
								<option value="2">2</option>
								<option selected="selected" value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<input type='submit' class='btn btn-secondary' value='Oceni izdelek'>
						</form>
						<div>
							<p class="price-tag">
								<i class="fas fa-tag"></i>
								Cena za kos:
								<?php
								echo $curItem['cena'] . "€";
								?>
							</p>
						</div>
						<form method="post" action="spremembaVKosarici.php">
							<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla']; ?>">
							<input type="number" id="kolicina" name="kolicina" min="0" max="100" value=<?php
																										$idTrenutnegaIzdelka = $curItem['idArtikla'];
																										if (isset($_SESSION['kosarica'][$idTrenutnegaIzdelka])) {
																											$kolicinaTrenutnegaIzdelka = $_SESSION['kosarica'][$idTrenutnegaIzdelka]['kolicina'];
																											echo "$kolicinaTrenutnegaIzdelka";
																										} else {
																											echo "1";
																										}
																										?>>
							<?php
							$idTrenutnegaIzdelka = $curItem['idArtikla'];
							if (isset($_SESSION['kosarica'][$idTrenutnegaIzdelka])) {
								$kolicinaTrenutnegaIzdelka = $_SESSION['kosarica'][$idTrenutnegaIzdelka]['kolicina'];
								echo "<input class='btn btn-dark' type='submit' id='posodobi' value='Posodobi količino'>";
							} else {
								echo "<input class='btn btn-dark' type='submit' value='Dodaj v košarico'>";
							}
							?>
						</form>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</body>

</html>