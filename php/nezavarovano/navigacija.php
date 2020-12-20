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

	if(isset($_GET['link'])){
		$link = $_GET['link'];
	    if ($link == 'domaca') {
	        $uri = "/gosti/domaca.php";
			$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectURL);
	    }
	    if ($link == 'registracija'){
	        $uri = "/gosti/registracija.php";
			$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectURL);
	    }
	    if ($link == 'prijava'){
	        $uri = "/stranke/prijava.php";
			$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectURL);
	    }
	    if ($link == 'prijavaOsebja'){
	        $uri = "/skupno/prijavaOsebja.php";
			$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectURL);
	    }
	}

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
