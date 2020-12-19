<?php
include('navigacija.php');
include('preverjanjePrijave.php');
if (!isset($_SESSION['idStranka'])) {
	header("Location: ../stranke/prijava.php");
}
$skupniZnesek = 0;
?>

<html>

<head>
	<title>eSHOP MMA</title>
	<link href="../css/kosarica.css" rel="stylesheet">
</head>

<body>
	<?php
	echo $navBarStranke;
	?>
	<div class="container-fluid kosarica">
		<div class="row">

			<?php
			if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
				foreach ($_SESSION['kosarica'] as $currenItemVKosarici) {
			?>
					<div class="card kosarica-card">
						<div style="margin-bottom:10px;">
							<h4>
								<?php
								$idIzdelkaVKosarici = $currenItemVKosarici['idIzdelka'];
								$izdelekVKosariciQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelkaVKosarici' LIMIT 1");
								$izdelekVKosarici = mysqli_fetch_array($izdelekVKosariciQuery, MYSQLI_ASSOC);
								echo $izdelekVKosarici['ime'];
								?>
							</h4>
						</div>
						<div>
							<form method="post" action="spremembaVKosarici.php">
								<input type="hidden" name="idIzdelka" value="<?php echo $currenItemVKosarici['idIzdelka']; ?>">
								Količina:
								<input type="number" id="kolicina-kosarica" name="kolicina" min="0" max="100" value=<?php
																													$kolicinaTrenutnegaIzdelka = $currenItemVKosarici['kolicina'];
																													echo "$kolicinaTrenutnegaIzdelka";
																													?>>
								<input class="btn btn-secondary" type='submit' id='posodobi' value='Posodobi količino'>
							</form>
						</div>
						<div>
							<p>
								Cena na kos:
								<?php
								echo $izdelekVKosarici['cena'] . "€";
								?>
							</p>
							<p class="kosarica-znesek-text">
								Znesek:
								<?php
								echo $izdelekVKosarici['cena'] * $kolicinaTrenutnegaIzdelka . "€";
								$skupniZnesek = $skupniZnesek + $izdelekVKosarici['cena'] * $kolicinaTrenutnegaIzdelka;
								?>
							</p>
							<br>
						</div>
					</div>

				<?php
				}
				?>
				<div class="skupaj">
					<p class="skupaj-text">
						SKUPNI ZNESEK:
						<?php
						echo $skupniZnesek . "€";
						?>
					</p>
					<form method="post" action="zakljucekNakupa.php">
						<input type="submit" class="btn btn-primary" name="zakljucekNakupa" value="Zaključek nakupa">
					</form>
				</div>
			<?php
			} else {
			?> <div class="kosarica-prazna"> <?php
												echo "Košarica je prazna!";
											} ?>
				</div>
		</div>
	</div>
</body>

</html>