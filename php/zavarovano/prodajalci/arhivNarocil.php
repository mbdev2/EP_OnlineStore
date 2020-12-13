<?php
	include('../admin/navigacija.php');
	$vsaObdelanaNarocila = mysqli_query($povezavaDoBaze, "SELECT * FROM narocila WHERE potrjenost != 0 ORDER BY idNarocila DESC");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - arhiv naročil</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
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
								if ($trenutnoObdelanoNarocilo['potrjenost'] == 0) {
									echo "Oddano";
								} elseif ($trenutnoObdelanoNarocilo['potrjenost'] == 1) {
									echo "Potrjeno - " . $trenutnoObdelanoNarocilo['datumPotrditve'];
								} elseif ($trenutnoObdelanoNarocilo['potrjenost'] == 2) {
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