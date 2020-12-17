<?php
	include('navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
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
		<div>
			<?php
				if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
					foreach($_SESSION['kosarica'] as $currenItemVKosarici) {
			?>
			<div>
				<div>
					<h3>
						<?php
							$idIzdelkaVKosarici = $currenItemVKosarici['idIzdelka'];
							$izdelekVKosariciQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelkaVKosarici' LIMIT 1");
							$izdelekVKosarici = mysqli_fetch_array($izdelekVKosariciQuery, MYSQLI_ASSOC);
							echo $izdelekVKosarici['ime'];
						?>
					</h3>
				</div>
				<div>
					<form method="post" action="spremembaVKosarici.php">
		    			<input type="hidden" name="idIzdelka" value="<?php echo $currenItemVKosarici['idIzdelka']; ?>">
		    			Količina:
		    			<input type="number" id="kolicina" name="kolicina" min="0" max="100" value=
		    				<?php
		    					$kolicinaTrenutnegaIzdelka = $currenItemVKosarici['kolicina'];
		    					echo "$kolicinaTrenutnegaIzdelka";
		    				?>
		    			>
		    			<input type='submit' id='posodobi' value='Posodobi količino'>
					</form>
				</div>
				<div>
					<p>
						Cena na kos:
						<?php
							echo $izdelekVKosarici['cena']."€";
						?>
					</p>
					<p style="font-weight: bold;">
						Znesek:
						<?php
							echo $izdelekVKosarici['cena']*$kolicinaTrenutnegaIzdelka."€";
							$skupniZnesek = $skupniZnesek + $izdelekVKosarici['cena']*$kolicinaTrenutnegaIzdelka;
						?>
					</p>
					<br>
				</div>
			</div>

			<?php
					}
			?>
					<div>
						<h3>
							SKUPNI ZNESEK:
							<?php
								echo $skupniZnesek."€";
							?>
						</h3>
						<form method="post" action="zakljucekNakupa.php">
			    			<input type="submit" name="zakljucekNakupa" value="Zaključek nakupa">
						</form>
					</div>
			<?php
				} else {
					echo "Košarica je prazna!";
				}
			?>
		</div>
	</body>
</html>
