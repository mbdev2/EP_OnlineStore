<?php
	include('../admin/navigacija.php');
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../stranke/prijavaOsebja.php");
	}

	$idNarocila = $_POST['idNarocila'];
	$idNarocilaQuery = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE idNarocila = '$idNarocila'");

	while($edinoIzbrano = mysqli_fetch_array($idNarocilaQuery, MYSQLI_ASSOC)) {
		$trenutnoPodrobnoNarocilo = $edinoIzbrano;
	};

	$allItemsNarocilaQuery = mysqli_query($dbConnection, "SELECT * FROM naroceniIzdelki WHERE idNarocila = '$idNarocila'");
	$skupniZnesek = 0;
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarProd;
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
						$trenutnaStrankaQuery = mysqli_query($dbConnection, "SELECT * FROM stranke WHERE idStranke = '$idStranke' LIMIT 1");
						$trenutnaStranka = mysqli_fetch_array($trenutnaStrankaQuery, MYSQLI_ASSOC);
						echo "Naročnik: " . $trenutnaStranka['ime'] . " " . $trenutnaStranka['priimek'] . ", " . $trenutnaStranka['naslov'] . " (" . $trenutnaStranka['eNaslov'] . " / " . $trenutnaStranka['telefonskaStevilka'] . ")";
					?>
				</div>
				<div>
					<?php
						while($currenItemNarocila = mysqli_fetch_array($allItemsNarocilaQuery, MYSQLI_ASSOC)) {
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
				<div>
					<br>
					<p>
						Spremeni stanje naročila:
						<form action="obdelavaNarocilaIzvedba.php" method="post">
							<select name="orderStatus">
								<option value="1">Potrdi</option>
								<option value="2">Storniraj</option>
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
