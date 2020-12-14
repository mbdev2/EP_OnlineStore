<?php
	include('navigacija.php');
	$vsiProdajalci = mysqli_query($povezavaDoBaze, "SELECT * FROM prodajalci");

	include('preverjanjeVloge.php');
	if(!isset($_SESSION['idAdministrator'])){
		header("Location: ../skupno/prijavaOsebja.php");
	}
?>

<html>
	<head>
		<title>eSHOP MMA - administrator - seznam prodajalcev</title>
	</head>

	<body>
		<?php
			echo $navBarAdmin;
		?>

		<div>
			<?php
				while($trenutniProdajalec = mysqli_fetch_array($vsiProdajalci, MYSQLI_ASSOC)){
			?>
			<div>
				<h3>
					<?php
						echo $trenutniProdajalec['ime']
					?>
					<?php
						echo $trenutniProdajalec['priimek']
					?>
				</h3>
				<form method="post" action="urediProdajalca.php">
		    		<input type="hidden" name="idProdajalca" value="<?php echo $trenutniProdajalec['idProdajalca'] ?>">
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