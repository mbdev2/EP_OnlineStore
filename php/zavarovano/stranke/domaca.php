<?php
	include('navigacija.php');
	$vsiIzdelki = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE aktivnost = '1'");

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: prijava.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - stranka - domača</title>
	</head>

	<body>
		<?php
			echo $navigacijaStranka;
		?>

		<div>
			<?php
				while($trenutniIzdelek = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $trenutniIzdelek['ime'];
						?>
					</h3>
				</div>
				<div>
					<?php
						echo $trenutniIzdelek['opis'];
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $trenutniIzdelek['cena']."€";
						?>
					</p>
					<form method="post" action="spremembaVKosarici.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $trenutniIzdelek['idArtikla']; ?>">
		    			<input type="number" id="kolicina" name="kolicina" min="0" max="100" value=
		    				<?php
		    					$idTrenutnegaIzdelka = $trenutniIzdelek['idArtikla'];
		    					if (isset($_SESSION['kosarica'][$idTrenutnegaIzdelka])) {
		    						$kolicinaTrenutnegaIzdelka = $_SESSION['kosarica'][$idTrenutnegaIzdelka]['kolicina'];
		    						echo "$kolicinaTrenutnegaIzdelka";
		    					} else {
		    						echo "1";
		    					}
		    				?>
		    			>
		    			<?php
	    					$idTrenutnegaIzdelka = $trenutniIzdelek['idArtikla'];
	    					if (isset($_SESSION['kosarica'][$idTrenutnegaIzdelka])) {
	    						$kolicinaTrenutnegaIzdelka = $_SESSION['kosarica'][$idTrenutnegaIzdelka]['kolicina'];
	    						echo "<input type='submit' id='posodobi' value='Posodobi količino'>";
	    					} else {
	    						echo "<input type='submit' value='Dodaj v košarico'>";
	    					}
		    			?>
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