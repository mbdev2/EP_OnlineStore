<?php
	include('navigacija.php');
	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: ../stranke/prijava.php");
	}

	$idNarocila = $_POST['idNarocila'];
	$idNarocilaQuery = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE idNarocila = '$idNarocila'");
	while($chosen = mysqli_fetch_array($idNarocilaQuery, MYSQLI_ASSOC)) {
		$curOrder = $chosen;
	};
	$allOrderQuery = mysqli_query($dbConnection, "SELECT * FROM naroceniIzdelki WHERE idNarocila = '$idNarocila'");
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
			<div>
				<div>
					<h2>
						<?php
							echo $curOrder['datumNarocila'];
						?>
					</h2>
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
				</div>
				<div>
					<?php
						while($currenItemNarocila = mysqli_fetch_array($allOrderQuery, MYSQLI_ASSOC)) {
					?>
					<br>
					<h3>
						<?php
							$idTrenutnegaIzdelkaNarocila = $currenItemNarocila['idArtikla'];
							$currenItemNarocilaQuery = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE idArtikla = '$idTrenutnegaIzdelkaNarocila' LIMIT 1");
							$currenItemNarocilaDirektno = mysqli_fetch_array($currenItemNarocilaQuery, MYSQLI_ASSOC);
							echo $currenItemNarocilaDirektno['ime'];
						?>
					</h3>
					<p>
					Količina:
						<?php
			    			$kolicinaTrenutnegaIzdelka = $currenItemNarocila['kolicina'];
			    			echo "$kolicinaTrenutnegaIzdelka";
			    		?>
		    		</p>
		    		<p>
						Cena na kos:
						<?php
							echo $currenItemNarocilaDirektno['cena']."€";
						?>
					</p>
					<p style="font-weight: bold;">
						Znesek:
						<?php
							echo $currenItemNarocilaDirektno['cena']*$kolicinaTrenutnegaIzdelka."€";
							$skupniZnesek = $skupniZnesek + $currenItemNarocilaDirektno['cena']*$kolicinaTrenutnegaIzdelka;
						?>
					</p>
					<?php
						}
					?>
				</div>
				<div>
					<br>
					<h3>
						SKUPEN ZNESEK:
						<?php
							echo $skupniZnesek."€";
						?>
					</h3>
				</div>
			</div>
		</div>
	</body>
</html>
