-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 16 Septembre 2016 à 15:46
-- Version du serveur :  5.6.30
-- Version de PHP :  7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `EmploiDirect`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enterprises`
--

CREATE TABLE IF NOT EXISTS `enterprises` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `enterprises`
--

INSERT INTO `enterprises` (`id`, `name`, `email_address`, `password`) VALUES
(1, 'Singe', 'Singe', 'Singe');

-- --------------------------------------------------------

--
-- Structure de la table `Offers`
--

CREATE TABLE IF NOT EXISTS `Offers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `publicationBeginningDate` date NOT NULL,
  `publicationEndDate` date NOT NULL,
  `jobName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayDate` date NOT NULL,
  `responsabilitties` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `aptitudes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strengths` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generalRemark` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scholarity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobSituation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jobBeginningDate` date NOT NULL,
  `enterprise_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Offers`
--

INSERT INTO `Offers` (`id`, `name`, `description`, `publicationBeginningDate`, `publicationEndDate`, `jobName`, `displayDate`, `responsabilitties`, `aptitudes`, `requirements`, `strengths`, `generalRemark`, `scholarity`, `sector`, `job`, `jobType`, `jobSituation`, `jobBeginningDate`, `enterprise_id`) VALUES
(3, 'eerererw', 'rewerwerwer weijeerw ouierh ewhuerwh uwer huwer uire weewruhr euiewrhe', '2016-09-09', '2016-09-09', 'ewrrewerw wrehew rhrhew', '2016-09-09', 'erwerw', 'erwewr', 'erwer', 'reerwerw', 'ewrerw', 'erwwererw', 'erwrewe', 'werew', 'rewerw', '1', '2016-09-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `postulations`
--

CREATE TABLE IF NOT EXISTS `postulations` (
  `id` int(11) NOT NULL,
  `idCandidate` int(11) NOT NULL,
  `idOffer` int(11) NOT NULL,
  `DatePostulation` date NOT NULL,
  `CV` varchar(50) NOT NULL,
  `PresentationLetter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Offers`
--
ALTER TABLE `Offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_key` (`enterprise_id`);

--
-- Index pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD KEY `candidate_key` (`idCandidate`),
  ADD KEY `offer_key` (`idOffer`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Offers`
--
ALTER TABLE `Offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Offers`
--
ALTER TABLE `Offers`
  ADD CONSTRAINT `enterprise_key` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`);

--
-- Contraintes pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD CONSTRAINT `candidate_key` FOREIGN KEY (`idCandidate`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `offer_key` FOREIGN KEY (`idOffer`) REFERENCES `offers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
