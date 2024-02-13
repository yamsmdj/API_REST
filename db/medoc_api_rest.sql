-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 fév. 2024 à 22:37
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medoc_api_rest`
--

-- --------------------------------------------------------

--
-- Structure de la table `docteur`
--

DROP TABLE IF EXISTS `docteur`;
CREATE TABLE IF NOT EXISTS `docteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `desciption` text NOT NULL,
  `pays_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pays_id` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `docteur`
--

INSERT INTO `docteur` (`id`, `nom`, `img`, `desciption`, `pays_id`) VALUES
(1, 'DR GONZO', 'assets\\docteur\\docteur1.jpg', 'Propose des Pilules sur Dubai.', NULL),
(2, 'DR Depp', 'assets\\docteur\\docteur2.jpg', 'Propose des pilules sur Pukhet.', NULL),
(3, 'DR Axel Folé', 'assets\\docteur\\docteur3.jpg', 'Je suis le médecin de Las Vegas en médoc.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

DROP TABLE IF EXISTS `medicaments`;
CREATE TABLE IF NOT EXISTS `medicaments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `pays_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pays_id` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`id`, `nom`, `img`, `prix`, `pays_id`, `created_at`) VALUES
(1, 'Codéine', 'assets\\photobasededonnées\\codeine.jpg', 17, 2, '0000-00-00 00:00:00'),
(2, 'Meth', 'assets\\photobasededonnées\\met.jpg', 19, 2, '0000-00-00 00:00:00'),
(3, 'Cannabis', 'assets\\photobasededonnées\\canabis.jpg', 22, 2, '0000-00-00 00:00:00'),
(4, 'Yeux bruleur', 'assets\\photobasededonnées\\yeux.jpg', 32, 2, '0000-00-00 00:00:00'),
(5, 'LSD', 'assets\\photobasededonnées\\lsd.jpg', 45, 2, '0000-00-00 00:00:00'),
(6, 'Metieur', 'assets\\photobasededonnées\\code.jpg', 38, 2, '0000-00-00 00:00:00'),
(7, 'Codeine', 'assets\\photobasededonnées\\codeine.jpg', 12, 2, '0000-00-00 00:00:00'),
(8, 'Metiyor', 'assets\\photobasededonnées\\meti.jpg', 35, 2, '0000-00-00 00:00:00'),
(14, 'ProduitUN', 'nabiil', 15, 2, '0000-00-00 00:00:00'),
(15, 'yamine', 'guy', 150, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `pays`) VALUES
(1, 'Dubai'),
(2, 'Las vegas'),
(3, 'Pukhet');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD CONSTRAINT `docteur_ibfk_1` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD CONSTRAINT `medicaments_ibfk_1` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
