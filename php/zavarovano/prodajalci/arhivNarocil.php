<?php
	include('../admin/navigacija.php');
	$vsaObdelanaNarocila = mysqli_query($povezavaDoBaze, "SELECT * FROM narocila WHERE orderStatus != 0 ORDER BY idNarocila DESC");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - prodajalec - arhiv naročil</title>
	</head>

	<body>
		<?php
			echo $navBarProd;
		?>

		<div>
			<?php
				while($trenutnoObdelanoNarocilo = mysqli_fetch_array($vsaObdelanaNarocila, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $trenutnoObdelanoNarocilo['datumNarocila'];
						?>
					</h3>
				</div>
				<div>
					<p>
						Skupen znesek:
						<?php
							echo $trenutnoObdelanoNarocilo['znesek']."€";
						?>
					</p>
					<p>
						Stanje naročila:
						<span style="font-weight: bold;">
							<?php
								if ($trenutnoObdelanoNarocilo['orderStatus'] == 0) {
									echo "Oddano";
								} elseif ($trenutnoObdelanoNarocilo['orderStatus'] == 1) {
									echo "Potrjeno - " . $trenutnoObdelanoNarocilo['datumPotrditve'];
								} elseif ($trenutnoObdelanoNarocilo['orderStatus'] == 2) {
									echo "Stornirano";
								}
							?>
						</span>
					</p>
				</div>
				<div>
					<form method="post" action="obdelavaNarocila.php">
		    			<input type="hidden" name="idNarocila" value="<?php echo $trenutnoObdelanoNarocilo['idNarocila']; ?>">
						<input type='submit' id='obdelavaNarocila' value='Obdelava naročila'>
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