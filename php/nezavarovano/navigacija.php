<?php
	include('konfiguracija.php');
	session_start();

	$navigacijaGost =
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
			$redirectDomaca = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectDomaca);
	    }
	    if ($link == 'registracija'){
	        $uri = "/gosti/registracija.php";
			$redirectDomaca = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectDomaca);
	    }
	    if ($link == 'prijava'){
	        $uri = "/skupno/prijava.php";
			$redirectDomaca = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectDomaca);
	    }
	    if ($link == 'prijavaOsebja'){
	        $uri = "/skupno/prijavaOsebja.php";
			$redirectDomaca = 'https://' . $_SERVER['HTTP_HOST'] . $uri;
	    	header('Location: ' . $redirectDomaca);
	    }
	}

?>
