<?php
include('../skupno/navigacija.php');
include('../admin/preverjanjeVloge.php');
$allOrders = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE orderStatus = 0 ORDER BY idNarocila DESC");
if (!isset($_SESSION['idProd'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA - Naročila</title>

</head>

<body>
	<?php
	echo $navBarProd;
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
						<div class="artikli-row" style="margin-bottom: 10px;">
							Skupen znesek:
							<?php
							echo $curOrder['znesek'] . "€";
							?>
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
			<div style="text-align: center">
				<a class="btn btn-outline-primary" href="arhivNarocil.php">
					Arhiv naročil
		</a>
			</div>
		</div>
	</div>
</body>

</html>
