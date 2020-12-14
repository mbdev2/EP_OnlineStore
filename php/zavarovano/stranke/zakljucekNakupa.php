<?php
	include('navigacija.php');

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../skupno/prijava.php");
	}

	$skupniZnesek = 0;


?>

<html>
	<head>
		<title>eSHOP MMA - stranka - zaključek nakupa</title>
	</head>

	<body>
		<?php
			echo $navBarStranke;
		?>

		<div>
			<?php
				if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
					foreach($_SESSION['kosarica'] as $trenutniIzdelekVKosarici) {
			?>
			<div>
				<h3>
					<?php
						$idIzdelkaVKosarici = $trenutniIzdelekVKosarici['idIzdelka'];
						$izdelekVKosariciQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE idArtikla = '$idIzdelkaVKosarici' LIMIT 1");
						$izdelekVKosarici = mysqli_fetch_array($izdelekVKosariciQuery, MYSQLI_ASSOC);
						echo $izdelekVKosarici['ime'];
					?>
				</h3>
				<p>
				Količina:
					<?php
		    			$kolicinaTrenutnegaIzdelka = $trenutniIzdelekVKosarici['kolicina'];
		    			echo "$kolicinaTrenutnegaIzdelka";
		    		?>
	    		</p>
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
						$idTrenutnegaIzdelkaVKosarici = $trenutniIzdelekVKosarici['idIzdelka'];
						$naroceniIzdelki[$idTrenutnegaIzdelkaVKosarici] = $trenutniIzdelekVKosarici['kolicina'];
					?>
				</p>
				<br>
			</div>

			<?php
					}
			?>
					<div>
						<h3>
							SKUPNI ZNESEK:
							<?php
								echo $skupniZnesek."€";
								$_SESSION['naroceniIzdelki'] = $naroceniIzdelki;
							?>
						</h3>
						<form method="post" action="potrdiloNakupa.php">
							<input type="hidden" name="idStranke" value="<?php echo $_SESSION['idStranka']; ?>">
							<input type="hidden" name="skupniZnesek" value="<?php echo $skupniZnesek; ?>">
			    			<input type="submit" name="potrdiloNakupa" value="Potrjujem nakup!">
						</form>
					</div>
			<?php
				}
			?>
		</div>
	</body>
</html>