<?php
include('../skupno/navigacija.php');
include('../admin/preverjanjeVloge.php');
$vsaObdelanaNarocila = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE orderStatus != 0 ORDER BY idNarocila DESC");
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
	<div class="container-fluid narocila">
		<div class="row artikli-row">

			<?php
			while ($curOrder = mysqli_fetch_array($vsaObdelanaNarocila, MYSQLI_ASSOC)) {
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
						<div class="artikli-row" style="margin-bottom: 10px;">
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
									} elseif ($curOrder['orderStatus'] == 3) {
										echo "Preklicano";
									}
									?>
								</span>
							</p>
						</div>
						<div class="artikli-row">
							<form method="post" action="obdelavaNarocila.php">
								<input type="hidden" name="idNarocila" value="<?php echo $curOrder['idNarocila']; ?>">
								<input type='submit' class="btn btn-primary" id='obdelavaNarocila' value='Obdelava naročila'>
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
