<?php
	include('navigacija.php');
	$vsiIzdelki = mysqli_query($povezavaDoBaze, "SELECT * FROM artikli WHERE activeOrNot = '1'");
?>

<html>
	<head>
		<title>eSHOP MMA - gost - domača</title>
	</head>

	<body>
		<?php
			echo $navBarGost;
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