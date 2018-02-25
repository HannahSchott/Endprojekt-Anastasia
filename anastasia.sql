-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 26, 2018 at 12:16 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anastasia`
--
CREATE DATABASE IF NOT EXISTS `anastasia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `anastasia`;

-- --------------------------------------------------------

--
-- Table structure for table `abos`
--

DROP TABLE IF EXISTS `abos`;
CREATE TABLE `abos` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text,
  `costs_per_month` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abos`
--

INSERT INTO `abos` (`id`, `name`, `costs_per_month`) VALUES
(1, '3-Monate', 15),
(2, '6-Monate', 13),
(3, '1-Jahr', 12);

-- --------------------------------------------------------

--
-- Table structure for table `anastasia`
--

DROP TABLE IF EXISTS `anastasia`;
CREATE TABLE `anastasia` (
  `id` int(11) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `question` text,
  `answer_text` text,
  `answer_imgs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anastasia`
--

INSERT INTO `anastasia` (`id`, `page_id`, `question`, `answer_text`, `answer_imgs`) VALUES
(1, 2, 'Es war einmal eine wunderschöne . . .', ':. . . Prinzessin::. . . Königin::. . . Mätresse:', ':princess::queen::mistress:'),
(2, 3, 'Die wohnte in einem großen Schloss das ganz in ihrer lieblings Farbe gestirchen war . . .\n', NULL, ':castle-yellow::castle-orange::castle-red::castle-pink::castle-purple::castle-blue::castle-darkblue::castle-green::castle-black:'),
(3, 4, 'Sie hatte fantastische Haare in der Farbe. . .', ':. . . blond::. . . braun::. . . schwarz::. . . rot:', ':blond::brown::black::red:'),
(4, 5, 'Eines Tages veranstaltete der Prinz . . .', ':. . .eine riesige Party::. . .einen gemütlichen Filmabend::. . .ein romantisches Date:', ':party::cinema::romantic:'),
(5, 6, 'Sie wollte unbedingt hin gehen und machte sich gleich fertig! Es war ihr sofort klar was sie tragen wollte. . .', NULL, ':dress::fancy::cosy:'),
(6, 7, 'Sie benutze die selben Produkte wie immer. . .', NULL, ':large::small::medium:'),
(7, 8, 'Sie sah toll aus und strahlte denn sie war ganz sie selbst. Der Abend war ein voller erfolg und sie hatte sehr viel Spaß!', NULL, ':smile_1::smile_2::smile_3:'),
(8, 9, 'Und schon bald liegt dein kleines Anastasia-Märchen vor deiner Türe! Wir hoffen es ist ganz nach deinem Geschmack, so wie dieser Abend es war…', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `box-type`
--

DROP TABLE IF EXISTS `box-type`;
CREATE TABLE `box-type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `box-type`
--

INSERT INTO `box-type` (`id`, `name`) VALUES
(1, 'Königin'),
(2, 'Prinzessin'),
(3, 'Mätresse');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Augen', 'augen'),
(2, 'Haare', 'haare'),
(3, 'Nägel', 'nägel'),
(4, 'Lippen', 'lippen'),
(5, 'Körper', 'körper'),
(6, 'Gesicht', 'gesicht');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user-id` int(11) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `product-id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user-id`, `content`, `product-id`, `created_at`) VALUES
(1, 1, 'Die Haare fühlen sich nach dem waschen schwer und fettig an. Ich bin nicht überzeugt.', 24, 1519599706),
(2, 3, 'Super süßes Armband! Passt perfekt zu den Zwergen.', 27, 1519600131),
(3, 3, 'Nicht so deckend wie gehofft man sieht das Blutrot immer noch durch...', 1, 1519600237);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `sent_at` int(30) DEFAULT NULL,
  `answered_at` int(30) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `email`, `subject`, `message`, `sent_at`, `answered_at`, `is_active`) VALUES
(1, 1, 'admin@mail.at', 'Produkte', 'Wo sehe ich den Bestellstatus meines Abos?', 1519599411, 1519599880, 1),
(2, 3, 'sieben@zwerge.at', 'Abo', 'Habt ihr auch ein sieben Monate Abo?', 1519600171, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `abo_id` int(11) DEFAULT NULL,
  `date-ordered` int(11) NOT NULL,
  `order-status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `abo_id`, `date-ordered`, `order-status`, `is_active`) VALUES
(1, 1, 3, 1519599289, 3, 1),
(2, 3, 2, 1519600052, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
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
  `is_active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `main_img`, `product_link`, `price`, `categories-id`, `comments_rating`, `rating_count`, `rated_by`, `boxes-id`, `month_id`, `is_active`) VALUES
(1, 'Kylie Jenner - LipKit', 'kyliejennerlipkit', 'Das KylieCosmetics LipKit ist deine Geheimwaffe um einen perfekten \'Kylie Lip\'-Look zu kreieren. Jeder LipKit kommt mit einem matten Liquid-Lipstick und einem passenden Lip-Liner.\r\n\r\nDieser ultra langanhaltender Lip-Liner hat eine kremige texture die das Auftragen auf die Lippen einfach und komfortabel macht. Der Lip-Liner kann kann ganz einfach in jedem herkömlichen Spitzer gespitzt werden.', 'lipkit.png', 'https://www.kyliecosmetics.com', 20, 4, '2.5', 2, ':1::3:', NULL, '02.18', 1),
(2, 'Urban Decay - Naked Basics', 'urbandecaynakedbasics', 'Die erste MATTE palette, ethält sechs wundervolle Naked Nudefarben zum aufbauen oder alleine tragen. Naked Basic ist mehr als der lang erwartete, vielzweck, MATTE Begleiter zu Naked. \r\n\r\nEs ist die Palette die JEDE Frau in ihrem Beautyarsenal braucht. Mit sechs Nakedly-Neutral-Schattierungen, hat sie alles was du brauchst für dein perfektes, neutralles, mattes Augenmakeup - mit vier absolut neuen und exklusiven Tönen.  ', 'naked.png', 'http://www.urbandecay.com', 26, 1, NULL, NULL, NULL, NULL, '03.17', 1),
(3, 'Anastasia - Contour Kit', 'anastasiacontourkit', 'Das best verkaufte Set, mit drei highlitern und drei Konturschattierungen on einem Must-Have-Kit. Anastasia\'s Contour Cream Kit formt, definiert und hebt die Knochenstruktur und dein natürlichen Featrues hervor.\r\n\r\nEs lässt sich leicht blenden und verschmiltz Sanft. Dank Satin-Finish kannst du die Illusion von höheren Wangenknochen, einer schmaleren Nase, sanftere Konturen, eine kleinere Stirn einfach krieren. Erhältlich in 4 Schattierungen.', 'contourkit.png', 'http://www.anastasiabeverlyhills.com', 30, 6, NULL, NULL, NULL, NULL, '03.17', 1),
(4, 'Cliniqu - Eyeliner', 'cliniqueeyeliner', 'Der Eyeliner von Clinique erzeugt eine klare Linie in einem Schwung. Die zugespitzte, präzise Bürste sorgt für reine, starke Farbe, entweder in einer dünnen oder einer dicken Linie. \n\n24 Stunden schmutz- und wischfest. Augenärztlich getestet. Allergiegetestet. 100% parfumfrei.', 'clinque-eyeliner.jpeg', 'http://www.clinique.at/', 22, 1, NULL, NULL, NULL, NULL, '03.17', 1),
(5, 'MaxFactor - Maskara', 'maxfactormaskara', 'Dieser Mascara von Max Factor verschafft Ihnen einen atemberaubenden Augenaufschlag, bis zur letzten Wimper. Die schwarze Wimperntusche ist auch bestens für sensible Kontaktlinsenträgerinnen geeignet.', 'maxfactor_mascara.jpeg', 'http://maxfactor.de/', 20, 1, NULL, NULL, NULL, NULL, '03.17', 1),
(6, 'Zoeva - Pinsel', 'zoevapinsel', 'Inspiriert von der Magie der Farben Pink und Gold haben wir unser neues Rose Golden Luxury Set entwickelt – eine Komposition aus acht luxuriösen, handgefertigten Pinseln, verstaut in einer chic-eleganten Clutch. \n\nDie Pinsel eignen sich sowohl für die tägliche Makeup-Routine als auch für extravagante Looks. Feinstes Echthaar und synthetische Taklon-Haare ermöglichen eine göttlich-sanfte Anwendung mit cremigen und pudrigen Texturen.', 'zoeva_brushes.jpg', 'https://www.zoevacosmetics.com/europe1/de', 75, 6, NULL, NULL, NULL, NULL, '03.17', 1),
(21, 'Maybelline - Fit Me MakeUp', 'maybellinefitmemakeup', 'Das Make-up von Maybelline eignet sich für normale bis fettige Haut und zaubert ein ebenmäßiges und mattes Hautbild, ohne Ränder. Die mikrofeinen Puderpigmente kaschieren die Poren, ohne sie zu verstopfen. Es passt sich ideal an den Hautton sowie der Hauttextur an.', 'maybellinemakeup.png', 'https://www.maybelline.de/', 30, 6, '3.0', 2, ':1::3:', NULL, '02.18', 1),
(22, 'NYX Professional - Highlighter Illuminato', 'nyxprofessionalhighlighterilluminato', 'Für einen strahlenden Teint voller Frische: Mit dem NYX Professional Makeup Illuminator Narcissistic 1 lassen sich schimmernde Hightlights ganz einfach zaubern. Er lässt z.B. die Wangen, Schläfen und die Brauenbogen natürlich leuchten und schafft einen strahlenden Glanz.', 'nyxprofessionalhighlighter.png', 'http://www.nyxcosmetics.com/', 20, 6, NULL, NULL, NULL, NULL, '04.17', 0),
(23, 'Dove - Körperlotion Derma Spa', 'dovekörperlotiondermaspa', 'Für samtweiche, ausgeglichene und strahlende Haut: Die Derma Spa Body Lotion Intensiv Verwöhnend von Dove wurde speziell für trockene Haut entwickelt. Sie pflegt tiefenwirksam mit Omega-Öl und unterstützt nachhaltig den Feuchtigkeitshaushalt im Inneren der Hautzellen.', 'dovebodylotion.png', 'http://www.dove.com/at/home.html', 15, 5, NULL, NULL, NULL, NULL, '04.17', 1),
(24, 'Garnier - Shampoo Mythische Olive', 'garniershampoomythischeolive', 'In Wahre Schätze Mythische Olive wirkt die Formel mit der Kraft des Olivenöls und reinigt, pflegt und glättet das ausgetrocknete Haar – ohne es zu beschweren. Der sinnliche Duft aus einer fruchtigen Note von Orange und Zitrone geht in die warme Sinnlichkeit von Vanille und Moschus über.', 'garnieshampoo.png', 'http://www.garnier.de/', 10, 2, '2.5', 2, ':1::3:', NULL, '02.18', 1),
(25, 'Essie - Nagellack', 'essienagellack', 'Nagellacks stärkt die Nägel und gleicht Unebenheiten aus. Der Fächerpinsel deckt in nur einem Zug ab.', 'essienagellack.png', 'http://www.essie.de/', 10, 3, NULL, NULL, NULL, NULL, '04.17', 1),
(26, 'Urban Decay - Naked Heat', 'urbandecaynakedheat', 'Wenn Du unsere bisherigen NAKED-Paletten schon aufregend heiß findest, musst Du jetzt ganz stark sein: Urban Decay präsentiert NAKED HEAT – die HOTTESTE Lidschattenpalette des Jahres. Jede Wette: Wer diese 12 BRANDNEUEN Bernstein-Nuancen zum ersten Mal sieht, ist garantiert sofort Feuer und Flamme! ', 'naked_heat.jpg', 'https://www.urban-decay.at', 55, 1, '4.0', 2, ':1::3:', NULL, '02.18', 1),
(27, 'Cajoy - Armschmuck', 'cajoyarmschmuck', 'Wickelarmband in frischen Farben, als perfektes Accessoire für frühlingshafte Outfits.', 'wickelarmband.jpg', 'https://www.marionnaud.at', 20, 5, '4.0', 2, ':1::3:', NULL, '02.18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
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
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `newsletter`, `birthday`, `pw`, `adress`, `payment`, `hash`, `abo-id`, `abo-timestamp`, `box-type_id`, `box_answers`, `user_group`, `created_at`, `is_active`) VALUES
(1, 'Supertoll', 'Admin', 'admin@admin.at', 'off', '1995-08-14', '829bdfab7faab208e5c6a4cc2575268d8d1a4877:41839', ':Adminstraße::12::1210::Wien::Österreich:', 'sofortüberweisung', '5a933e7fecf20', 3, 1519599289, NULL, NULL, 2, '1519599231', 1),
(3, 'Schnee', 'Witchen', 'sieben@zwerge.at', 'on', '1997-07-07', 'db25057c95fa7157339eb63900e1af3c796c609e:25435', ':Hinterm Berg::7::1070::Wien::Österreich:', 'zahlschein', '5a934197b2f48', 2, 1519600052, 1, 'mistress,castle-green,black,romantic,cosy,small', 1, '1519600023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abos`
--
ALTER TABLE `abos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anastasia`
--
ALTER TABLE `anastasia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box-type`
--
ALTER TABLE `box-type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abos`
--
ALTER TABLE `abos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `anastasia`
--
ALTER TABLE `anastasia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `box-type`
--
ALTER TABLE `box-type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
