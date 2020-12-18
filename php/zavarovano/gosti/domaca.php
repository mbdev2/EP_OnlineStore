<?php
	include('../stranke/navigacija.php');
	$allItems = mysqli_query($dbConnection, "SELECT * FROM artikli WHERE activeOrNot = '1'");
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarGost;
		?>
		<div>
			<?php
				while($curItem = mysqli_fetch_array($allItems, MYSQLI_ASSOC)){
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
					<br>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</body>
</html>
