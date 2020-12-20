<?php
include('../skupno/navigacija.php');
$idStranke = $_SESSION['idStranka'];
$allOrders = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE idStranke = '$idStranke' ORDER BY idNarocila DESC");
include('preverjanjePrijave.php');
if (!isset($_SESSION['idStranka'])) {
	header("Location: ../stranke/prijava.php");
}
?>

<html>

<head>
	<title>eSHOP MMA</title>
</head>

<body>
	<?php
	echo $navBarStranke;
	?>
	<div class="container-fluid narocila">
		<div>
			<?php
			if (mysqli_num_rows($allOrders) == 0) {
				echo "Seznam naročil je prazen!";
			};
			?>
		</div>
		<div class="row artikli-row">

			<?php
			while ($curOrder = mysqli_fetch_array($allOrders, MYSQLI_ASSOC)) {
			?>
				<div class="narocila-detail">
					<div class="row">
						<div class="artikli-row">
							<h3>
								<?php
								echo $curOrder['datumNarocila'];
								?>
							</h3>
						</div>
						<div class="artikli-row" style="margin-bottom: 5px;">
							Skupen znesek:
							<?php
							echo $curOrder['znesek'] . "€";
							?>
						</div>
						<div class="artikli-row">
							<p>
								Stanje naročila:
								<span style="font-weight: bold;">
									<?php
									if ($curOrder['orderStatus'] == 0) {
										echo "Oddano";
									} elseif ($curOrder['orderStatus'] == 1) {
										echo "Potrjeno - " . $curOrder['datumPotrditve'];
									} elseif ($curOrder['orderStatus'] == 2) {
										echo "Stornirano";
									}
									?>
								</span>
							</p>
						</div>
						<div class="artikli-row">
							<form method="post" action="podrobnostiNarocila.php">
								<input type="hidden" name="idNarocila" value="<?php echo $curOrder['idNarocila']; ?>">
								<input type='submit' class="btn btn-outline-primary" id='podrobnostiNarocila' value='Podrobnosti naročila'>
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