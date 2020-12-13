<?php
	include('navigacija.php');

	include('preverjanjePrijave.php');
	if(!isset($_SESSION['idStranka'])){
		header("Location: prijava.php");
	}

	$idNarocila = $_POST['idNarocila'];
	$idNarocilaQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM narocila WHERE idNarocila = '$idNarocila'");
	while($edinoIzbrano = mysqli_fetch_array($idNarocilaQuery, MYSQLI_ASSOC)) {
		$trenutnoPodrobnoNarocilo = $edinoIzbrano;
	};

	$vsiIzdelkiNarocilaQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM naroceniIzdelki WHERE idNarocila = '$idNarocila'");

	$skupniZnesek = 0;
?>

<html>
	<head>
		<title>Spletna prodajalna - stranka - podrobnosti naročila</title>
	</head>

	<body>
		<?php
			echo $navigacijaStranka;
		?>

		<div>
			<div>
				<div>
					<h2>
						<?php
							echo $trenutnoPodrobnoNarocilo['datumNarocila'];
						?>
					</h2>
				</div>
				<div>
					<p>
						Stanje naročila:
						<span style="font-weight: bold;">
							<?php
								if ($trenutnoPodrobnoNarocilo['potrjenost'] == 0) {
									echo "Oddano";
								} elseif ($trenutnoPodrobnoNarocilo['potrjenost'] == 1) {
									echo "Potrjeno - " . $trenutnoPodrobnoNarocilo['datumPotrditve'];
								} elseif ($trenutnoPodrobnoNarocilo['potrjenost'] == 2) {
									echo "Stornirano";
								}
							?>
						</span>
					</p>
				</div>
				<div>
					<?php
						while($trenutniIzdelekNarocila = mysqli_fetch_array($vsiIzdelkiNarocilaQuery, MYSQLI_ASSOC)) {
					?>
					<br>
					<h3>
						<?php
							$idTrenutnegaIzdelkaNarocila = $trenutniIzdelekNarocila['idArtikla'];
							$trenutniIzdelekNarocilaQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE idArtikla = '$idTrenutnegaIzdelkaNarocila' LIMIT 1");
							$trenutniIzdelekNarocilaDirektno = mysqli_fetch_array($trenutniIzdelekNarocilaQuery, MYSQLI_ASSOC);
							echo $trenutniIzdelekNarocilaDirektno['ime'];
						?>
					</h3>
					<p>
					Količina:
						<?php
			    			$kolicinaTrenutnegaIzdelka = $trenutniIzdelekNarocila['kolicina'];
			    			echo "$kolicinaTrenutnegaIzdelka";
			    		?>
		    		</p>
		    		<p>
						Cena na kos:
						<?php
							echo $trenutniIzdelekNarocilaDirektno['cena']."€";
						?>
					</p>
					<p style="font-weight: bold;">
						Znesek:
						<?php
							echo $trenutniIzdelekNarocilaDirektno['cena']*$kolicinaTrenutnegaIzdelka."€";
							$skupniZnesek = $skupniZnesek + $trenutniIzdelekNarocilaDirektno['cena']*$kolicinaTrenutnegaIzdelka;
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