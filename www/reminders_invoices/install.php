-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 fév. 2024 à 12:10
-- Version du serveur : 10.5.23-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `factuxeu_cloud_45`
--

-- --------------------------------------------------------

--
-- Structure de la table `reminders_invoices`
--

CREATE TABLE `reminders_invoices` (
`id` int(11) NOT NULL,
`date_registre` timestamp NOT NULL DEFAULT current_timestamp(),
`invoice_id` int(11) NOT NULL,
`invoice_solde` decimal(9,2) NOT NULL,
`reminder` varchar(50) NOT NULL,
`reminder_percent` int(11) NOT NULL,
`invoice_to_add_id` int(11) DEFAULT NULL,
`order_by` int(11) NOT NULL DEFAULT 1,
`status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reminders_invoices`
--

INSERT INTO `reminders_invoices` (`id`, `date_registre`, `invoice_id`, `invoice_solde`, `reminder`, `reminder_percent`, `invoice_to_add_id`, `order_by`, `status`) VALUES
(5, '2024-02-07 12:07:52', 2, 1089.00, 'r2', 0, NULL, 0, 0),
(6, '2024-02-07 12:08:13', 2, 1089.00, 'r3', 0, NULL, 0, 0),
(7, '2024-02-07 12:08:55', 4, 1089.00, 'r1', 0, NULL, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reminders_invoices`
--
ALTER TABLE `reminders_invoices`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reminders_invoices`
--
ALTER TABLE `reminders_invoices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;