<?php
	include('navigacija.php');
	$vsiIzdelki = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE aktivnost = '1'");
?>

<html>
	<head>
		<title>Spletna prodajalna - gost - domača</title>
	</head>

	<body>
		<?php
			echo $navigacijaGost;
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
					<br>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</body>
</html>