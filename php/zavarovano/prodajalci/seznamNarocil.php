<?php
	include('../admin/navigacija.php');
	$allOrders = mysqli_query($dbConnection, "SELECT * FROM narocila WHERE orderStatus = 0 ORDER BY idNarocila DESC");
	include('../admin/preverjanjeVloge.php');
	if(!isset($_SESSION['idProd'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
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
			<?php
				while($curOrder = mysqli_fetch_array($allOrders, MYSQLI_ASSOC)){
			?>
			<div>
				<div>
					<h3>
						<?php
							echo $curOrder['datumNarocila'];
						?>
					</h3>
				</div>
				<div>
					<p>
						Skupen znesek:
						<?php
							echo $curOrder['znesek']."€";
						?>
					</p>
				</div>
				<div>
					<form method="post" action="obdelavaNarocila.php">
		    			<input type="hidden" name="idNarocila" value="<?php echo $curOrder['idNarocila']; ?>">
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
