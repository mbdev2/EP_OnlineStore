<?php
include('konfiguracija.php');
session_start();

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
						<a class="nav-link" href="?link=domaca" > Domača </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?link=registracija" >Registracija</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?link=prijava" >Prijava</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?link=prijavaOsebja" >Prijava osebja</a>
					</li>
				</ul>
		   </div>
		 </nav>';

if (isset($_GET['link'])) {
	$link = $_GET['link'];
	if ($link == 'domaca') {
		$uri = "/gosti/domaca.php";
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
		header('Location: ' . $redirectURL);
	}
	if ($link == 'registracija') {
		$uri = "/gosti/registracija.php";
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
		header('Location: ' . $redirectURL);
	}
	if ($link == 'prijava') {
		$uri = "/stranke/prijava.php";
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
		header('Location: ' . $redirectURL);
	}
	if ($link == 'prijavaOsebja') {
		$uri = "/skupno/prijavaOsebja.php";
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
		header('Location: ' . $redirectURL);
	}
}

?>

<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="../css/domaca.css" rel="stylesheet">
	<link href="../css/navbar-style.css" rel="stylesheet">
	<link href="../css/common.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>