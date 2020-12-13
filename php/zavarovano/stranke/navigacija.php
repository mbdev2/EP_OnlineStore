<?php 
	include('konfiguracija.php');
	session_start();

	$navigacijaAdmin =
		'<div>
			<a href="../admin/seznamProdajalcev.php">Prodajalci</a>
			<a> | </a>
			<a href="../admin/profil.php">Moj profil</a>
			<a> | </a>
			<a href="odjava.php">Odjava</a>		
		</div>
		<br>';

	$navigacijaProdajalec =
		'<div>
			<a href="../prodajalci/seznamNarocil.php">Naročila</a>
			<a> | </a>
			<a href="../prodajalci/seznamIzdelkov.php">Izdelki</a>
			<a> | </a>
			<a href="../prodajalci/seznamStrank.php">Stranke</a>
			<a> | </a>
			<a href="../prodajalci/profil.php">Moj profil</a>
			<a> | </a>
			<a href="odjava.php">Odjava</a>		
		</div>
		<br>';

	$navigacijaStranka =
		'<div>
			<a href="../stranke/domaca.php">Domača</a>
			<a> | </a>
			<a href="../stranke/kosarica.php">Košarica</a>
			<a> | </a>
			<a href="../stranke/seznamNarocil.php">Naročila</a>
			<a> | </a>
			<a href="../stranke/profil.php">Moj profil</a>
			<a> | </a>
			<a href="odjava.php">Odjava</a>		
		</div>
		<br>';

	$navigacijaGost =
		'<div>
			<a href="../gosti/domaca.php">Domača</a>
			<a> | </a>
			<a href="../gosti/registracija.php">Registracija</a>
			<a> | </a>
			<a href="../stranke/prijava.php">Prijava</a>
			<a> | </a>
			<a href="../admin/prijavaOsebja.php">Prijava Osebja</a>	
		</div>
		<br>';
?>
