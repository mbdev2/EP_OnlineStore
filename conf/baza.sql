-- USTVARJANJE PODATKOVNE BAZE
CREATE SCHEMA `spletnaProdajalna` ;
USE `spletnaProdajalna` ;

-- USTVARJANJE TABELE ADMINISTRATOR
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
	`idAdministrator` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(45) DEFAULT NULL,
	`priimek` varchar(45) DEFAULT NULL,
	`elektronskiNaslov` varchar(45) NOT NULL,
	`geslo` char(128) NOT NULL,
	PRIMARY KEY (`idAdministrator`),
	UNIQUE KEY `idAdministrator_UNIQUE` (`idAdministrator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE ADMINISTRATOR
LOCK TABLES `administrator` WRITE;
INSERT INTO `administrator` VALUES (1,'Mark','Breznik','mbdev@spletna-prodajalna.si','b5981b732dfdacd417e103ab82c931d8');
UNLOCK TABLES;


-- USTVARJANJE TABELE PRODAJALCI
DROP TABLE IF EXISTS `prodajalci`;
CREATE TABLE `prodajalci` (
	`idProdajalca` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(45) DEFAULT NULL,
	`priimek` varchar(45) DEFAULT NULL,
	`elektronskiNaslov` varchar(45) NOT NULL,
	`geslo` char(128) NOT NULL,
	`aktivnost` tinyint NOT NULL,
	PRIMARY KEY (`idProdajalca`),
	UNIQUE KEY `idProdajalca_UNIQUE` (`idProdajalca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE PRODAJALCI
LOCK TABLES `prodajalci` WRITE;
INSERT INTO `prodajalci` VALUES		(1,'Klemen','Pecnik','klemen.pecnik@spletna-prodajalna.si','5184d8f33546787ac0b60468a032ea9b',1),
									(2,'Zana','Juvan','zana.juvan@spletna-prodajalna.si','c443c5d04afdbed0f925c57a13033db1',1),
									(3,'Eva','Vidmar','eva.vidmar@spletna-prodajalna.si','685c8a8b30e7ba9b1c07af8bdfa9dc26',1);
UNLOCK TABLES;


-- USTVARJANJE TABELE STRANKE
DROP TABLE IF EXISTS `stranke`;
CREATE TABLE `stranke` (
	`idStranke` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(45) DEFAULT NULL,
	`priimek` varchar(45) DEFAULT NULL,
	`elektronskiNaslov` varchar(45) NOT NULL,
	`naslov` varchar(90) DEFAULT NULL,
	`telefonskaStevilka` int NOT NULL,
	`geslo` char(128) NOT NULL,
	`aktivnost` tinyint NOT NULL,
  PRIMARY KEY (`idStranke`),
  UNIQUE KEY `idStranke_UNIQUE` (`idStranke`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE STRANKE
LOCK TABLES `stranke` WRITE;
INSERT INTO `stranke` VALUES 		(1,'Matjaz','Bevc','matjaz.bevc@gmail.com','Plac 19, 5000 Novo Mesto','040444222','51d7310052a9a62fedae78483be55e18',0),
									(2,'Blaz','Pridgar','blaz.pridgar@gmail.com','Gornji Trg 7, 2000 Maribor','040340203','6f60cb7657da242fed3dc48b24646d11',0),
									(3,'Jaka','Basej','basej.jaka@gmail.com','Clevelandksa 21, 1000 Ljubljana','040325203','b7fd5c09104ede0c829f880ddfbbd692',0),
									(4,'Eva','Vidnar','eva.vidnar@gmail.com','Pot na hrib 1, 3000 Celje','051092043','32ed3a6859f2ea618802080eeac14ebd',0);
UNLOCK TABLES;


-- USTVARJANJE TABELE ARTIKLI
DROP TABLE IF EXISTS `artikli`;
CREATE TABLE `artikli` (
	`idArtikla` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(120) NOT NULL,
	`opis` mediumtext,
	`cena` double NOT NULL,
	`aktivnost` tinyint DEFAULT NULL,
	PRIMARY KEY (`idArtikla`),
	UNIQUE KEY `idArtikla_UNIQUE` (`idArtikla`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE ARTIKLI
LOCK TABLES `artikli` WRITE;
INSERT INTO `artikli` VALUES 	(1,'Polar senzor srčnega utripa H10 BLK','Najnatančnejši senzor srčnega utripa znamke Polar, sedaj z izboljšanimi elektrodami H10. Združljiv je z vodilnimi aplikacijami za telesno pripravljenost in napravami Bluetooth. Frekvenca prenosa je 5 kHz, zaradi česar se srčni utrip lahko spremlja tudi pod vodo. Vgrajen ima pomnilnik za shranjevanje podatkov o srčnem utripu. Zelo je udoben, saj je narejen iz mehkega blaga, drsenje pa preprečujejo silikonski čepki in zaponke.',79.99,1),
(2,'CD PROJEKT Cyberpunk 2077 igra (PC)','Izpod rok razvijalca ene najuspešnejših iger kdajkoli The Witcher 3: Wild Hunt tokrat prihaja nova RPG mojstrovina Cyberpunk 2077. Vstopite v metropolo Night City in se pridružite vrhunskim avanturam v izjemnem odprtem svetu polnem blišča, ki je hkrati obsedeno z močjo. V vlogi izobčenega plačanca odkrijte ključ do nesmrtnosti.',59.99,1),
(3,'Sony brezžične slušalke WH-1000XM3B, črne','Kakovostne brezžične slušalke proizvajalca Sony so primerna izbira za vse, ki si želite odlične glasbe, kjerkoli se nahajate. S funkcijo digitalnega odpravljanja šumov popolnoma zadušijo vse zvoke iz okolice in obenem zaznajo, kaj počnete ter temu prilagodijo prepuščanje okoljskega zvoka.',239.0,0),
(4,'Xiaomi Redmi Note 8 Pro mobilni telefon, 6 GB/64 GB, moder','Mobilni telefon XIAOMI Redmi Note 8 PRO se ponaša s 16,6 cm (6,53") IPS zaslonom, kapljično zarezo, steklenim ohišjem in z zaščito Corning Gorilla Glass 5. Z izjemno zmogljivo baterijo 4500 mAh poskrbi za odlično uporabniško izkušnjo in dvodnevno uporabo z enim samim polnjenjem',259.90,1),
(5,'Nintendo Animal Crossing: New Horizons igra (Switch)','Pobegnite na zapuščeni otok in ustvarite svoj raj, medtem ko raziskujete in ustvarjate v igri Animal Crossing: New Horizons. Zgradite svojo skupnost iz nič na zapuščenem otoku. Možno je ustvarjanje in urejenje lastnega lika, doma, okraskov in pokrajine. Zberite materiale, s katerimi lahko sestavite vse od pohištva pa do orodja! Nato uporabite to, kar ustvarite, da dodate otoku še dodaten lastni pridih.',34.99,0),
(6,'LEGO 75318 Star Wars™ Mladi Yoda','Postavite si lasten luksuzen model mladega Yode iz serije Star Wars: The Mandalorian! Ustvarite avtentične detajle tega popularnega lika znanega kot Baby Yoda. Gibljiva glava, ušesa in usta omogočajo, da na obrazu dosežete veliko različnih izrazov. In otroku podarite njegovo najljubšo igračo – mladega Yodo.',69.42,1),
(7,'Mattel Enchantimals Lutka s hišnim ljubljenčkom Hedda Hippo','Dajte svoji domišljiji prosto pot in se podajte v čarobni svet s to lutko in živalskimi Enchantimals™! Punčke Enchantimals so ljubki liki, ki jih s prijatelji hišnimi ljubljenčki deli izjemen odnos. Izbirajte med več punčkami Enchantimals in njihovimi živalskimi prijatelji, na primer Heddu Hippo in Lake',9.69,1),
(8,'Play-Doh Paket lizik','Če 1 lizika Play-Doh ni dovolj, vzemite škatlico s 4 lizikami! Z dvema barvama Play-Doh se spiralno navita znotraj vsakega kalupa.',3.79,1),
(9,'Sony digitalni fotoaparat DSC-RX100','Digitalni fotoaparat Sony Cyber-Shot DSC-RX100 se med drugim ponaša s CMOS senzorjem Exmor tipa 1.0 z 20,2 milijona učinkovitih slikovnih pik, objektivom Carl Zeiss Vario-Sonnar T in 7,6-cm zaslonom s tehnologijo WhiteMagic.',299.99,1),
(10,'Transcend pomnilniška kartica TS8GCF133','Pomnilniška kartica Transcend TS8GCF133 ima 8GB prostora za shranjevanje podatkov. Namenjena je uporabi v DSLR kamerah in ponuja vzdržljivost in zanesljivost NAND flash čipovja.',27.31,1),
(11,'Xiaomi Roborock S6 Pure robotski sesalnik + darilo','Xiaomi Roborock S6 Pure robotski sesalnik se ponaša z natančnim laserskim navigacijskim sistemom, modernim dizajnom bele barve, izjemno sesalno močjo, samodejnim polnjenjem in tihim delovanjem.',399.99,1),
(12,'Rulyt Calter Fiesta viseča mreža, rdeča','Kakovostna viseča mreža je izdelana iz trpežnih materialov in je odlična izbira za počitek in sprostitev po napornem dnevu. Postavite jo lahko na vrtu, terasi ali v naravi, primerna pa je tako za odrasle, kot za otroke.',26.60,1),
(13,'Sony zvočnik GTKXB60B, črn','Sony zvočnik z vgrajenimi lučmi, akumulatorsko baterijo ter Aux in USB vhodom zagotavlja do 14 ur predvajanja glasbe. Ponaša se s funkcijo Extra Bass, ki izboljša nizke frekvence v skladbi in ustvari ritem, zaradi katerega se vsi odpravijo na plesišče.',199.99,1),
(14,'Asus VA27EHE monitor, IPS, 68,6cm, FHD (90LM0550-B01170)','Monitor Asus VA27EHE odlikuje Full HD (1920×1080) ločljivost, diagonala s 68,6 cm (27"), frekvenca osveževanja 75 Hz in tehnologija Adaptive-Sync/FreeSync. ',149.85,1),
(15,'Western Digital My Cloud Home 14TB NAS (WDBVXC0040HWT-EESN)','Naprava za shranjevanje v oblaku My Cloud Home se neposredno priključi na vaš domači usmerjevalnik Wi-Fi, tako da lahko enostavno shranite, organizirate in nadzorujete vse vaše digitalne vsebine na enem mestu in dostopate do njih brezžično od koder koli.',176.49,1);
UNLOCK TABLES;


-- USTVARJANJE TABELE NAROCILA
DROP TABLE IF EXISTS `narocila`;
CREATE TABLE `narocila` (
	`idNarocila` int NOT NULL AUTO_INCREMENT,
	`idStranke` int NOT NULL,
	`datumNarocila` datetime NOT NULL,
	`potrjenost` tinyint DEFAULT NULL,
	`znesek` double DEFAULT NULL,
	`datumPotrditve` datetime DEFAULT NULL COMMENT 'Date when seller has confirmed the order',
	PRIMARY KEY (`idNarocila`),
	UNIQUE KEY `idNarocila_UNIQUE` (`idNarocila`),
	KEY `fk_narocila_stranke1_idx` (`idStranke`),
	CONSTRAINT `fk_narocila_stranke1` FOREIGN KEY (`idStranke`) REFERENCES `stranke` (`idStranke`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE NAROCILA
LOCK TABLES `narocila` WRITE;
INSERT INTO `narocila` VALUES 	(1,4,'2020-11-27 12:32:42',1,269.59,'2020-12-01 07:35:40'),
								(2,1,'2020-11-29 10:14:46',1,19.38,'2020-12-01 07:35:51'),
								(3,2,'2020-11-30 11:34:21',1,3.79,'2020-12-01 07:35:59'),
								(4,3,'2020-11-30 21:52:35',1,399.99,'2020-12-01 07:36:21'),
								(5,3,'2020-12-01 21:22:21',1,582.67,'2020-12-04 12:09:48'),
								(6,2,'2020-12-02 20:16:29',1,79.99,'2020-12-04 12:09:57'),
								(7,1,'2020-12-02 21:46:07',1,59.99,'2020-12-04 12:10:26'),
								(8,4,'2020-12-04 01:23:07',1,519.8,'2020-12-04 12:11:38'),
								(9,3,'2020-12-05 07:27:07',1,299.99,'2020-12-10 08:14:49'),
								(10,4,'2020-12-06 12:33:07',1,349.84,'2020-12-10 08:15:12'),
								(11,2,'2020-12-06 16:45:20',1,138.84,'2020-12-10 08:15:47'),
								(12,4,'2020-12-07 14:23:31',0,139.1,NULL),
								(13,3,'2020-12-09 19:03:07',1,29.07,'2020-12-10 08:16:22'),
								(14,2,'2020-12-10 15:12:08',1,26.6,'2020-12-11 15:47:31'),
								(15,2,'2020-12-10 21:01:15',1,822.39,'2020-12-11 15:47:53'),
								(16,2,'2020-12-10 23:54:36',0,149.85,NULL),
								(17,2,'2020-12-11 11:36:18',1,638.76,'2020-12-12 17:22:53'),
								(18,3,'2020-12-12 12:23:17',0,413.95,NULL),
								(19,2,'2020-12-12 14:26:01',0,530.25,NULL);
UNLOCK TABLES;


-- USTVARJANJE TABELE NAROCENIIZDELKI
DROP TABLE IF EXISTS `naroceniIzdelki`;
CREATE TABLE `naroceniIzdelki` (
	`idNaroceniIzdelki` int NOT NULL AUTO_INCREMENT,
	`idNarocila` int NOT NULL,
	`idArtikla` int NOT NULL,
	`kolicina` int DEFAULT NULL,
	PRIMARY KEY (`idNaroceniIzdelki`),
	UNIQUE KEY `idNaroceniIzdelki_UNIQUE` (`idNaroceniIzdelki`),
	KEY `fk_naroceniIzdelki_narocila_idx` (`idNarocila`),
	KEY `fk_naroceniIzdelki_artikli1_idx` (`idArtikla`),
	CONSTRAINT `fk_naroceniIzdelki_artikli1` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT `fk_naroceniIzdelki_narocila` FOREIGN KEY (`idNarocila`) REFERENCES `narocila` (`idNarocila`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- POLNJENJE TABELE NAROCENIIZDELKI
LOCK TABLES `naroceniIzdelki` WRITE;
INSERT INTO `naroceniIzdelki` VALUES 	(1,1,7,1),
										(2,1,4,1),
										(3,2,7,2),
										(4,3,8,1),
										(5,4,11,1),
										(6,5,15,3),
										(7,5,12,2),
										(8,6,1,1),
										(9,7,2,1),
										(10,8,4,2),
										(11,9,9,1),
										(12,10,13,1),
										(13,10,14,1),
										(14,11,6,2),
										(15,12,10,1),
										(16,12,7,1),
										(17,12,6,1),
										(18,12,2,1),
										(19,13,7,3),
										(20,14,12,1),
										(21,15,11,1),
										(22,15,6,1),
										(23,15,15,2),
										(24,16,14,1),
										(25,17,5,1),
										(26,17,8,1),
										(27,17,9,2),
										(28,18,3,1),
										(29,18,5,5),
										(30,19,8,1),
										(31,19,4,1),
										(32,19,12,1),
										(33,19,2,4);
UNLOCK TABLES;
