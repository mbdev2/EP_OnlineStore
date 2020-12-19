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
</head>

<body>
	<?php
	echo $navBarStranke;
	?>
	<div class="container-fluid zakljucek-nakupa">
		<div class="row artikli-row">
			<div class="artikli-zakljucek">
				<?php
				if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
					foreach ($_SESSION['kosarica'] as $curOrdeItem) {
				?>
						<div class="artikel-zakljucek">
							<h4 style="margin-bottom:20px;">
								<?php
								$idIzdelkaVKosarici = $curOrdeItem['idIzdelka'];
								$itemInCartQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelkaVKosarici' LIMIT 1");
								$itemInCart = mysqli_fetch_array($itemInCartQuery, MYSQLI_ASSOC);
								echo $itemInCart['ime'];
								?>
							</h4>
							<p>
								Količina:
								<?php
								$kolicinaTrenutnegaIzdelka = $curOrdeItem['kolicina'];
								echo "$kolicinaTrenutnegaIzdelka";
								?>
							</p>
							<p>
								Cena na kos:
								<?php
								echo $itemInCart['cena'] . "€";
								?>
							</p>
							<p style="font-weight: bold; margin:0">
								Znesek:
								<?php
								echo $itemInCart['cena'] * $kolicinaTrenutnegaIzdelka . "€";
								$skupniZnesek = $skupniZnesek + $itemInCart['cena'] * $kolicinaTrenutnegaIzdelka;
								$idTrenutnegaIzdelkaVKosarici = $curOrdeItem['idIzdelka'];
								$naroceniIzdelki[$idTrenutnegaIzdelkaVKosarici] = $curOrdeItem['kolicina'];
								?>
							</p>
							<br>
						</div>

					<?php
					}
					?>
			</div>
			<div class="zakljucek-skupaj">
				<div class="row">
					<h3 class="artikli-row">
						SKUPNI ZNESEK:
						<?php
						echo $skupniZnesek . "€";
						$_SESSION['naroceniIzdelki'] = $naroceniIzdelki;
						?>
					</h3>
					<div class="artikli-row">
						<form method="post" action="potrdiloNakupa.php">
							<input type="hidden" name="idStranke" value="<?php echo $_SESSION['idStranka']; ?>">
							<input type="hidden" name="skupniZnesek" value="<?php echo $skupniZnesek; ?>">
							<input type="submit" class="btn btn-primary" name="potrdiloNakupa" value="Potrjujem nakup!">
						</form>
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