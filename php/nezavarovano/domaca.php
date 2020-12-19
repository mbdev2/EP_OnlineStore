<?php
	include('navigacija.php');
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
				while($currenItem = mysqli_fetch_array($allItems, MYSQLI_ASSOC)){
			?>
			<div>
				<img src='<?php echo $currenItem['slika1']; ?>' >
				<div>
					<h3>
						<?php
							echo $currenItem['ime'];
						?>
					</h3>
				</div>
				<div>
					<?php
						echo $currenItem['opis'];
					?>
				</div>
				<div>
					</br>
					<?php	if($currenItem['stOcen']==0){
							echo 'Izdelek se ni ocenjen';
						}
						else{
							$ocena=round($currenItem['sestevekOcen']/$currenItem['stOcen'],1);
							echo 'Povprecna ocena: ';
							echo $ocena;
						}
					?>
				</div>
				<div>
					<p style="font-weight: bold;">
						Cena za kos:
						<?php
							echo $currenItem['cena']."€";
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
