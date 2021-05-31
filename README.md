# Online Store with Android App
## _Just a fun way to get into PHP and Android developement!_

Developed by Matjaž Bevc, Mark Breznik and Amadej Pavšič for a course in our undergraduate study program Multimedia at the Faculty of Computer and Information Science, University of Lubljana

## Features

- Multiple login authentication and authorizations levels - guest, buyer, sales-person and manager.
- Browse a suite of items, shop around and execute orders!
- Manage items inventory, account settings and more.
- Some other hidden treats.

## How to use?
### CREDENTIALS

	STRANKE
		email:			matjaz.bevc@gmail.com
		pass:			Bevcjecar123

		email:			blaz.pridgar@gmail.com
		pass:			N3k4jv4rn3g4

		email:			basej.jaka@gmail.com
		pass:			Cokolada1999

		email:			eva.vidnar@gmail.com
		pass:			Ljubavi123

	PRODAJALCI
		email:			klemen.pecnik@spletna-prodajalna.si
		pass:			Klemen123
		pass - cert:		Klemen123cert

		email:			zana.juvan@spletna-prodajalna.si
		pass:			ZanaJ123
		pass - cert:		ZanaJ123cert

		email:			eva.vidmar@spletna-prodajalna.si
		pass:			EvaVid123
		pass - cert:		EvaVid123cert

	ADMIN
		email:			mbdev@spletna-prodajalna.si
		pass:			Nekaj123
		pass - cert:		certadminpass


### CERTIFICATES

	CERT AGENCY
		Ime:			Elektronsko poslovanje CA
		email:			info@epca.si
		pass:			ep

	SERVER CERT
		Ime:			localhost
		email:			webmaster@localhost
		pass:			certserver


### HOW TO USE
(In Slovenian language)

	1. 	Direktorij "epProjekt" skopirajte na namizje.

	2. 	Direktorij "ssl z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/conf/ssl /etc/apache2/ssl/" skopiramo v mapo /etc/apache2/.

	3.	Omejimo dostop do omenjene mape za uporabnika "root" z ukazom "sudo chmod go-rwx /etc/apache2/ssl/*.pem".

	4.	V izbrani brskalnik namestimo certifikate.

	5.	Z ukazom "sudo cp /home/ep/Desktop/epProjekt/conf/default-ssl.conf /etc/apache2/sites-available/" skopiramo "default-ssl.conf" v "/etc/apache2/sites-available"

	6. 	Z ukazom "sudo cp /home/ep/Desktop/epProjekt/conf/000-default.conf /etc/apache2/sites-available/" skopiramo "000-default.conf" v "/etc/apache2/sites-available"

	7. 	Z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/php/zavarovano /var/www/html/" skopiramo mapo "epProjekt/php/zavarovano" v mapo "/var/www/html".

	8. 	Z ukazom "sudo cp -R /home/ep/Desktop/epProjekt/php/nezavarovano /var/www/html/" skopiramo mapo "epProjekt/php/nezavarovano" v mapo "/var/www/html".

	9.	V programu mySQL workbench poženemo datoteko "baza.sql", kar nam bo ustvarilo podatkovno bazo.
	
	10.	Z ukazom "sudo apt-get install php-curl" namestimo curl extension.

	11.	Zaženemo apache server z ukazom "sudo service apache2 start".

## Development

For now developement of our online store based on PHP has been finished - it was never meant to become something great, we just had to do a project and got to learn PHP on the side.
From our experience, Node.js or Python Flask provide a better developement environement.

## License

MIT
**Free Software, Hell Yeah!**
