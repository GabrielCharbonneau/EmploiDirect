-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 28 Octobre 2016 à 12:50
-- Version du serveur :  5.6.30
-- Version de PHP :  5.5.35

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `FirstName`, `LastName`, `Address`, `user_id`) VALUES
(1, 'b', 'b', 'b', 0),
(4, 'Paul', 'Paul', 'Paul', 10),
(5, 'fdghdfg', 'c', 'c', 15),
(6, 'Bob', 'bob', 'bob', 4),
(7, 'asd', 'asd', 'asd', 18),
(8, 'Dom', 'Mob', 'Kok', 19);

-- --------------------------------------------------------

--
-- Structure de la table `enterprises`
--

CREATE TABLE IF NOT EXISTS `enterprises` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `enterprises`
--

INSERT INTO `enterprises` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'Singe', '', 14),
(2, 'En', 'en', 0),
(3, 'asd', 'asd', 16),
(4, 'Enterprise', 'ent', 17);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `postulation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`, `postulation_id`) VALUES
(1, 'Desert.jpg', 'uploads/files/', '2016-09-07 18:25:47', '2016-09-07 18:25:47', 1, 0),
(2, 'Lighthouse.jpg', 'uploads/files/', '2016-09-07 18:26:07', '2016-09-07 18:26:07', 1, 0),
(3, 'Koala.jpg', 'uploads/files/', '2016-09-07 18:38:27', '2016-09-07 18:38:27', 1, 0),
(4, 'Penguins.jpg', 'uploads/files/', '2016-09-07 19:16:53', '2016-09-07 19:16:53', 1, 0),
(5, 'Zebra_(PSF).png', 'uploads/files/', '2016-09-30 14:00:22', '2016-09-30 14:00:22', 1, 0),
(6, 'Zebra_(PSF).png', 'uploads/files/', '2016-09-30 14:05:56', '2016-09-30 14:05:56', 1, 0),
(7, 'Zebra_(PSF).png', 'uploads/files/', '2016-09-30 14:21:00', '2016-09-30 14:21:00', 1, 0),
(8, 'Zebra_(PSF).png', 'uploads/files/', '2016-09-30 14:21:25', '2016-09-30 14:21:25', 1, 0),
(9, 'CoinSinge.png', 'uploads/files/', '2016-09-30 14:51:19', '2016-09-30 14:51:19', 1, 14),
(10, 'BOB.pdf', 'uploads/files/', '2016-09-30 15:03:00', '2016-09-30 15:03:00', 1, 0),
(11, 'BOB.pdf', 'uploads/files/', '2016-09-30 15:03:13', '2016-09-30 15:03:13', 1, 0),
(12, '6936665-white-apple-logo.jpg', 'uploads/files/', '2016-09-30 15:04:08', '2016-09-30 15:04:08', 1, 0),
(13, 'CoinSinge.png', 'uploads/files/', '2016-09-30 15:04:17', '2016-09-30 15:04:17', 1, 0),
(14, 'CoinSinge.png', 'uploads/files/', '2016-09-30 15:05:11', '2016-09-30 15:05:11', 1, 0),
(15, 'CoinSinge.png', '', '2016-09-30 15:05:11', '2016-09-30 15:05:11', 1, 15),
(16, 'BOB.pdf', 'uploads/files/', '2016-09-30 15:05:21', '2016-09-30 15:05:21', 1, 0),
(17, 'BOB.pdf', '', '2016-09-30 15:05:21', '2016-09-30 15:05:21', 1, 16),
(18, 'BOB (1).pdf', 'uploads/files/', '2016-09-30 15:07:40', '2016-09-30 15:07:40', 1, 0),
(19, 'BOB (1).pdf', '', '2016-09-30 15:07:40', '2016-09-30 15:07:40', 1, 17);

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
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
  `enterprise_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `publicationBeginningDate`, `publicationEndDate`, `jobName`, `displayDate`, `responsabilitties`, `aptitudes`, `requirements`, `strengths`, `generalRemark`, `scholarity`, `sector`, `job`, `jobType`, `jobSituation`, `jobBeginningDate`, `enterprise_id`, `active`) VALUES
(3, 'eerererw', 'rewerwerwer weijeerw ouierh ewhuerwh uwer huwer uire weewruhr euiewrhe', '2016-09-09', '2016-09-09', 'ewrrewerw wrehew rhrhew werhuer whewruew rhhurew erwherwuh oewruuhre wuhewrh ewoue rhrwhe', '2016-09-09', 'erwerw', 'erwewr', 'erwer', 'reerwerw', 'ewrerw', 'erwwererw', 'erwrewe', 'werew', 'rewerw', '1', '2016-11-23', 1, 1),
(4, 'bob', 'bob', '2016-09-30', '2016-09-30', 'asd', '2016-09-30', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2016-09-30', 3, 1),
(5, '13', 'sada', '2016-09-30', '2016-09-30', 'asd', '2016-09-30', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2016-09-30', 3, 1),
(6, 'gj', 'a', '2016-09-30', '2016-09-30', 'd', '2016-09-30', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '2016-09-30', 4, 1),
(7, 'asd', 'asd', '2016-10-21', '2017-10-21', 'qwe', '2016-10-21', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'plein', '2016-10-21', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `postulations`
--

CREATE TABLE IF NOT EXISTS `postulations` (
  `id` int(11) NOT NULL,
  `idCandidate` int(11) NOT NULL,
  `idOffer` int(11) NOT NULL,
  `DatePostulation` date NOT NULL,
  `file_id` int(11) NOT NULL,
  `PresentationLetter` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `postulations`
--

INSERT INTO `postulations` (`id`, `idCandidate`, `idOffer`, `DatePostulation`, `file_id`, `PresentationLetter`) VALUES
(1, 5, 3, '0000-00-00', 123, '123'),
(2, 5, 3, '0000-00-00', 1, '1'),
(3, 5, 3, '2016-09-23', 1, '1'),
(12, 1, 1, '2016-09-06', 1, '1'),
(13, 3, 3, '2016-09-30', 0, 'Presentation letter'),
(14, 7, 6, '2016-09-30', 9, 'asd'),
(15, 6, 6, '2016-09-30', 0, 'Bob'),
(16, 6, 6, '2016-09-30', 0, 'asdADSADASDeadseADsa'),
(17, 6, 6, '2016-09-30', 0, 'asd');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `active`) VALUES
(4, 'omg@omg.omg', '$2y$10$J20sj4Vrq.eZoC5y1xBOZuALzdt0z44mWt9r9GeUPrz8F/EhyyvEm', 'admin', 0),
(5, 'e@e.e', '$2y$10$OxNaKCTVkWBcQlXpvu8TAuh.VFHINe2TI3FzKuRE0/HrAsDfzf1O.', 'entreprise', 1),
(8, 'q@q', '$2y$10$hskYyxfbLvvQgKX5uhiABesrVSWoaRV9y5qrwh6QpNWkKMQefJ122', 'candidate', 1),
(9, 'q@q.q', '$2y$10$TgtkgbF/DosUss8Cf/tywu1ghFgm9d7Rd.RPcWDxXrmt5aPSOS3t.', 'candidate', 0),
(10, 'w@w', '$2y$10$uhmu1DPdmRYyhTthXLgu7.kycMAeyOlFRP2hwwSszn2kZvRkM8fN6', 'w', 0),
(11, 'q@q.q', '$2y$10$gghY.9UQ6h/COHREW.l91uSi4NnNYFX3Ns7lEa5zub1jfXvmMehCq', 'enterprise', 0),
(12, 'e@e', '$2y$10$9wzq8wKO6l81XcZYVLY6E.xVN8JslYupJ5cvDl0Hej3W5RrsAFY6C', 'enterprise', 1),
(13, 'w@q', '$2y$10$ADrGBcf9f777cGxGRZEybu7LL1yro2DjN0rUm65qMml3PbJVt5RLq', 'enterprise', 1),
(14, 'en@en', '$2y$10$S7NsTMA3TKJbx4f1rJCTb.gwxNQpSspu0F6fv0L4iRZAlX445s6jW', 'enterprise', 1),
(15, 'c@c', '$2y$10$tTP.o.TRoEIGR6XXFCfa.uJUgL0ty2Fzden6EHSg0WRxLZvWVlY.O', 'candidate', 1),
(16, 'enterprise@e', '$2y$10$F3QyYEIWbwAvZoVqR/KtWODhbDo4QddKZFZKO6rUFDS1gAehKzKc2', 'enterprise', 1),
(17, 'enterprise@ent', '$2y$10$./m8f3SrWY/cp1kGej0VN.Bq37/9/23A5ZEdwN7Ezm.4dnaR/b.ZK', 'enterprise', 1),
(18, 'us2@sad', '$2y$10$l1w08sh8hczOE0QA53ueOuIV3zpK47i6tZdS.DW5kxhkmQRJNJfjq', 'candidate', 1),
(19, 'asd@asd', '$2y$10$8MsdNjlsdwxWwEEQyxC9O.oKDRPwRwjTwSQX8nuvqOgm3uFhyZmre', 'candidate', 1),
(20, 'cyrd97@gmail.com', '$2y$10$B.x0eNc1TEoIRK9hkBo9M.QmlwKj01nSdSWwJR61zGL5RQ5mDHfN2', 'candidate', 1),
(21, 'cyrd97@gmail.com', '$2y$10$/1R7CEckrKQtN1P3dKx58uDnoEDXpTaiJeOYx1mW3SBeLe7uZOi.6', 'candidate', 1),
(22, 'cyrd97@gmail.com', '$2y$10$KxtPbM9aWNQiaDpGhhDodevPcyJPIK1EkIkKZL1FITNk4Aq/y2Fi6', 'candidate', 1),
(23, 'cyrd97@gmail.com', '$2y$10$N5MYr7p96x3udZAix6uFDeg0GeDe8pbNemnPj3cw6M04A.Au1l74q', 'candidate', 1),
(24, 'cyrd97@gmail.com', '$2y$10$udIpc/Yj5LJy7kRAUaWJfu37d0YFeMTs4A8WlkQXjJUgEvbuoh/7.', 'candidate', 1),
(25, 'cyrd97@gmail.com', '$2y$10$3GrigVk7Jdre8aFq3qagv.p/YSR/jhxFoXxUrLs95pWHvSgg24966', 'candidate', 1),
(26, 'cyrd97@gmail.com', '$2y$10$8/Dlk.OVUWzitYtVcMDAq.N4ohYDZ70.lLQtytt.mWLvLrz1x/RpW', 'candidate', 1),
(27, 'cyrd97@gmail.com', '$2y$10$OTEb1dMMblKHCH4CgrPwLe0WQloOZFCUa282OkojJwehhGy6HmPn2', 'candidate', 1),
(28, 'cyrd97@gmail.com', '$2y$10$yIkzqVUeEu8wnWaGJwwg4evp8LNjuYG7ixjdM/H85Doz1E6Aji3U.', 'candidate', 1),
(29, 'cyrd97@gmail.com', '$2y$10$NlBprlgfLojvV5Um6Fkb4eKTc4.OAhtADvidMfhKtX1iR2hT.jfqa', 'candidate', 1),
(30, 'cyrd97@gmail.com', '$2y$10$E5mFS8vicp6/3urShK90jOpkWJSXM5WQDqIxvN/lAjp9v97xe.amC', 'candidate', 1),
(31, 'cyrd97@gmail.com', '$2y$10$PGnJH4KRC6Xv2V/O4.LH1ezYiILS2cTsEPL/zkO3.wuP1F1TGS0D2', 'candidate', 1),
(32, 'cyrd97@gmail.com', '$2y$10$TCReq/eCgHygda/ti7gPBeU1SYJ5ryl4HMf1gGukwnZrF5zhxtsKC', 'candidate', 1),
(33, 'cyrd97@gmail.com', '$2y$10$2GdEN/SdVfCo6UXTQEbkneCVFfFadSz0Cfe6SOO4lYL.f8RA.nSMG', 'candidate', 1),
(34, 'cyrd97@gmail.com', '$2y$10$kbjDgcpnkAJuDI.fva47D.E408gbVik95FYCc/hdTA824Mp1O3r2S', 'candidate', 1),
(35, 'cyrd97@gmail.com', '$2y$10$sUKUjxRFAl3TMWrTnhMhcuECFjuhmQWnLp5V0nfRO.LBl5cT4eS1m', 'candidate', 1),
(36, 'Bob@bob.com', '$2y$10$cd3FszPoUwoLHaAXilk3ge.R6Hh6zwXKKXCS4Y57jIPm2TGnrbLiS', 'candidate', 1),
(37, 'cyrd97@gmail.com', '$2y$10$rmmqQH03aOKFewm4DeoEkuM0Y2jhwdbDMSfp4ll5EAZf6K9zzae8G', 'candidate', 1),
(38, 'cyrd97@gmail.com', '$2y$10$lkvh3LhIDnhYEM/VzEVw6.pq0Q0OED/TH833EWwibjQqscQj0WyaG', 'candidate', 1),
(39, 'cyrd97@gmail.com', '$2y$10$fhevUpP0S7I.z6Lud66UVu21f6N/MIR7FsNErzalgfhL4EnCltfPG', 'candidate', 1),
(40, 'cyrd97@gmail.com', '$2y$10$9DlPY3fDcGMkTWKvGlDlwuhZYHZBn937437ejrFpaOhn3CjI364hW', 'enterprise', 1),
(41, 'cyrd97@gmail.com', '$2y$10$lBuuKP8Hw19.2HxRFBt55ePwn6y4HTrQ7JoPuZ84ebQTb05qTeqHq', 'enterprise', 1),
(42, 'cyrd97@gmail.com', '$2y$10$DmSljcRRpnq72geNKxn0Ju5.AMm.PowUzDOz3BPNALXmyIogbhx0S', 'enterprise', 1),
(43, 'cyrd97@gmail.com', '$2y$10$CBCCARSgj1LRbEsZXNv2dudDDJsiPfi7p9XbEJxO7ffSL6Y0hoDS6', 'enterprise', 1),
(44, 'cyrd97@gmail.com', '$2y$10$0bLJii1gX8uyrFUhgvoIWuof1TJtBDxHi8NeDVGaUN04zTAQ7.N0S', 'enterprise', 1),
(45, 'cyrd97@gmail.com', '$2y$10$DDFglgbQjGLjUaqXt4rqQ.SLN./Go7KJgiT0Aqz9CMMhGopksONBm', 'enterprise', 1),
(46, 'cyrd97@gmail.com', '$2y$10$r9C4jUIcQUOySDoJenTNluuv8XuX/j3U3UiweyXCE978Rg2/KfRWa', 'candidate', 1),
(47, 'cyrd97@gmail.com', '$2y$10$0tJcJEtU9cnRb8wuoFA/R.Snp0vuANJjg0i42VOzx2AzgDrXnqjla', 'candidate', 1);

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
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_key` (`enterprise_id`);

--
-- Index pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `postulations`
--
ALTER TABLE `postulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `enterprise_key` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
