<?php
	include('navigacija.php');
	$vsiProdajalci = mysqli_query($dbConnection, "SELECT * FROM prodajalci");
	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdmin'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA</title>
	</head>
	<body>
		<?php
			echo $navBarAdmin;
		?>
		<div>
			<?php
				while($curProd = mysqli_fetch_array($vsiProdajalci, MYSQLI_ASSOC)){
			?>
			<div>
				<h3>
					<?php
						echo $curProd['ime']
					?>
					<?php
						echo $curProd['priimek']
					?>
				</h3>
				<form method="post" action="urediProdajalca.php">
		    		<input type="hidden" name="idProdajalca" value="<?php echo $curProd['idProdajalca'] ?>">
		    		<input type="submit" value="Uredi">
				</form>
				<br>
			</div>
			<?php
				}
			?>
			<div style="text-align: center">
				<a href="dodajProdajalca.php">
					Dodaj prodajalca
				</a>
			</div>
		</div>
	</body>
</html>
