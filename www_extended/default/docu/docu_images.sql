-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 09 mars 2024 à 11:29
-- Version du serveur : 10.5.23-MariaDB
-- Version de PHP : 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `factuxorg_demo`
--

-- --------------------------------------------------------

--
-- Structure de la table `docu_images`
--

CREATE TABLE `docu_images` (
  `id` int(11) NOT NULL,
  `docu_id` int(11) DEFAULT NULL,
  `bloc_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `docu_images`
--
ALTER TABLE `docu_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docu_images_bloc` (`bloc_id`),
  ADD KEY `docu_images_docu` (`docu_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `docu_images`
--
ALTER TABLE `docu_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `docu_images`
--
ALTER TABLE `docu_images`
  ADD CONSTRAINT `docu_images_bloc` FOREIGN KEY (`bloc_id`) REFERENCES `docu_blocs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `docu_images_docu` FOREIGN KEY (`docu_id`) REFERENCES `docu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
