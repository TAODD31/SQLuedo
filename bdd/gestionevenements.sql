-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 jan. 2025 à 15:12
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
-- Base de données : `gestionevenements`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_evenement` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `description`, `date_evenement`, `lieu`) VALUES
(1, 'Conférence IA', 'Une conférence sur l\'intelligence artificielle et ses applications.', '2024-12-01', 'Paris'),
(2, 'Hackathon Développement Durable', 'Un hackathon axé sur les solutions pour un avenir durable.', '2024-11-25', 'Lyon');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evenement_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `note` int(11) DEFAULT NULL CHECK (`note` between 1 and 5),
  `date_feedback` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `evenement_id` (`evenement_id`),
  KEY `participant_id` (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `evenement_id`, `participant_id`, `commentaire`, `note`, `date_feedback`) VALUES
(1, 1, 1, 'Excellente conférence, très instructive.', 5, '2024-12-19 09:00:23'),
(2, 1, 2, 'Bonne organisation mais manque de pauses.', 4, '2024-12-19 09:00:23');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evenement_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` enum('Confirmée','En attente','Annulée') DEFAULT 'En attente',
  PRIMARY KEY (`id`),
  KEY `evenement_id` (`evenement_id`),
  KEY `participant_id` (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `evenement_id`, `participant_id`, `date_inscription`, `statut`) VALUES
(1, 1, 1, '2024-12-19 09:00:23', 'Confirmée'),
(2, 1, 2, '2024-12-19 09:00:23', 'En attente'),
(3, 2, 3, '2024-12-19 09:00:23', 'Confirmée');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com'),
(2, 'Martin', 'Sophie', 'sophie.martin@example.com'),
(3, 'Durand', 'Paul', 'paul.durand@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
CREATE TABLE IF NOT EXISTS `ressource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evenement_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('Matériel','Humain','Financier') NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evenement_id` (`evenement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`id`, `evenement_id`, `nom`, `type`, `description`) VALUES
(1, 1, 'Projecteur', 'Matériel', 'Projecteur utilisé pour les présentations.'),
(2, 2, 'Sponsor financier', 'Financier', 'Apport de 5000€ pour les prix du hackathon.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD CONSTRAINT `ressource_ibfk_1` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
