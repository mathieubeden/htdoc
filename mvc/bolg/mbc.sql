-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 fév. 2021 à 15:58
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mbc`
--
CREATE DATABASE IF NOT EXISTS `mbc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mbc`;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `blobs`
--

DROP TABLE IF EXISTS `blobs`;
CREATE TABLE IF NOT EXISTS `blobs` (
  `id_blob` int(11) NOT NULL AUTO_INCREMENT,
  `mime` varchar(20) NOT NULL,
  `data` blob NOT NULL,
  `id_billet` int(11) NOT NULL,
  PRIMARY KEY (`id_blob`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comms`
--

DROP TABLE IF EXISTS `comms`;
CREATE TABLE IF NOT EXISTS `comms` (
  `id_comm` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `auteur_comm` varchar(100) NOT NULL,
  `date_comm` date NOT NULL DEFAULT current_timestamp(),
  `id_billet` int(11) NOT NULL,
  PRIMARY KEY (`id_comm`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT 'anonymous',
  `pass` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`id`) REFERENCES `comms` (`id_billet`);

--
-- Contraintes pour la table `blobs`
--
ALTER TABLE `blobs`
  ADD CONSTRAINT `blobs_ibfk_1` FOREIGN KEY (`id_billet`) REFERENCES `billet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
