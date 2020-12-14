<?php
	include('navigacija.php');
	$idStranke = $_SESSION['idStranka'];
	$vsaNarocilaStranke = mysqli_query($povezavaDoBaze, "SELECT * FROM narocila WHERE idStranke = '$idStranke' ORDER BY idNarocila DESC");

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../skupno/prijava.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - stranka - naročila</title>
	</head>

	<body>
		<?php
			echo $navBarStranke;
		?>
		<div>
			<?php 
				if (mysqli_num_rows($vsaNarocilaStranke) == 0) {
					echo "Seznam naročil je prazen!";
				};
			?>
		</div>
		<div>
		<div>
			<?php
				while($trenutnoNarociloStranke = mysqli_fetch_array($vsaNarocilaStranke, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $trenutnoNarociloStranke['datumNarocila'];
						?>
					</h3>
				</div>
				<div>
					Skupen znesek:
					<?php
						echo $trenutnoNarociloStranke['znesek']."€";
					?>
				</div>
				<div>
					<p>
						Stanje naročila:
						<span style="font-weight: bold;">
							<?php
								if ($trenutnoNarociloStranke['orderStatus'] == 0) {
									echo "Oddano";
								} elseif ($trenutnoNarociloStranke['orderStatus'] == 1) {
									echo "Potrjeno - " . $trenutnoNarociloStranke['datumPotrditve'];
								} elseif ($trenutnoNarociloStranke['orderStatus'] == 2) {
									echo "Stornirano";
								}
							?>
						</span>
					</p>
					<form method="post" action="podrobnostiNarocila.php">
		    			<input type="hidden" name="idNarocila" value="<?php echo $trenutnoNarociloStranke['idNarocila']; ?>">
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