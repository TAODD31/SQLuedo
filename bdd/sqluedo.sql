-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 jan. 2025 à 15:10
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sqluedo`
--

-- --------------------------------------------------------

--
-- Structure de la table `enquete`
--

DROP TABLE IF EXISTS `enquete`;
CREATE TABLE IF NOT EXISTS `enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `difficulteIntermediaire` int(11) NOT NULL DEFAULT 0,
  `difficulteDifficile` int(11) NOT NULL DEFAULT 0,
  `MLD` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `indice` text DEFAULT NULL,
  `nomDatabase` varchar(255) DEFAULT NULL,
  `nomCreateur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nomCreateur` (`nomCreateur`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enquete`
--

INSERT INTO `enquete` (`id`, `titre`, `description`, `difficulteIntermediaire`, `difficulteDifficile`, `MLD`, `solution`, `indice`, `nomDatabase`, `nomCreateur`) VALUES
(11, 'GestionEvenements', 'test', 7, 6, '', 'test', 'test', 'GestionEvenements', 'matheo'),
(12, 'nba', 'nbatest', 10, 38, NULL, 'test', 'test', 'nba', 'matheo'),
(18, 'InvestigationSQL', 'Un soir ...', 14, 8, '', 'Jacques Lemoine', 'Jacques Lemoine', 'InvestigationSQL', 'matheo'),
(19, 'GestionEvenements', 'Une enquête relative à un événement majeur.', 10, 5, '', 'Sophie', 'test', 'GestionEvenements', 'matheo');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `nom` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `nbUtilisateur` int(11) DEFAULT 0,
  `createur` varchar(100) NOT NULL,
  PRIMARY KEY (`nom`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`nom`, `code`, `nbUtilisateur`, `createur`) VALUES
('louisland', 'm1234m', 3, 'louis');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

DROP TABLE IF EXISTS `statistiques`;
CREATE TABLE IF NOT EXISTS `statistiques` (
  `idStatistique` int(11) NOT NULL AUTO_INCREMENT,
  `nbTentatives` int(11) NOT NULL DEFAULT 0,
  `reussi` tinyint(1) NOT NULL DEFAULT 0,
  `tempsPasse` int(11) NOT NULL DEFAULT 0,
  `nomUtilisateur` varchar(100) DEFAULT NULL,
  `idEnquete` int(11) DEFAULT NULL,
  PRIMARY KEY (`idStatistique`),
  KEY `nomUtilisateur` (`nomUtilisateur`),
  KEY `idEnquete` (`idEnquete`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nomUtilisateur` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('admin','utilisateur') NOT NULL DEFAULT 'utilisateur',
  `nomGroupe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nomUtilisateur`),
  KEY `nomGroupe` (`nomGroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nomUtilisateur`, `mdp`, `role`, `nomGroupe`) VALUES
('julien', '$2y$10$kr1xwPvoed/Zd5J6miOiEe/d419H2oWcOyKu2snMo5aijlFI/C.1.', 'utilisateur', 'louisland'),
('louis', '$2y$10$gFKVdBNSWN9A/lCrT/Rzm.pEHvB6cO.qJ.b.NOZjybpxcm2jH6b9q', 'utilisateur', 'louisland'),
('matheo', '$2y$10$FVPW3/j4WhLqMfAZeKcSt.rL/UylY33lyqN.hqff.Lz2ELlMGWw/K', 'admin', NULL),
('soutenace', '$2y$10$YkFdOHoOVMRUxuIxYHoxb.f2iWxqA2UK.HH04KpZVsN4n/oZ9NrbG', 'utilisateur', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enquete`
--
ALTER TABLE `enquete`
  ADD CONSTRAINT `enquete_ibfk_1` FOREIGN KEY (`nomCreateur`) REFERENCES `utilisateur` (`nomUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD CONSTRAINT `statistiques_ibfk_1` FOREIGN KEY (`nomUtilisateur`) REFERENCES `utilisateur` (`nomUtilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `statistiques_ibfk_2` FOREIGN KEY (`idEnquete`) REFERENCES `enquete` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`nomGroupe`) REFERENCES `groupe` (`nom`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
