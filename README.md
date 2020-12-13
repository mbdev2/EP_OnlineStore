# epProjekt
-- UPORABNIŠKA IMENA IN GESLA --

	ADMINISTRATOR
		Uporabniško ime:			mbdev@spletna-prodajalna.si
		Geslo:						Nekaj123
		Geslo za certifikat:		certadminpass
		Prijazno ime certifikata:	mbdev

	PRODAJALCI
		Uporabniško ime:			klemen.pecnik@spletna-prodajalna.si
		Geslo:						Klemen123
		Geslo za certifikat:		Klemen123cert
		Prijazno ime certifikata:	prodKlemen

		Uporabniško ime:			zana.juvan@spletna-prodajalna.si
		Geslo:						ZanaJ123
		Geslo za certifikat:		ZanaJ123cert
		Prijazno ime certifikata:	prodZana

		Uporabniško ime:			eva.vidmar@spletna-prodajalna.si
		Geslo:						EvaVid123
		Geslo za certifikat:		EvaVid123cert
		Prijazno ime certifikata:	prodEva

	STRANKE
		Uporabniško ime:			matjaz.bevc@gmail.com
		Geslo:						Bevcjecar123

		Uporabniško ime:			blaz.pridgar@gmail.com
		Geslo:						N3k4jv4rn3g4

		Uporabniško ime:			basej.jaka@gmail.com
		Geslo:						Cokolada1999

		Uporabniško ime:			eva.vidnar@gmail.com
		Geslo:						Ljubavi123


-- CERTIFIKATI

	CERTIFIKATNA AGENCIJA
		Ime:						Elektronsko poslovanje CA
		Elektronski naslov:			info@epca.si
		Geslo:						ep

	STREŽNIŠKI CERTIFIKAT
		Ime:						localhost
		Elektronski naslov:			webmaster@localhost
		Geslo:						certserver


-- KORAKI ZA ZAGON IMPLEMENTACIJE

	1. 	Mapo "epProjekt" skopiramo na namizje.

	2. 	V lokalni instanci programa MySQL Workbench z vrati 3306, z uporabniškim imenom "root" in z geslom "ep" izvedemo skripto "baza.sql".

	3.	Mapo "ssl" skopiramo v mapo /etc/apache2/ z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/conf/ssl/ /etc/apache2/ssl".

	4.	Iz varnostnih razlogov je dobro, da dostop do teh datotek omejimo zgolj na uporabnika root in sicer z ukazom "sudo chmod go-rwx /etc/apache2/ssl/*.pem".

	5.	Konfiguracijske datoteke strežnika Apache osvežimo z ukazom "sudo service apache2 reload".

	6. 	V izbrani spletni brskalnik uvozimo vse osebne certifikate, ki se nahajajo v mapi "personalCerts". Postopek uvoza certifikatov je odvisen od uporabljenega brskalnika.

	7. 	Datoteko "default-ssl.conf" skopiramo v mapo "/etc/apache2/sites-available" z ukazom "sudo cp /home/ep/Desktop/epProjekt/conf/default-ssl.conf /etc/apache2/sites-available/".

	8. 	Datoteko "000-default.conf" skopiramo v mapo "/etc/apache2/sites-available" z ukazom "sudo cp /home/ep/Desktop/epProjekt/conf/000-default.conf /etc/apache2/sites-available/".

	9.	Mapo "php/zavarovano" skopiramo v mapo "/var/www/html" z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/php/zavarovano /var/www/html/".

	10.	Mapo "php/nezavarovano" skopiramo v mapo "/var/www/html" z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/php/nezavarovano /var/www/html/".

	11.	Konfiguracijsko datoteko registriramo v strežnik Apache z ukazom "sudo a2ensite default-ssl" ter strežnik nato poženemo z ukazom "sudo service apache2 start".
