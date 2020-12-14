<?php
	include('../admin/navigacija.php');
	$vsaNeobdelanaNarocila = mysqli_query($povezavaDoBaze, "SELECT * FROM narocila WHERE potrjenost = 0 ORDER BY idNarocila DESC");

	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProdajalec'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>Spletna prodajalna - prodajalec - seznam naročil</title>
	</head>

	<body>
		<?php
			echo $navigacijaProdajalec;
		?>

		<div>
			<?php
				while($trenutnoNeobdelanoNarocilo = mysqli_fetch_array($vsaNeobdelanaNarocila, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $trenutnoNeobdelanoNarocilo['datumNarocila'];
						?>
					</h3>
				</div>
				<div>
					<p>
						Skupen znesek:
						<?php
							echo $trenutnoNeobdelanoNarocilo['znesek']."€";
						?>
					</p>
				</div>
				<div>
					<form method="post" action="obdelavaNarocila.php">
		    			<input type="hidden" name="idNarocila" value="<?php echo $trenutnoNeobdelanoNarocilo['idNarocila']; ?>">
						<input type='submit' id='obdelavaNarocila' value='Obdelava naročila'>
					</form>
					<br>
				</div>
			</div>
			<?php
				}
			?>

			<div style="text-align: center">
				<a href="arhivNarocil.php">
					Arhiv naročil
				</a>
			</div>
		</div>
	</body>
</html>