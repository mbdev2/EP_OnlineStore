<?php
	include('konfiguracija.php');
	session_start();

	$navBarGost =
		'<div>
			<a href="?link=domaca" name="linkDomaca">Domača</a>
			<a> | </a>
			<a href="?link=registracija" name="linkRegistracija">Registracija</a>
			<a> | </a>
			<a href="?link=prijava" name="linkPrijava">Prijava</a>
			<a> | </a>
			<a href="?link=prijavaOsebja" name="linkPrijavaOsebja">Prijava Osebja</a>
		</div>
		<br>';

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
	        $uri = "/stranke/prijavaOsebja.php";
			$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectURL);
	    }
	}

?>
