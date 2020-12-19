CREATE SCHEMA `eSHOPmma` ;
USE `eSHOPmma` ;

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
	`idAdmin` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(50) DEFAULT NULL,
	`priimek` varchar(50) DEFAULT NULL,
	`eNaslov` varchar(50) NOT NULL UNIQUE,
	`geslo` char(128) NOT NULL,
	PRIMARY KEY (`idAdmin`),
	UNIQUE KEY `idAdmin_UNIQUE` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `administrator` WRITE;
INSERT INTO `administrator` VALUES (1,'Mark','Breznik','mbdev@spletna-prodajalna.si','b5981b732dfdacd417e103ab82c931d8');
UNLOCK TABLES;


DROP TABLE IF EXISTS `prodajalci`;
CREATE TABLE `prodajalci` (
	`idProdajalca` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(50) DEFAULT NULL,
	`priimek` varchar(50) DEFAULT NULL,
	`eNaslov` varchar(50) NOT NULL UNIQUE,
	`geslo` char(128) NOT NULL,
	`activeOrNot` tinyint NOT NULL,
	PRIMARY KEY (`idProdajalca`),
	UNIQUE KEY `idProdajalca_UNIQUE` (`idProdajalca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `prodajalci` WRITE;
INSERT INTO `prodajalci` VALUES		(1,'Klemen','Pecnik','klemen.pecnik@spletna-prodajalna.si','5184d8f33546787ac0b60468a032ea9b',1),
									(2,'Zana','Juvan','zana.juvan@spletna-prodajalna.si','c443c5d04afdbed0f925c57a13033db1',1),
									(3,'Eva','Vidmar','eva.vidmar@spletna-prodajalna.si','685c8a8b30e7ba9b1c07af8bdfa9dc26',1);
UNLOCK TABLES;


DROP TABLE IF EXISTS `stranke`;
CREATE TABLE `stranke` (
	`idStranke` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(50) DEFAULT NULL,
	`priimek` varchar(50) DEFAULT NULL,
	`eNaslov` varchar(50) NOT NULL UNIQUE,
	`naslov` varchar(90) DEFAULT NULL,
	`telefonskaStevilka` int NOT NULL,
	`geslo` char(128) NOT NULL,
	`registerHash` varchar(32) DEFAULT NULL,
	`activeOrNot` tinyint DEFAULT '0',
  PRIMARY KEY (`idStranke`),
  UNIQUE KEY `idStranke_UNIQUE` (`idStranke`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `stranke` WRITE;
INSERT INTO `stranke` VALUES 		(1,'Matjaz','Bevc','matjaz.bevc@gmail.com','Plac 19, 5000 Novo Mesto','040444222','51d7310052a9a62fedae78483be55e18','c4ca4238a0b923820dcc509a6f75849b',1),
									(2,'Blaz','Pridgar','blaz.pridgar@gmail.com','Gornji Trg 7, 2000 Maribor','040340203','6f60cb7657da242fed3dc48b24646d11','c4ca4238a0b923820dcc509a6f75849b',1),
									(3,'Jaka','Basej','basej.jaka@gmail.com','Clevelandksa 21, 1000 Ljubljana','040325203','b7fd5c09104ede0c829f880ddfbbd692','c4ca4238a0b923820dcc509a6f75849b',1),
									(4,'Eva','Vidnar','eva.vidnar@gmail.com','Pot na hrib 1, 3000 Celje','051092043','32ed3a6859f2ea618802080eeac14ebd','c4ca4238a0b923820dcc509a6f75849b',1);
UNLOCK TABLES;


DROP TABLE IF EXISTS `artikli`;
CREATE TABLE `artikli` (
	`idArtikla` int NOT NULL AUTO_INCREMENT,
	`ime` varchar(128) NOT NULL,
	`opis` mediumtext,
	`cena` double NOT NULL,
	`activeOrNot` tinyint DEFAULT '1',
	`sestevekOcen` int DEFAULT '0',
	`stOcen` int DEFAULT '0',
	`slika1` longtext,
	PRIMARY KEY (`idArtikla`),
	UNIQUE KEY `idArtikla_UNIQUE` (`idArtikla`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `artikli` WRITE;
INSERT INTO `artikli` VALUES 	(1,'Polar senzor srčnega utripa H10 BLK','Najnatančnejši senzor srčnega utripa znamke Polar, sedaj z izboljšanimi elektrodami H10. Združljiv je z vodilnimi aplikacijami za telesno pripravljenost in napravami Bluetooth. Frekvenca prenosa je 5 kHz, zaradi česar se srčni utrip lahko spremlja tudi pod vodo. Vgrajen ima pomnilnik za shranjevanje podatkov o srčnem utripu. Zelo je udoben, saj je narejen iz mehkega blaga, drsenje pa preprečujejo silikonski čepki in zaponke.',79.99,1,19,4,'data:image/webp;base64,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'),
(2,'CD PROJEKT Cyberpunk 2077 igra (PC)','Izpod rok razvijalca ene najuspešnejših iger kdajkoli The Witcher 3: Wild Hunt tokrat prihaja nova RPG mojstrovina Cyberpunk 2077. Vstopite v metropolo Night City in se pridružite vrhunskim avanturam v izjemnem odprtem svetu polnem blišča, ki je hkrati obsedeno z močjo. V vlogi izobčenega plačanca odkrijte ključ do nesmrtnosti.',59.99,1,75,23),
(3,'Sony brezžične slušalke WH-1000XM3B, črne','Kakovostne brezžične slušalke proizvajalca Sony so primerna izbira za vse, ki si želite odlične glasbe, kjerkoli se nahajate. S funkcijo digitalnega odpravljanja šumov popolnoma zadušijo vse zvoke iz okolice in obenem zaznajo, kaj počnete ter temu prilagodijo prepuščanje okoljskega zvoka.',239.0,0,9,9),
(4,'Xiaomi Redmi Note 8 Pro mobilni telefon, 6 GB/64 GB, moder','Mobilni telefon XIAOMI Redmi Note 8 PRO se ponaša s 16,6 cm (6,53") IPS zaslonom, kapljično zarezo, steklenim ohišjem in z zaščito Corning Gorilla Glass 5. Z izjemno zmogljivo baterijo 5000 mAh poskrbi za odlično uporabniško izkušnjo in dvodnevno uporabo z enim samim polnjenjem',259.90,1,0,0),
(5,'Nintendo Animal Crossing: New Horizons igra (Switch)','Pobegnite na zapuščeni otok in ustvarite svoj raj, medtem ko raziskujete in ustvarjate v igri Animal Crossing: New Horizons. Zgradite svojo skupnost iz nič na zapuščenem otoku. Možno je ustvarjanje in urejenje lastnega lika, doma, okraskov in pokrajine. Zberite materiale, s katerimi lahko sestavite vse od pohištva pa do orodja! Nato uporabite to, kar ustvarite, da dodate otoku še dodaten lastni pridih.',34.99,0,3,1),
(6,'LEGO 75318 Star Wars™ Mladi Yoda','Postavite si lasten luksuzen model mladega Yode iz serije Star Wars: The Mandalorian! Ustvarite avtentične detajle tega popularnega lika znanega kot Baby Yoda. Gibljiva glava, ušesa in usta omogočajo, da na obrazu dosežete veliko različnih izrazov. In otroku podarite njegovo najljubšo igračo – mladega Yodo.',69.42,1,493,100),
(7,'Mattel Enchantimals Lutka s hišnim ljubljenčkom Hedda Hippo','Dajte svoji domišljiji prosto pot in se podajte v čarobni svet s to lutko in živalskimi Enchantimals™! Punčke Enchantimals so ljubki liki, ki jih s prijatelji hišnimi ljubljenčki deli izjemen odnos. Izbirajte med več punčkami Enchantimals in njihovimi živalskimi prijatelji, na primer Heddu Hippo in Lake',9.69,1,2,1),
(8,'Play-Doh Paket lizik','Če 1 lizika Play-Doh ni dovolj, vzemite škatlico s 4 lizikami! Z dvema barvama Play-Doh se spiralno navita znotraj vsakega kalupa.',3.79,1,44,17),
(9,'Sony digitalni fotoaparat DSC-RX100','Digitalni fotoaparat Sony Cyber-Shot DSC-RX100 se med drugim ponaša s CMOS senzorjem Exmor tipa 1.0 z 20,2 milijona učinkovitih slikovnih pik, objektivom Carl Zeiss Vario-Sonnar T in 7,6-cm zaslonom s tehnologijo WhiteMagic.',299.99,1,0,0),
(10,'Transcend pomnilniška kartica TS8GCF133','Pomnilniška kartica Transcend TS8GCF133 ima 8GB prostora za shranjevanje podatkov. Namenjena je uporabi v DSLR kamerah in ponuja vzdržljivost in zanesljivost NAND flash čipovja.',27.31,1,16,4),
(11,'Xiaomi Roborock S6 Pure robotski sesalnik + darilo','Xiaomi Roborock S6 Pure robotski sesalnik se ponaša z natančnim laserskim navigacijskim sistemom, modernim dizajnom bele barve, izjemno sesalno močjo, samodejnim polnjenjem in tihim delovanjem.',399.99,1,224,52),
(12,'Rulyt Calter Fiesta viseča mreža, rdeča','Kakovostna viseča mreža je izdelana iz trpežnih materialov in je odlična izbira za počitek in sprostitev po napornem dnevu. Postavite jo lahko na vrtu, terasi ali v naravi, primerna pa je tako za odrasle, kot za otroke.',26.60,1,23,7),
(13,'Sony zvočnik GTKXB60B, črn','Sony zvočnik z vgrajenimi lučmi, akumulatorsko baterijo ter Aux in USB vhodom zagotavlja do 14 ur predvajanja glasbe. Ponaša se s funkcijo Extra Bass, ki izboljša nizke frekvence v skladbi in ustvari ritem, zaradi katerega se vsi odpravijo na plesišče.',199.99,1,42,9),
(14,'Asus VA27EHE monitor, IPS, 68,6cm, FHD (90LM0550-B01170)','Monitor Asus VA27EHE odlikuje Full HD (1920×1080) ločljivost, diagonala s 68,6 cm (27"), frekvenca osveževanja 75 Hz in tehnologija Adaptive-Sync/FreeSync. ',149.85,1,42,10),
(15,'Western Digital My Cloud Home 14TB NAS (WDBVXC0040HWT-EESN)','Naprava za shranjevanje v oblaku My Cloud Home se neposredno priključi na vaš domači usmerjevalnik Wi-Fi, tako da lahko enostavno shranite, organizirate in nadzorujete vse vaše digitalne vsebine na enem mestu in dostopate do njih brezžično od koder koli.',176.49,1,0,0);
UNLOCK TABLES;


DROP TABLE IF EXISTS `narocila`;
CREATE TABLE `narocila` (
	`idNarocila` int NOT NULL AUTO_INCREMENT,
	`idStranke` int NOT NULL,
	`datumNarocila` datetime NOT NULL,
	`orderStatus` tinyint DEFAULT NULL,
	`znesek` double DEFAULT NULL,
	`datumPotrditve` datetime DEFAULT NULL COMMENT 'Date when seller has confirmed the order',
	PRIMARY KEY (`idNarocila`),
	UNIQUE KEY `idNarocila_UNIQUE` (`idNarocila`),
	KEY `fk_narocila_stranke1_idx` (`idStranke`),
	CONSTRAINT `fk_narocila_stranke1` FOREIGN KEY (`idStranke`) REFERENCES `stranke` (`idStranke`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

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
								(11,2,'2020-12-06 16:50:20',1,138.84,'2020-12-10 08:15:47'),
								(12,4,'2020-12-07 14:23:31',0,139.1,NULL),
								(13,3,'2020-12-09 19:03:07',1,29.07,'2020-12-10 08:16:22'),
								(14,2,'2020-12-10 15:12:08',1,26.6,'2020-12-11 15:47:31'),
								(15,2,'2020-12-10 21:01:15',1,822.39,'2020-12-11 15:47:53'),
								(16,2,'2020-12-10 23:54:36',0,149.85,NULL),
								(17,2,'2020-12-11 11:36:18',1,638.76,'2020-12-12 17:22:53'),
								(18,3,'2020-12-12 12:23:17',0,413.95,NULL),
								(19,2,'2020-12-12 14:26:01',0,530.25,NULL);
UNLOCK TABLES;


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
