-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 20 fév. 2026 à 22:27
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formule1`
--

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `écurie` varchar(255) NOT NULL,
  `podium` int NOT NULL,
  `circuit_favoris` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`id`, `nom`, `age`, `écurie`, `podium`, `circuit_favoris`, `slug`) VALUES
(2, 'Lewis Hamilton', 40, 'Ferrari', 108, 'Silverstone', 'lewis-hamilton'),
(3, 'Charles Leclerc', 27, 'Ferrari', 8, 'Monaco', 'charles-leclerc'),
(5, 'Oscar Piastri', 24, 'McLaren Racing', 2, 'Melbourne', 'oscar-piastri'),
(6, 'George Russell', 26, 'Mercedes', 3, 'Silverstone', 'george-russell'),
(7, 'Fernando Alonso', 43, 'Aston Martin', 32, 'Suzuka', 'fernando-alonso'),
(8, 'Pierre Gasly', 28, 'Alpine', 1, 'Monza', 'pierre-gasly'),
(11, 'pape samba', 24, 'barcelona raccing', 67, 'Suzuka', 'pape-samba'),
(12, 'charles eth', 21, 'buggati', 78, 'monaco', 'charles-eth'),
(13, 'raphael vaxelaire', 20, 'ferrari', 42, 'le mans', 'raphael-vaxelaire'),
(14, 'Max Verstappen', 28, 'Red Bull Racing', 67, 'Spa-Francorchamps', 'max-verstappen'),
(15, 'maximilien ilic', 19, 'Ferrari scuderria', 67, 'Spa-Francorchamps', 'maximilien-ilic');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(60) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `motdepasse`, `role`) VALUES
(1, 'Maxgoat', '$2y$10$juIdMZ5nTX2jASVDbXF95OMwPog9L66TYBmYLegSvUlyNeG914Hd6', 'user'),
(2, 'charleseth', '$2y$10$qtsUJfvDy8tzzOP/TiHEG.pvTyBNh/nxHWWWeCH0uigebcM6LhAr.', 'user'),
(3, 'raph', '$2y$10$oGq48PMju/Qy7WTnRFfF4uIKJ.wkFt8eh6V6x2rsR912y79n5rKse', 'user'),
(4, 'cortisol', '$2y$10$l7J5X1thDjpNGq47EB5IYehmSmd8D3fvbTv9xloFa9enf4QlZsmT6', 'user'),
(5, 'dqzdzqd', '$2y$10$xdAexWjYOLNonSQSJp/V1.Q8B6S4RMfZwt05kw08IsIizCFlrqhe2', 'user'),
(6, 'admin', '$2y$10$pV0i25J1bEC9POPUCJUpRevZiy/BIat3DijNSOx7XPVgw0OxOXJU6', 'admin'),
(7, 'Maxgoat', '$2y$10$FDuRsFkwE2jxSuFwlkTaHuwiSSoArPCYEb9zNo2P8yHmUttUcg19W', 'user'),
(8, 'admin', '$2y$10$pErPS79YqDWvabotNTSsNexlvqcMX7sbo4O2MxbyNCWR4W1asa0Ay', 'user'),
(9, 'admin', '$2y$10$V4Uql067WEWLVRYnBWaiXu8GpgditFStfibA7s9V.ybWPBpp2ZjK6', 'user'),
(10, 'admin', '$2y$10$Ky8Qg1guvCXad2CVBG6exOWMt0OC/63vkdSZXAmKG2jYvpHtYKvd2', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
