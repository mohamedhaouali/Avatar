-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mars 2019 à 14:01
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avatar`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateaux`
--

DROP TABLE IF EXISTS `bateaux`;
CREATE TABLE IF NOT EXISTS `bateaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typevol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datedepart` date NOT NULL,
  `villededepart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typecabine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typevehicule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adulte` int(11) NOT NULL,
  `enfant` int(11) NOT NULL,
  `bebe` int(11) NOT NULL,
  `nourissons` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `villearrive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seniors` int(11) NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `civilite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7C4CAD939194ABF` (`civilite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateentree` datetime NOT NULL,
  `datesortie` datetime NOT NULL,
  `nombrechambre` int(11) NOT NULL,
  `typechambre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arrangement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreadulte` int(11) NOT NULL,
  `nombreenfants` int(11) NOT NULL,
  `nombrebebes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `dateentree`, `datesortie`, `nombrechambre`, `typechambre`, `arrangement`, `nombreadulte`, `nombreenfants`, `nombrebebes`) VALUES
(12, '2019-03-15 00:00:00', '2019-03-23 00:00:00', 1, 'Chambre standard', 'dddddddd', 2, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

DROP TABLE IF EXISTS `civilite`;
CREATE TABLE IF NOT EXISTS `civilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `civilite`
--

INSERT INTO `civilite` (`id`, `civilite`) VALUES
(5, 'Mr'),
(6, 'Mlle'),
(7, 'Mmme');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `classe`) VALUES
(4, 'Economique'),
(5, 'Première'),
(6, 'Business');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valider` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `reference` int(11) NOT NULL,
  `produits` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `valider`, `date`, `reference`, `produits`, `utilisateur_id`) VALUES
(1, 1, '2019-03-27 14:07:19', 1, 'a:3:{i:0;a:1:{i:1;s:1:\"2\";}i:1;a:1:{i:2;s:1:\"1\";}i:2;a:1:{i:4;s:1:\"5\";}}', 19),
(2, 1, '2019-03-27 14:07:19', 2, 'a:3:{i:0;a:1:{i:1;s:1:\"2\";}i:1;a:1:{i:2;s:1:\"1\";}i:2;a:1:{i:4;s:1:\"5\";}}', 21);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sujet` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `notif` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `titre`, `description`, `prix`, `notif`, `path`, `path1`) VALUES
(46, 'Publishing software like Aldus', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'\r\n\r\nwhen an unknown printer took a s that it has galley of type and scrambled it to make a type', 0, 1, '1.jpg', 'http://www.avatar.tn/belgrade'),
(47, 'There are many variations', 'he point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'\r\n\r\nwhen an unknown printer took a s that it has galley of type and scrambled it to make a type\r\n\r\n*The Booking detials for must be Ipsum is that it has.', 0, 0, '2.jpg', 'http://www.avatar.tn/portugal'),
(48, 'Lorem Ipsum is that it has', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'\r\n\r\nwhen an unknown printer took a s that it has galley of type and scrambled it to make a type\r\n\r\n*The Booking detials for must be Ipsum is that it has.', 0, 0, '3.jpg', 'http://www.avatar.tn/madrid'),
(49, 'Lorem Ipsum is that it has', 'he point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\' when an unknown printer took a s that it has galley of type and scrambled it to make a type *The Booking detials for must be Ipsum is that it has.', 0, 0, '4.jpg', 'http://www.avatar.tn/bruxelle'),
(50, 'Lorem Ipsum is that it has', 'he point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\' when an unknown printer took a s that it has galley of type and scrambled it to make a type *The Booking detials for must be Ipsum is that it has.', 0, 0, '5.jpg', 'http://www.avatar.tn/portugal'),
(51, 'Lorem Ipsum is that it has', 'he point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\' when an unknown printer took a s that it has galley of type and scrambled it to make a type *The Booking detials for must be Ipsum is that it has.', 0, 0, '6.jpg', 'http://www.avatar.tn/barcelone');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `prix`, `disponible`) VALUES
(19, 'Thé de Ceylan - Ceylan O.P. Finest', 'Une feuille entière donnant une infusion légère, parfait pour le thé de cinq heures. ', 5.5, 1),
(20, 'Thé Noir - Thé des Mille Collines', 'Si les paysages rwandais, verts et ondoyants, inspirent la douceur, le thé l à-bas se boit corsé. Il allie la force d\'un thé noir du Rwanda et le parfum de fines épices: gingembre, cannelle, cardamome, baies roses et girofle. Il pourra être consommé nature, avec un nuage de lait ou encore infusé directement dans du lait.', 7.5, 1),
(21, 'Thé Noir - Amore', 'Attendu comme un baiser, doux comme une promesse \"Amore\" à sa façon, célèbre l\'amour avec délicatesse. Un thé noir, des pétales de fleurs, des notes poudrées d\'amande grillée, d\'héliotrope et de chocolat, des huiles essentielles de bergamote, de rose et de poivre, invitent les amoureux dans le partage d\'une ronde suave et parfumée.', 7, 1),
(22, 'Thé du Sikkim - Sikkim G.F.O.P. Temi In Between', 'Petit Royaume situé dans l’Himalaya produisant un seul «Grand Jardin» : TEMI. Une récolte de printemps remarquable, thé « between » oscillant entre la primeur des First Flush et la longueur en bouche des Second Flush, selon le temps d’infusion choisit. Nature l’après midi ou le soir.', 8, 1),
(23, 'Thé du Népal - Mist Valley T.G.F.O.P.', 'Superbe lot pour cette plantation située sur les contreforts de l’Himalaya. feuilles superbes et régulières possédant de nombreuses pointes argentées et dorées !Tasse à la liqueur douce, mûre, possédant des notes similaires aux Darjeeling. Un pur moment de bonheur et d’évasion. ', 15, 1),
(24, 'Thé noir - Indian Breakfast', 'Mélange de thé en provenance de plantations biologiques de Darjeeling et d’Assam. Arôme robuste, malté et corsé de l’Assam, aLié à l’arôme plus suave et floral du Darjeeling. Un délicieux mélange corsé. Peut convenir l’après midi avec une infusion réduite ou bien le matin avec du lait.', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(19, 'med', 'med', 'mohamed.haoili@gmail.com', 'mohamed.haoili@gmail.com', 1, NULL, '$2y$13$F8ZEKJfBVmL3gEK8TGEAG.RODpnuNtgyB0WTENfgjpFHO1/LNHijW', NULL, NULL, NULL, 'a:0:{}'),
(24, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, NULL, '$2y$13$7OojIb3ZDo5R9YEVWquYpO3zukFC1a3P3xAOGfPgsBpF/oJxmylzS', '2019-03-28 16:24:35', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(25, 'med1', 'med1', 'mohamed.haouali1@gmail.com', 'mohamed.haouali1@gmail.com', 1, NULL, '$2y$13$Xse870WuKD0Db7hhsR.daus7yzGFX6CgWCRQxfR1J0kxspQrmOM8S', '2019-03-28 16:21:13', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_adress`
--

DROP TABLE IF EXISTS `utilisateurs_adress`;
CREATE TABLE IF NOT EXISTS `utilisateurs_adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `complement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_710DA0B6FB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typevol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datedepart` date NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aeroportdedepart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aeroportdarrive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreadultes` int(11) NOT NULL,
  `nombreenfant` int(11) NOT NULL,
  `nombrebebes` int(11) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `civilite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95C97EB8F5EA509` (`classe_id`),
  KEY `IDX_95C97EB39194ABF` (`civilite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

DROP TABLE IF EXISTS `voyage`;
CREATE TABLE IF NOT EXISTS `voyage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datedevoyage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id`, `titre`, `datedevoyage`, `prix`, `path`, `path1`) VALUES
(20, 'CASABLANCA /RABAT /MARRAKECH 23/03/2019 AU 29/03/2019', '7 jours(s) /6 nuit(s)', 1990, 'casa.jpg', 'http://www.avatar.tn/casa'),
(21, 'PRAGUE / VIENNE / BRATISLAVA Du 19/03/19 Au 26/03/19', '8 jours(s) /7 nuit(s)', 2690, 'prague.jpg', 'http://www.avatar.tn/prague'),
(22, 'BARCELONE MARS 2019 DU 20/03/19 AU 24/03/19', '5 jours(s) /4 nuit(s)', 1950, 'barca1.jpg', 'http://www.avatar.tn/barcelone'),
(23, 'BEYROUTH 24/03/2019 AU 29/03/2019', '6 jours(s) /5 nuit(s)', 1990, 'BEYROUTH.jpg', 'http://www.avatar.tn/beyrouth'),
(24, 'BELGRADE / ZLATIBOR (Station De Ski)19/03/2019 - 26/03/2019', '8 jours(s) /7 nuit(s)', 2390, 'belgrade.jpg', 'http://www.avatar.tn/belgrade'),
(25, 'ROME / FLORENCE /PISE/ VENISE Du 24/03/18 Au 30/03/19', '7 jours(s) /6 nuit(s)', 2690, 'italie.jpg', 'http://www.avatar.tn/rome'),
(26, 'MADRID ANDALOUSIE 25/03/2019 – 31/03/2019', '7 jours(s) /6 nuit(s)', 2790, 'madrid.jpg', 'http://www.avatar.tn/madrid'),
(27, 'CIRCUIT PORTUGAL 23/03/19 AU 30/03/19', '8 jours(s) /7 nuit(s)', 2790, 'portugal2.jpg', 'http://www.avatar.tn/portugal'),
(28, 'PARIS / BRUXELLES/AMSTERDAM 23/03/19 AU 29/03/18', '7 jours(s) /6 nuit(s)', 2790, 'paris1.jpg', 'http://www.avatar.tn/bruxelle'),
(29, 'INDE & ISTANBUL DU 20/03/19 AU 29/03/19', '10 jours(s) /9 nuit(s)', 4490, 'istanbul.jpg', 'http://www.avatar.tn/inde'),
(30, 'PARIS MARS 2019 20/03/19 AU 25/03/19', '6 jours(s) /5 nuit(s)', 2590, 'paris2.jpg', 'http://www.avatar.tn/paris'),
(31, 'NICE / CANNES/MONACO 20/03/2019 AU 24/03/2019', '5 jours(s) /4 nuit(s)', 1790, '7.jpg', 'http://www.avatar.tn/nice');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bateaux`
--
ALTER TABLE `bateaux`
  ADD CONSTRAINT `FK_7C4CAD939194ABF` FOREIGN KEY (`civilite_id`) REFERENCES `civilite` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `utilisateurs_adress`
--
ALTER TABLE `utilisateurs_adress`
  ADD CONSTRAINT `FK_710DA0B6FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `FK_95C97EB39194ABF` FOREIGN KEY (`civilite_id`) REFERENCES `civilite` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_95C97EB8F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
