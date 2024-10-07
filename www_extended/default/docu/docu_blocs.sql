-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 07 mars 2024 à 15:17
-- Version du serveur : 10.5.23-MariaDB
-- Version de PHP : 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 
-- Que pasa 

CREATE TABLE `docu_blocs` (
  `id` int(11) NOT NULL,
  `docu_id` int(11) NOT NULL,
  `bloc` varchar(50) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `post` text DEFAULT NULL,
  `h` int(1) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `docu_blocs`
--
ALTER TABLE `docu_blocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bloc` (`bloc`),
  ADD KEY `docu_blocs_id` (`docu_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `docu_blocs`
--
ALTER TABLE `docu_blocs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `docu_blocs`
--
ALTER TABLE `docu_blocs`
  ADD CONSTRAINT `docu_blocs_id` FOREIGN KEY (`docu_id`) REFERENCES `docu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;