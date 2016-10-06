-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Octobre 2016 à 09:08
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `imiesphere_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `street_number` varchar(8) DEFAULT NULL,
  `building` varchar(35) DEFAULT NULL,
  `address_name` varchar(25) DEFAULT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `address`
--

INSERT INTO `address` (`id_address`, `street`, `street_number`, `building`, `address_name`, `id_city`) VALUES
(1, 'rue st helier', '14', NULL, 'le shamrock', 1),
(2, 'la haie gautrais', NULL, NULL, 'kart-expo', 2),
(3, 'zone de millet', NULL, NULL, 'bowling', 9),
(4, 'zone de millet', NULL, NULL, 'mega cgr', 9),
(5, 'rue d\'antrain', '34', NULL, 'bar A vos mousses', 1),
(6, 'rue de lorient', '222', 'parking', 'V and B', 1),
(7, 'rue Pierre de Maupertuis', NULL, NULL, 'IMIE', 2);

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `postal_code` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`id_city`, `city_name`, `postal_code`) VALUES
(1, 'rennes', 35000),
(2, 'bruz', 35170),
(4, 'pace', 35740),
(5, 'nantes', 44000),
(7, 'st gregoire', 35760),
(8, 'montauban-de-bretagne', 35360),
(9, 'la meziere', 35520),
(10, 'acigne', 35690);

-- --------------------------------------------------------

--
-- Structure de la table `cost`
--

CREATE TABLE `cost` (
  `id_registration` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cost`
--

INSERT INTO `cost` (`id_registration`, `id_payment`, `id_role`) VALUES
(1, 1, 2),
(3, 1, 2),
(6, 1, 3),
(7, 1, 3),
(2, 2, 2),
(4, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_description` text,
  `event_start` datetime NOT NULL,
  `event_end` datetime DEFAULT NULL,
  `id_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id_event`, `event_name`, `event_description`, `event_start`, `event_end`, `id_address`) VALUES
(1, 'soiree cine', 'rdv devant le cinema pour un super film tous ensemble!', '2016-10-01 20:30:00', '2016-10-01 22:30:00', 4),
(2, 'bowling', 'soiree bowling! Il y aura un cadeau pour l\'equipe qui gagnera...', '2016-11-01 21:30:00', '2016-11-01 23:30:00', 3),
(3, 'sortie en ville', 'rdv apres les cours, venez nombreux!', '2016-09-25 17:30:00', '2016-09-25 23:45:00', 1),
(4, 'bowling', 'une autre soiree bowling!', '2017-01-14 21:30:00', '2017-01-14 23:30:00', 3),
(5, 'soiree cine', 'super film', '2016-11-10 20:30:00', '2016-11-10 22:30:00', 4),
(6, 'une soiree', '', '2016-01-05 19:30:00', '2016-11-05 23:30:00', 1),
(7, 'une autre soiree', 'un commentaire', '2017-01-06 19:30:00', '2017-01-06 23:30:00', 5),
(8, 'encore une soiree', '...', '2016-01-07 19:30:00', '2016-11-07 23:30:00', 5),
(9, 'un evenement', 'un super commentaire', '2016-11-08 19:30:00', '2016-11-08 23:30:00', 6),
(10, 'nouvel an!', 'bonne annee!', '2016-12-31 23:30:00', '2017-01-01 00:30:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `event_type_event`
--

CREATE TABLE `event_type_event` (
  `id_event` int(11) NOT NULL,
  `id_type_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event_type_event`
--

INSERT INTO `event_type_event` (`id_event`, `id_type_event`) VALUES
(1, 1),
(3, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(2, 2),
(4, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `grade_name` varchar(25) NOT NULL,
  `promotion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`id_grade`, `grade_name`, `promotion`) VALUES
(1, 'GEN', '2016'),
(2, 'ITStart', '2016-2017'),
(3, 'DL', '2016-2017'),
(4, 'ITStart', '2015-2016'),
(5, 'CPCSI', '2016-2017'),
(6, 'CDPNL3', '2016-2017'),
(7, 'CDPNM1', '2016-2017'),
(8, 'RISRL3', '2015-2016'),
(9, 'CPCSI', '2014-2015'),
(10, 'CDPNL3', '2015-2016');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `payment`
--

INSERT INTO `payment` (`id_payment`, `price`) VALUES
(1, '0.00'),
(2, '15.00'),
(3, '20.00'),
(4, '30.00');

-- --------------------------------------------------------

--
-- Structure de la table `registration`
--

CREATE TABLE `registration` (
  `id_registration` int(11) NOT NULL,
  `max_place` int(11) DEFAULT NULL,
  `registration_start` datetime NOT NULL,
  `registration_end` datetime DEFAULT NULL,
  `pre_registration` datetime DEFAULT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `registration`
--

INSERT INTO `registration` (`id_registration`, `max_place`, `registration_start`, `registration_end`, `pre_registration`, `id_event`) VALUES
(1, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 1),
(2, 10, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 2),
(3, 50, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 3),
(4, 350, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 4),
(5, 150, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 5),
(6, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 6),
(7, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 7),
(8, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 8),
(9, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 9),
(10, 100, '2016-08-31 10:30:00', '2016-09-05 10:30:00', '2016-08-31 10:30:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'administrateur'),
(2, 'adherent'),
(3, 'non-adherent');

-- --------------------------------------------------------

--
-- Structure de la table `type_event`
--

CREATE TABLE `type_event` (
  `id_type_event` int(11) NOT NULL,
  `type_event_name` varchar(25) NOT NULL,
  `type_event_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_event`
--

INSERT INTO `type_event` (`id_type_event`, `type_event_name`, `type_event_description`) VALUES
(1, 'soiree en bar', ''),
(2, 'karting', 'aller faire du karting'),
(3, 'cine', 'aller au cinema'),
(4, 'bowling', 'aller faire du bowling');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `membership_number` varchar(25) DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `id_grade` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `membership_number`, `firstname`, `lastname`, `email`, `phone`, `password`, `id_grade`, `id_role`) VALUES
(1, NULL, 'dereck', 'daniel', 'da.derec@mail.com', '0607080900', 'bonjoir', 1, 1),
(2, '57eb9c23d45b0', 'delphine', 'bourdelle', 'delphine.b@mail.fr', '0607086789', 'bonjoir', 1, 2),
(3, NULL, 'emeline', 'hourmand', 'e.h@mail.fr', '0608600083', 'bonjoir', 1, 3),
(4, NULL, 'maxime', 'theard', 'm.theard@mail.com', '0606065419', 'salut', 1, 3),
(5, NULL, 'maxime', 'gabriel', 'gabriel.m@mail.com', '0605040342', 'coucou', 1, 3),
(6, '57eb8b610b6e9', 'jerome', 'alincourt', 'jerome.a@mail.com', '0606060708', 'blouge', 1, 2),
(7, NULL, 'jerome', 'pavic', 'jerome.p@mail.com', '0607080910', 'bonjoir', 1, 1),
(8, '57ebdb2b4777a', 'boris', 'drouin', 'boris.d@mail.com', '0605070401', 'salut', 1, 2),
(11, '57ebdb3923955', 'kevin', 'henkes', 'kh@mail.com', '0706050403', 'password', 1, 2),
(12, NULL, 'antoine', 'cronier', 'antoinecro@mail.com', '0606060606', 'pwDfmlmp65DG', NULL, 1),
(13, NULL, 'admin', 'admin', 'admin@imie.com', '', '123', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_registration`
--

CREATE TABLE `user_registration` (
  `id_user` int(11) NOT NULL,
  `id_registration` int(11) NOT NULL,
  `unsubscribe` tinyint(1) DEFAULT NULL,
  `date_time_registration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_registration`
--

INSERT INTO `user_registration` (`id_user`, `id_registration`, `unsubscribe`, `date_time_registration`) VALUES
(1, 1, 0, '2016-09-01 10:30:00'),
(1, 2, NULL, '2016-09-28 12:37:12'),
(1, 4, NULL, '2016-09-28 12:37:00'),
(1, 5, NULL, '2016-09-28 12:37:03'),
(1, 7, 0, '2016-09-01 10:35:00'),
(2, 2, 0, '2016-09-01 10:32:00'),
(3, 1, 0, '2016-09-01 11:30:00'),
(4, 2, 0, '2016-09-01 12:30:00'),
(4, 3, 0, '2016-09-01 10:33:00'),
(7, 1, 1, '2016-09-02 10:40:00'),
(7, 2, NULL, '2016-09-28 16:57:50'),
(7, 7, NULL, '2016-09-30 09:43:20'),
(7, 9, NULL, '2016-09-28 18:02:09'),
(7, 10, NULL, '2016-09-30 09:43:11'),
(13, 1, NULL, '2016-09-28 02:13:19'),
(13, 4, NULL, '2016-09-28 11:45:11'),
(13, 5, NULL, '2016-09-28 11:45:24'),
(13, 9, NULL, '2016-09-28 18:07:04');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `FK_address_id_city` (`id_city`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Index pour la table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id_registration`,`id_payment`,`id_role`),
  ADD KEY `FK_cost_id_payment` (`id_payment`),
  ADD KEY `FK_cost_id_role` (`id_role`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `FK_event_id_address` (`id_address`);

--
-- Index pour la table `event_type_event`
--
ALTER TABLE `event_type_event`
  ADD PRIMARY KEY (`id_event`,`id_type_event`),
  ADD KEY `FK_event_type_event_id_type_event` (`id_type_event`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Index pour la table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id_registration`),
  ADD KEY `FK_registration_id_event` (`id_event`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `type_event`
--
ALTER TABLE `type_event`
  ADD PRIMARY KEY (`id_type_event`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `membership_number` (`membership_number`),
  ADD KEY `FK_user_id_grade` (`id_grade`),
  ADD KEY `FK_user_id_role` (`id_role`);

--
-- Index pour la table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id_user`,`id_registration`),
  ADD KEY `FK_user_registration_id_registration` (`id_registration`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `registration`
--
ALTER TABLE `registration`
  MODIFY `id_registration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_event`
--
ALTER TABLE `type_event`
  MODIFY `id_type_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_address_id_city` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`);

--
-- Contraintes pour la table `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `FK_cost_id_payment` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`),
  ADD CONSTRAINT `FK_cost_id_registration` FOREIGN KEY (`id_registration`) REFERENCES `registration` (`id_registration`),
  ADD CONSTRAINT `FK_cost_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_event_id_address` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`);

--
-- Contraintes pour la table `event_type_event`
--
ALTER TABLE `event_type_event`
  ADD CONSTRAINT `FK_event_type_event_id_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `FK_event_type_event_id_type_event` FOREIGN KEY (`id_type_event`) REFERENCES `type_event` (`id_type_event`);

--
-- Contraintes pour la table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `FK_registration_id_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_id_grade` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`),
  ADD CONSTRAINT `FK_user_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `user_registration`
--
ALTER TABLE `user_registration`
  ADD CONSTRAINT `FK_user_registration_id_registration` FOREIGN KEY (`id_registration`) REFERENCES `registration` (`id_registration`),
  ADD CONSTRAINT `FK_user_registration_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
