# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.28)
# Database: anastasia
# Generation Time: 2017-03-12 13:42:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table abos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `abos`;

CREATE TABLE `abos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `costs_per_month` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `abos` WRITE;
/*!40000 ALTER TABLE `abos` DISABLE KEYS */;

INSERT INTO `abos` (`id`, `name`, `costs_per_month`)
VALUES
	(1,'3-Monate',15),
	(2,'6-Monate',13),
	(3,'1-Jahr',12);

/*!40000 ALTER TABLE `abos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table anastasia
# ------------------------------------------------------------

DROP TABLE IF EXISTS `anastasia`;

CREATE TABLE `anastasia` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `question` text,
  `answer_text` text,
  `answer_imgs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `anastasia` WRITE;
/*!40000 ALTER TABLE `anastasia` DISABLE KEYS */;

INSERT INTO `anastasia` (`id`, `page_id`, `question`, `answer_text`, `answer_imgs`)
VALUES
	(1,2,'Es war einmal eine wunderschöne . . .',':. . . Prinzessin::. . . Königin::. . . Mätresse:',':princess::queen::mistress:'),
	(2,3,'Die wohnte in einem großen Schloss das ganz in ihrer lieblings Farbe gestirchen war . . .\n',NULL,':castle-yellow::castle-orange::castle-red::castle-pink::castle-purple::castle-blue::castle-darkblue::castle-green::castle-black:'),
	(3,4,'Sie hatte fantastische Haare in der Farbe. . .',':. . . blond::. . . braun::. . . schwarz::. . . rot:',':blond::brown::black::red:'),
	(4,5,'Eines Tages veranstaltete der Prinz . . .',':. . .eine riesige Party::. . .einen gemütlichen Filmabend::. . .ein romantisches Date:',': romantic::cinema::party:'),
	(5,6,'Sie wollte unbedingt hin gehen und machte sich gleich fertig! Es war ihr sofort klar was sie tragen wollte. . .',NULL,':dress::fancy::cosy:'),
	(6,7,'Sie benutze die selben Produkte wie immer. . .',NULL,':large::small::medium:'),
	(7,8,'Sie sah toll aus und strahlte denn sie war ganz sie selbst. Der Abend war ein voller erfolg und sie hatte sehr viel Spaß!',NULL,':smile_1::smile_2::smile_3:'),
	(8,9,'Und schon bald liegt dein kleines Anastasia-Märchen vor deiner Türe! Wir hoffen es ist ganz nach deinem Geschmack, so wie dieser Abend es war…',NULL,'');

/*!40000 ALTER TABLE `anastasia` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table box-type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `box-type`;

CREATE TABLE `box-type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `box-type` WRITE;
/*!40000 ALTER TABLE `box-type` DISABLE KEYS */;

INSERT INTO `box-type` (`id`, `name`)
VALUES
	(1,'Königin'),
	(2,'Prinzessin'),
	(3,'Mätresse');

/*!40000 ALTER TABLE `box-type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `slug`)
VALUES
	(1,'Augen','augen'),
	(2,'Haare','haare'),
	(3,'Nägel','nägel'),
	(4,'Lippen','lippen'),
	(5,'Körper','körper'),
	(6,'Gesicht','gesicht');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user-id` int(11) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `product-id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `user-id`, `content`, `product-id`, `created_at`)
VALUES
	(1,21,'Super toller Kommentar',1,2546543),
	(2,17,'Ja wirklich super Produkt',1,6865634),
	(3,17,'Hallo das ist ein direkter Test',3,584644),
	(4,17,'Hallo das ist ein Test',3,1488097380),
	(34,37,'Ganz toll',1,1489164060),
	(35,46,'Absoluter Liebling',2,1489164352),
	(36,37,'Hallo?',2,1489171823);

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `sent_at` int(30) DEFAULT NULL,
  `answered_at` int(30) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;

INSERT INTO `contact` (`id`, `user_id`, `email`, `subject`, `message`, `sent_at`, `answered_at`, `is_active`)
VALUES
	(1,NULL,'0','Hallo','Geht das?',0,1488984716,0),
	(2,NULL,'0','Hallo','Geht das!',0,NULL,0),
	(3,NULL,'0','Hallo Hallo','Was geht?',1488984308,NULL,0),
	(4,NULL,'0','Hallo','Gadlkfm',1488984353,NULL,0),
	(5,NULL,'0','Hallo','dafn',1488984424,NULL,0),
	(6,NULL,'0','hasdf','refjnkd',1488984470,NULL,0),
	(7,NULL,'0','asdfjk','lasdfjkasjfdk',1488984535,NULL,0),
	(8,NULL,'0','öeaidfj','löiadjsfk',1488984620,NULL,0),
	(9,NULL,'hannah.schott@hotmail.com','öeaidfjd','aedfsöladf',1488984652,NULL,1),
	(10,37,'hannah.schott@hotmail.com','Hallo','Test',1488984716,NULL,0),
	(11,NULL,'hannah.schott@hotmail.com','Hallo','Hallo das geht!',1488991638,NULL,1),
	(12,0,'adsfkaoödjns','öijeardfyoijkl','oijklnredfm,y',1488991957,NULL,1),
	(13,0,'hannnelor.schott@chello.at','asdfsdf','afdscawefdsf',1488992121,NULL,1),
	(14,0,'hannnelor.schott@chello.at','asdfsdf','afdscawefdsf',1488992121,NULL,1),
	(15,0,'adfkadfkj','öjdöfkjökfj','oijraedfojf',1488992327,NULL,1),
	(16,0,'adfkadfkj','öjdöfkjökfj','oijraedfojf',1488992327,NULL,1),
	(17,0,'dfadsfa','adsfasdf','aefadfaf',1488992366,NULL,1),
	(18,37,'hannah.schott@hotmail.com','Kunde','Kunde eingetragen?',1489060276,NULL,1),
	(19,0,'hannah.schott@hotmail.com','Hallo ','Super Nachricht',1489069636,NULL,1);

/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table newsletter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;

INSERT INTO `newsletter` (`id`, `email`, `is_active`)
VALUES
	(1,'hannah.schott@hotmail.com',1),
	(2,'test@hallo.at',1),
	(3,'alexandra.benkoe@gmail.com',1),
	(4,'florian@hallo.at',1),
	(5,'test@test.at',1);

/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `abo_id` int(11) DEFAULT NULL,
  `date-ordered` int(11) NOT NULL,
  `order-status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `user_id`, `abo_id`, `date-ordered`, `order-status`, `is_active`)
VALUES
	(4,37,2,1488991337,2,1),
	(6,43,3,1489069971,1,1),
	(12,46,1,1489087435,2,1);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `description` text,
  `main_img` varchar(100) DEFAULT NULL,
  `product_link` text,
  `price` int(40) DEFAULT NULL,
  `categories-id` int(11) DEFAULT NULL,
  `comments_rating` decimal(10,1) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `rated_by` text,
  `boxes-id` int(11) DEFAULT NULL,
  `month_id` text,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `main_img`, `product_link`, `price`, `categories-id`, `comments_rating`, `rating_count`, `rated_by`, `boxes-id`, `month_id`, `is_active`)
VALUES
	(1,'Kylie Jenner - LipKit','kyliejennerlipkit','Das KylieCosmetics LipKit ist deine Geheimwaffe um einen perfekten \'Kylie Lip\'-Look zu kreieren. Jeder LipKit kommt mit einem matten Liquid-Lipstick und einem passenden Lip-Liner.\r\n\r\nDieser ultra langanhaltender Lip-Liner hat eine kremige texture die das Auftragen auf die Lippen einfach und komfortabel macht. Der Lip-Liner kann kann ganz einfach in jedem herkömlichen Spitzer gespitzt werden.','lipkit.png','https://www.kyliecosmetics.com',20,4,5.0,1,NULL,NULL,'01.17',1),
	(2,'Urban Decay - Naked Basics','urbandecaynakedbasics','Die erste MATTE palette, ethält sechs wundervolle Naked Nudefarben zum aufbauen oder alleine tragen. Naked Basic ist mehr als der lang erwartete, vielzweck, MATTE Begleiter zu Naked. \r\n\r\nEs ist die Palette die JEDE Frau in ihrem Beautyarsenal braucht. Mit sechs Nakedly-Neutral-Schattierungen, hat sie alles was du brauchst für dein perfektes, neutralles, mattes Augenmakeup - mit vier absolut neuen und exklusiven Tönen.  ','naked.png','http://www.urbandecay.com',26,1,4.0,15,NULL,NULL,'03.17',1),
	(3,'Anastasia - Contour Kit','anastasiacontourkit','Das best verkaufte Set, mit drei highlitern und drei Konturschattierungen on einem Must-Have-Kit. Anastasia\'s Contour Cream Kit formt, definiert und hebt die Knochenstruktur und dein natürlichen Featrues hervor.\n\nEs lässt sich leicht blenden und verschmiltz Sanft. Dank Satin-Finish kannst du die Illusion von höheren Wangenknochen, einer schmaleren Nase, sanftere Konturen, eine kleinere Stirn einfach krieren. Erhältlich in 4 Schattierungen.','contourkit.png','http://www.anastasiabeverlyhills.com',35,6,3.0,5,NULL,NULL,'03.17',1),
	(4,'Cliniqu - Eyeliner','cliniqueeyeliner','Der Eyeliner von Clinique erzeugt eine klare Linie in einem Schwung. Die zugespitzte, präzise Bürste sorgt für reine, starke Farbe, entweder in einer dünnen oder einer dicken Linie. \n\n24 Stunden schmutz- und wischfest. Augenärztlich getestet. Allergiegetestet. 100% parfumfrei.','clinque-eyeliner.jpeg','http://www.clinique.at/',22,1,3.5,9,':46:',NULL,'03.17',1),
	(5,'MaxFactor - Maskara','maxfactormaskara','Dieser Mascara von Max Factor verschafft Ihnen einen atemberaubenden Augenaufschlag, bis zur letzten Wimper. Die schwarze Wimperntusche ist auch bestens für sensible Kontaktlinsenträgerinnen geeignet.','maxfactor_mascara.jpeg','http://maxfactor.de/',20,1,4.5,14,':46:',NULL,'03.17',1),
	(6,'Zoeva - Pinsel','zoevapinsel','Inspiriert von der Magie der Farben Pink und Gold haben wir unser neues Rose Golden Luxury Set entwickelt – eine Komposition aus acht luxuriösen, handgefertigten Pinseln, verstaut in einer chic-eleganten Clutch. \n\nDie Pinsel eignen sich sowohl für die tägliche Makeup-Routine als auch für extravagante Looks. Feinstes Echthaar und synthetische Taklon-Haare ermöglichen eine göttlich-sanfte Anwendung mit cremigen und pudrigen Texturen.','zoeva_brushes.jpg','https://www.zoevacosmetics.com/europe1/de',75,6,4.0,3,':37::46:',NULL,'03.17',1),
	(21,'Maybelline - Fit Me MakeUp','maybellinefitmemakeup','adösfhadsöfhjaösodföfio',NULL,'https://www.maybelline.de/',25,6,NULL,NULL,NULL,NULL,'03.17',0);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL DEFAULT '',
  `lastname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `newsletter` varchar(4) DEFAULT NULL,
  `birthday` date NOT NULL,
  `pw` varchar(60) NOT NULL DEFAULT '',
  `adress` text,
  `payment` varchar(50) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `abo-id` int(11) DEFAULT NULL,
  `abo-timestamp` int(20) DEFAULT NULL,
  `box-type_id` int(11) DEFAULT NULL,
  `box_answers` text,
  `user_group` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL DEFAULT '',
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `newsletter`, `birthday`, `pw`, `adress`, `payment`, `hash`, `abo-id`, `abo-timestamp`, `box-type_id`, `box_answers`, `user_group`, `created_at`, `is_active`)
VALUES
	(17,'Florian','Klammerberger','florian@hallo.at','off','1995-07-10','e7fe75a2e30835a051cd3e0d701eb43247809f67:82389',NULL,'nachnahme',NULL,NULL,NULL,NULL,NULL,1,'1486554872',1),
	(22,'Hannah','Schott','hallo@hannah.at','on','1995-08-14','ef08ec19099e832b4aef835f0442c23d181c9dfc:93036',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1486639419',1),
	(25,'Alex','Benkö','test@test.at',NULL,'1992-08-30','c787d409a2b1be5b5718612231d402559c5a40e8:47548',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487858556',1),
	(26,'Hannah','Schott','test@email.at',NULL,'1995-08-14','d3ce956f5dcbae0d7f5f047e3e47e364143ebea9:59621',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487859846',1),
	(27,'Super','Toll','super@toll.at',NULL,'1998-03-12','e26f485b1dc1993cf20beaa39fdca8d341427cd7:35705',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487860003',1),
	(28,'Test','Test','test@test.com',NULL,'1995-03-12','437c10628a0a4715022edc78ffbf4424bfad7d8a:80529',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487860247',1),
	(29,'Noch','Haaa','noch@mal.at','off','1992-01-12','9d1f9ca925c831194e66920f4f36efbe58d12a62:82591',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487860637',1),
	(30,'Nochmal','Mal','mal@noch.at',NULL,'1994-12-12','ea4c8737825bfc455607581ca2a00661cefb52fc:11113',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487860889',1),
	(31,'Nochmal','Malnoch','mal@nochmal.at',NULL,'1993-02-23','d830d61ec3f1c9590196c7f1782548382f0a4f1c:44999',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487860952',1),
	(32,'Hannah','Nochmal','hannah@nochmal.at','0','1993-03-12','2adf22f130fb054cbdf8b987a7da64edaf62b3c0:59207',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487867120',1),
	(33,'Again','Again','again@again.com','0','1032-12-12','7af79e3bd757f11a88cbe44ca3a0dd60f17bf777:18641',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487867216',1),
	(34,'Bla','bakba','bla@bla.at','on','1992-12-12','59cc850995d17fb907aec0a9792b34bdcd37ea0a:46407',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487867251',1),
	(35,'Off','off','off@off.at','on','1992-03-12','304fbf56722f1d0ffc64aeeb088bd21ce02d99b3:29770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487867275',0),
	(36,'Off2','off2','off@off2.at','off','1923-11-12','589a80d62e20c39a7e3066cb558aaf6e117f2c3b:72764',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1487867296',0),
	(37,'Hannah','Schott','admin@admin.at','on','1995-08-14','e7d584da1fbf769a00a18729e2b47f475161a83f:10214',':Angererstraße::10::1210::Wien::Österreich:','zahlschein',NULL,2,1488991337,1,'mistress,castle-pink,black,party,dress,large',2,'1488098085',1),
	(38,'Lala','Schott','lala@schott.at','off','1760-01-05','bcc99796f6af4f174edfae2af0632cb2dee45b3d:37489',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1488101103',1),
	(39,'Hannah','Schott','hannah@test.com','on','1995-08-14','4db3f2cb11d84c4f6f2287e6134883056f52c4c2:51717',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1488471241',1),
	(40,'Alex','Alex','alex@world.com','on','3123-12-12','320a1ab26ce1c19cccf8fa3a4ebb7691a3d24fc6:92037',NULL,NULL,NULL,NULL,NULL,NULL,'',1,'1488471378',1),
	(42,'Supertoll','Regenbogen','einhorn@regenbogen.at','off','2001-01-01','bbbc4a83a72338105197420868f8aa71cc5b5480:72318',':Regenbogenallee::20::1060::Wien::Österreich:','zahlschein',NULL,2,1488906291,NULL,NULL,1,'1488904530',1),
	(43,'Peter','Pan','peter@hook.at','on','2017-12-12','c6ba980bda247474099f4649815db3599c77bcc6:79063',':Nimmerland::12::1210::Wien::Österreich:','paypal',NULL,3,1489069971,3,NULL,1,'1489069883',1),
	(44,'Laura','Winkler','laura@winkler.at','on','1996-01-12','cae80703e5abd7cc4110f49b0b46ea51f708e665:62076',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1489085569',0),
	(46,'Aurora','Röschen','aurora@rose.at','off','1895-08-15','7c4cdf86370aff6a728a5ace52dc2ef335735b5a:90629',':Großes Schloss::10::1010::Wien::Österreich:','zahlschein',NULL,1,1489087435,NULL,NULL,1,'1489086414',1),
	(54,'Alexandra','Benkö','alexandra.benkoe@gmail.com','on','1992-08-30','3652b25c75f249afd75e9aef69682f053f1de6eb:21314',NULL,NULL,'58c54dd377d42',NULL,NULL,NULL,NULL,1,'1489325523',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
