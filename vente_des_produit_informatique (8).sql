-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 25 mai 2024 à 17:56
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vente_des_produit_informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `tel`, `login`, `mdp`) VALUES
(1, 'Chaabani aziz', 'Chaabani.aziz@yahoo.com', '0123456789', 'admin1', 'motdepasse');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `adresse`, `telephone`) VALUES
(38, 'Leila Ben Youssef', 'leila.byoussef@example.com', '25 Avenue Habib Thameur, Sfax', '21623456789'),
(39, 'Youssef Khedher', 'youssef.khedher@example.com', '8 Rue Farhat Hached, Sousse', '21634567890'),
(37, 'Mohamed Ben Ali', 'mohamed.benali@example.com', '10 Rue Habib Bourguiba, Tunis', '21612345678');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `date_commande` date NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client_idddddd` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `client_id`, `date_commande`, `total`) VALUES
(1, 1, '2024-03-19', '1799.98'),
(2, 2, '2024-03-20', '109.99');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

DROP TABLE IF EXISTS `details_commande`;
CREATE TABLE IF NOT EXISTS `details_commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commande_id` int NOT NULL,
  `produit_id` int NOT NULL,
  `quantite` int NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_id` (`produit_id`),
  KEY `fk_commande_id` (`commande_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id`, `commande_id`, `produit_id`, `quantite`, `prix_unitaire`) VALUES
(1, 1, 1, 2, '899.99'),
(2, 2, 3, 1, '109.99');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`) VALUES
(53, 'Ordinateur de bureau', 'Ordinateur de bureau puissant avec processeur Intel i7', '900.00'),
(54, 'Moniteur 27 pouces', 'Écran LED 27 pouces 4K', '350.00'),
(55, 'Enceintes Bluetooth', 'Enceintes sans fil avec basses puissantes', '120.00'),
(56, 'Clavier sans fil', 'Clavier sans fil ergonomique avec pavé numérique', '45.00'),
(57, 'Chargeur sans fil', 'Chargeur sans fil rapide pour smartphones', '25.00'),
(58, 'Scanner portable', 'Scanner portable pour numériser des documents en déplacement', '65.00'),
(59, 'Disque dur interne 2TB', 'Disque dur interne 2TB pour stockage supplémentaire', '70.00'),
(60, 'Projecteur HD', 'Projecteur HD portable pour présentations et films', '200.00'),
(61, 'Microphone USB', 'Microphone USB pour enregistrements audio de haute qualité', '80.00'),
(62, 'Casque gaming', 'Casque gaming avec son surround 7.1 et micro intégré', '150.00'),
(63, 'Tablette graphique', 'Tablette graphique pour artistes numériques avec stylet', '250.00'),
(64, 'Station d\'accueil USB-C', 'Station d\'accueil USB-C avec multiples ports pour connexion facile', '100.00'),
(67, 'Téléviseur LED Samsung 55 pouces', 'Téléviseur LED Samsung 4K UHD Smart TV 55 pouces avec HDR', '799.99'),
(68, 'Smartphone iPhone 13 Pro Max', 'iPhone 13 Pro Max avec écran Super Retina XDR 6,7 pouces et système triple appareil photo', '1199.99'),
(69, 'Ordinateur portable Dell XPS 13', 'Ordinateur portable Dell XPS 13 avec processeur Intel Core i7, écran InfinityEdge 13,4 pouces', '1399.99'),
(70, 'Console de jeux PlayStation 5', 'Console de jeux PlayStation 5 avec lecteur Blu-ray 4K Ultra HD', '499.99'),
(71, 'Montre connectée Apple Watch Series 7', 'Apple Watch Series 7 avec écran Retina toujours activé et suivi avancé de la condition physique', '399.99'),
(72, 'Aspirateur robot iRobot Roomba i7+', 'Aspirateur robot iRobot Roomba i7+ avec vidage automatique du bac', '799.99'),
(73, 'Cafetière Nespresso Vertuo Next', 'Cafetière Nespresso Vertuo Next avec technologie d\'extraction par centrifugation', '149.99'),
(75, 'Appareil photo Sony Alpha A7 III', 'Appareil photo Sony Alpha A7 III avec capteur plein format 24,2 MP et vidéo 4K HDR', '1999.99'),
(76, 'Trottinette électrique Xiaomi Mi Electric Scooter 1S', 'Trottinette électrique Xiaomi Mi Electric Scooter 1S avec autonomie de 30 km', '399.99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
