<?php
include('konfiguracija.php');
session_start();

$navBarAdmin =
	'<nav class="navbar navbar-expand-lg navbar-custom">
	 <div class="container-fluid">
		<a class="navbar-brand" href="#">eSHOPmma</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="../admin/seznamProdajalcev.php">Prodajalci</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="../admin/profil.php">Moj profil</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="odjava.php">Odjava</a>
			</li>
		</ul>
		</div>
	</div>
	</nav>';

$navBarProd =
	'<nav class="navbar navbar-expand-lg navbar-custom">
	 <div class="container-fluid">
		<a class="navbar-brand" href="#">eSHOPmma</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
				<li class="nav-item">
					<a href="../prodajalci/seznamNarocil.php">Naročila</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../prodajalci/seznamIzdelkov.php" >Izdelki</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../prodajalci/seznamStrank.php">Stranke</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../prodajalci/profil.php">Moj profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="odjava.php">Odjava</a>
				</li>
		  		</ul>
			</div>
	  	</nav>';

$navBarStranke =
	'<nav class="navbar navbar-expand-lg navbar-custom">
	 <div class="container-fluid">
		<a class="navbar-brand" >eSHOPmma</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../stranke/domaca.php">Domača</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../stranke/kosarica.php" >Košarica</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../stranke/seznamNarocil.php">Naročila</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../stranke/profil.php">Moj profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="odjava.php">Odjava</a>
				</li>
		  		</ul>
			</div>
	  	</nav>';

$navBarGost =
	'<nav class="navbar navbar-expand-lg navbar-custom">
	 <div class="container-fluid">
		<a class="navbar-brand" >eSHOPmma</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../gosti/domaca.php"> Domača </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../gosti/registracija.php" >Registracija</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../stranke/prijava.php" >Prijava</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../skupno/prijavaOsebja.php">Prijava osebja</a>
				</li>
		  		</ul>
			</div>
	  	</nav>';

$navBarPrijava =
	'<nav class="navbar navbar-expand-lg navbar-custom">
	 <div class="container-fluid">
		<a class="navbar-brand" >eSHOPmma</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../gosti/domaca.php"> Domača </a>
				</li>
		  		</ul>
			</div>
	  	</nav>';
?>

<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="../css/domaca.css" rel="stylesheet">
	<link href="../css/navbar-style.css" rel="stylesheet">
	<link href="../css/common.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>