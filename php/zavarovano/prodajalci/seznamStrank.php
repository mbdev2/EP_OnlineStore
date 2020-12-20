<?php
include('../skupno/navigacija.php');
$vseStranke = mysqli_query($dbConnection, "SELECT * FROM stranke");
include('../admin/preverjanjeVloge.php');
if (!isset($_SESSION['idProd'])) {
	header("Location: ../skupno/prijavaOsebja.php");
}
?>

<html>

<head>
	<title>eSHOP MMA - Stranke</title>
</head>

<body>
	<?php
	echo $navBarProd;
	?>

	<div class="container-fluid narocila" style="width:80%">
		<div class="row artikli-row">

			<?php
			while ($trenutnaStranka = mysqli_fetch_array($vseStranke, MYSQLI_ASSOC)) {
			?>
				<div class="narocila-detail" style="margin:10px;padding-bottom:0px; width:20%;">
					<div class="row">
						<div class="artikli-row">
							<h3>
								<?php
								echo $trenutnaStranka['ime']
								?>
								<?php
								echo $trenutnaStranka['priimek']
								?>
							</h3>
						</div>
						<div class="artikli-row" style="margin-bottom: 10px;">
							<form method="post" action="urediStranko.php">
								<input type="hidden" name="idStranke" value="<?php echo $trenutnaStranka['idStranke'] ?>">
								<input type="submit" class="btn btn-outline-primary" value="Uredi">
							</form>
						</div>

					</div>
				</div>
			<?php
			}
			?>
			<div style="text-align: center">
				<a class="btn btn-primary btn-lg" href="dodajStranko.php">
					Dodaj stranko
				</a>
			</div>
		</div>
	</div>
</body>

</html>