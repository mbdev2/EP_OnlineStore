<?php
	include('../admin/navigacija.php');

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../admin/prijavaOsebja.php");
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
			echo $navigacijaProdajalec;
		?>

		<div>
			<div>
				<div>
					<h2>
						<?php
							echo $trenutnoPodrobnoNarocilo['datumNarocila'];
						?>
					</h2>
					<?php
						$idStranke = $trenutnoPodrobnoNarocilo['idStranke'];
						$trenutnaStrankaQuery = mysqli_query($povezavaDoBaze, "SELECT * FROM stranke WHERE idStranke = '$idStranke' LIMIT 1");
						$trenutnaStranka = mysqli_fetch_array($trenutnaStrankaQuery, MYSQLI_ASSOC);
						echo "Naročnik: " . $trenutnaStranka['ime'] . " " . $trenutnaStranka['priimek'] . ", " . $trenutnaStranka['naslov'] . " (" . $trenutnaStranka['elektronskiNaslov'] . " / " . $trenutnaStranka['telefonskaStevilka'] . ")";
					?>
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
				<div>
					<br>
					<p>
						Spremeni stanje naročila:
						<form action="obdelavaNarocilaIzvedba.php" method="post">
							<select name="potrjenost">
								<option value="1">Potrjeno</option>
								<option value="2">Stornirano</option>
								<option value="0">Oddano</option>
							</select>
							<input type="hidden" name="idNarocila" value="
								<?php
									echo $idNarocila;
								?>
							">
							<input type="submit" value="Shrani">
						</form>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>