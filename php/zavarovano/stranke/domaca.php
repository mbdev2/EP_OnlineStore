<?php
	include('navigacija.php');
	$vsiIzdelki = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");
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
				while($curItem = mysqli_fetch_array($vsiIzdelki, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $curItem['ime'];
						?>
					</h3>
				</div>
				<div>
					<?php
						echo $curItem['opis'];
					?>
				</div>
				<div>
					</br>
					<?php	if($curItem['stOcen']==0){
							echo 'Izdelek se ni ocenjen';
						}
						else{				
							$ocena=round($curItem['sestevekOcen']/$curItem['stOcen'],1);
							echo 'Povprecna ocena: ';
							echo $ocena;
						}
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $curItem['cena']."€";
						?>
					</p>
					<form method="post" action="spremembaVKosarici.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $curItem['idArtikla']; ?>">
		    			<input type="number" id="kolicina" name="kolicina" min="0" max="100" value=
		    				<?php
		    					$idTrenutnegaIzdelka = $curItem['idArtikla'];
		    					if (isset($_SESSION['kosarica'][$idTrenutnegaIzdelka])) {
		    						$kolicinaTrenutnegaIzdelka = $_SESSION['kosarica'][$idTrenutnegaIzdelka]['kolicina'];
		    						echo "$kolicinaTrenutnegaIzdelka";
		    					} else {
		    						echo "1";
		    					}
		    				?>
		    			>
		    			<?php
	    					$idTrenutnegaIzdelka = $curItem['idArtikla'];
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
