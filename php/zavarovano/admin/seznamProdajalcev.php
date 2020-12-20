<?php
include('../skupno/navigacija.php');
include('preverjanjeVloge.php');
$vsiProdajalci = mysqli_query($dbConnection, "SELECT * FROM prodajalci");
if (!isset($_SESSION['idAdmin'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA - prodajalci</title>
</head>

<body>
	<?php
	echo $navBarAdmin;
	?>
	<div class="container-fluid narocila" style="width:80%">
		<div class="row artikli-row">
			<?php
			while ($curProd = mysqli_fetch_array($vsiProdajalci, MYSQLI_ASSOC)) {
			?>
				<div class="narocila-detail" style="margin:10px;padding-bottom:0px; width:25%;">
					<div class="row">
						<div class="artikli-row">
							<h3>
								<?php
								echo $curProd['ime']
								?>
								<?php
								echo $curProd['priimek']
								?>
							</h3>
						</div>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<form method="post" action="urediProdajalca.php">
								<input type="hidden" name="idProdajalca" value="<?php echo $curProd['idProdajalca'] ?>">
								<input type="submit" value="Uredi">
							</form>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<div style="text-align: center">
				<a class="btn btn-primary btn-lg" href="dodajProdajalca.php">
					Dodaj prodajalca
				</a>
			</div>
		</div>
	</div>
</body>

</html>