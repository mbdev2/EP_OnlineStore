<?php
	include('navigacija.php');
	$idStranke = $_SESSION['idStranka'];
	$allOrders = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE idStranke = '$idStranke' ORDER BY idNarocila DESC");
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
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
		<div>
			<?php
				if (mysqli_num_rows($allOrders) == 0) {
					echo "Seznam naročil je prazen!";
				};
			?>
		</div>
		<div>
		<div>
			<?php
				while($curOrder = mysqli_fetch_array($allOrders, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $curOrder['datumNarocila'];
						?>
					</h3>
				</div>
				<div>
					Skupen znesek:
					<?php
						echo $curOrder['znesek']."€";
					?>
				</div>
				<div>
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
					<form method="post" action="podrobnostiNarocila.php">
		    			<input type="hidden" name="idNarocila" value="<?php echo $curOrder['idNarocila']; ?>">
						<input type='submit' id='podrobnostiNarocila' value='Podrobnosti naročila'>
					</form>
					<br>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</body>
</html>
