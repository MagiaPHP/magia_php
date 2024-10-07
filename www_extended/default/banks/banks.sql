-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 mars 2024 à 10:56
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
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bic` varchar(50) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `code` varchar(250) DEFAULT NULL,
  `invoices` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banks`
--

INSERT INTO `banks` (`id`, `contact_id`, `bank`, `account_number`, `bic`, `iban`, `code`, `invoices`, `status`) VALUES
(1, 1022, 'Nombre del Banco', '401020028087', 'BIC', 'IBAN', 'Banco', 1, 1),
(3, 60001, '1', '1-000-22', '1', '1', '2024030809051665eb6f7c49c965027', 0, 1),
(4, 60001, '2', '2--22--2', '2', '2', '2024030809052265eb6f82c2d615744', 0, 1),
(5, 60001, '3', '3-0-03', '3', '3', '2024030809052665eb6f8629b505367', 0, 1),
(6, 61114, 'Bank name', 'BE27068901755473', '', '', '2024031206231365f08f8141d587952', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `banks_lines`
--

CREATE TABLE `banks_lines` (
  `id` int(11) NOT NULL,
  `my_account` varchar(50) DEFAULT NULL,
  `operation` int(11) NOT NULL,
  `date_operation` date DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `type` enum('+','-') NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `date_val` date DEFAULT NULL,
  `account` varchar(250) NOT NULL,
  `sender` varchar(250) DEFAULT NULL,
  `comunication` varchar(250) DEFAULT NULL,
  `ce` varchar(50) DEFAULT NULL,
  `ref` varchar(250) DEFAULT NULL,
  `ref2` varchar(250) DEFAULT NULL,
  `ref3` varchar(250) DEFAULT NULL,
  `date_registre` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_code` int(11) DEFAULT 0,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banks_lines`
--

INSERT INTO `banks_lines` (`id`, `my_account`, `operation`, `date_operation`, `description`, `type`, `total`, `currency`, `date_val`, `account`, `sender`, `comunication`, `ce`, `ref`, `ref2`, `ref3`, `date_registre`, `status_code`, `order_by`, `status`) VALUES
(35, '401020028087', 52, '2023-08-29', 'Virement en votre faveur', '+', 97.04, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', '/A/ Salaire: 2023.CPA.118081 Activite 33938: COELLO 10-08-23  ', NULL, 'C3H29XM06B007367', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(36, '401020028087', 51, '2023-08-29', 'Virement en votre faveur', '+', 97.04, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', '/A/ Salaire: 2023.CPA.118083 Activite 33938: COELLO 09-08-23  ', NULL, 'C3H29XM06B007366', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(37, '401020028087', 49, '2023-08-15', 'domiciliation - prélèvement', '-', -10.76, 'EUR', '2023-08-16', 'FR7630027172180002003550120', 'OVH SAS', 'Payment order 195026119  ', NULL, 'C3H14XM02M000095', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(38, '401020028087', 48, '2023-08-08', 'Virement instant. en votre fav.', '+', 50.00, 'EUR', '2023-08-08', 'BE42377033903254', 'CADAVID VILLA', 'ahorro  ', NULL, 'C3H08XKKT32HRI87', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(39, '401020028087', 47, '2023-07-31', 'Décompte de frais et intérêts', '-', -1.50, 'EUR', '2023-08-01', 'BE37000442448928', ' ', '   ', NULL, 'C3G31INYF2N7NZX3', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(40, '401020028087', 42, '2023-06-21', 'Virement en votre faveur', '+', 143.91, 'EUR', '2023-06-21', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', '/A/ Salaire: 2023.CPA.085329 Activite 33938: COELLO 25-05-23  ', NULL, 'C3F21XM01P006145', '', NULL, '2024-02-27 19:03:48', 30, 1, 1),
(41, '401020028087', 41, '2023-06-14', 'Votre virement', '-', -24.00, 'EUR', '2023-06-14', 'BE73739016369860', 'Jhon Jairo Escudero', 'diente 37  ', NULL, 'C3F14PGS8ALIYL87', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(42, '401020028087', 39, '2023-06-06', 'domiciliation - prélèvement', '-', -8.46, 'EUR', '2023-06-06', 'FR7630027172180002003550120', 'OVH SAS', 'Payment order 190927022  ', NULL, 'C3F05XM049000133', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(43, '401020028087', 38, '2023-05-19', 'domiciliation - prélèvement', '-', -19.34, 'EUR', '2023-05-22', 'FR7630027172180002003550120', 'OVH SAS', 'Payment order 190581988  ', NULL, 'C3E22XM00Z000021', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(44, '401020028087', 37, '2023-05-16', 'Votre virement', '-', -10.00, 'EUR', '2023-05-16', 'BE55363178655044', 'Consulado', 'certificado robinson coello  ', NULL, 'C3E16PG8F1W5OE94', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(45, '401020028087', 36, '2023-05-15', 'domiciliation - prélèvement', '-', -14.27, 'EUR', '2023-05-15', 'FR7630027172180002003550120', 'OVH SAS', 'Payment order 190422010  ', NULL, 'C3E12XM02T000100', '', NULL, '2024-02-27 19:03:48', 40, 1, 1),
(46, '401020028087', 35, '2023-05-12', 'domiciliation - prélèvement', '-', -24.18, 'EUR', '2023-05-12', 'FR7630027172180002003550120', 'OVH SAS', 'Payment order 189912820  ', NULL, 'C3E11XM02J000055', '', NULL, '2024-02-27 19:03:48', 1, 1, 1),
(47, '401020028087', 34, '2023-05-11', 'Virement en votre faveur', '+', 981.97, 'EUR', '2023-05-11', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Note de Frais: 2023.NDF.020375 Activite 33938: COELLO  ', '+++000/0202/45617+++', 'C3E11XM020005430', '', NULL, '2024-02-27 19:03:48', 30, 1, 1),
(49, '401020028087', 53, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20201', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(53, '401020028087', 54, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20203', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(54, '401020028087', 55, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20204', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(55, '401020028087', 56, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20205', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(56, '401020028087', 57, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20206', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(57, '401020028087', 58, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20207', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(58, '401020028087', 59, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20208', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(59, '401020028087', 60, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20209', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(60, '401020028087', 61, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20210', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(61, '401020028087', 62, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20211', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(62, '401020028087', 63, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20212', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(63, '401020028087', 64, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20213', '', NULL, '2024-02-27 19:03:48', 100, 1, 1),
(64, '401020028087', 65, '2023-08-29', 'Virement en votre faveur', '+', 120.00, 'EUR', '2023-08-29', 'BE27068901755473', 'PRODUCTIONS ASSOCIEES ASBL', 'Salario enero', '+++000/0202/46223+++', '20214', '', NULL, '2024-02-27 19:03:48', 100, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `banks_lines_status`
--

CREATE TABLE `banks_lines_status` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banks_lines_status`
--

INSERT INTO `banks_lines_status` (`id`, `code`, `name`, `description`, `icon`, `order_by`, `status`) VALUES
(1, 1, 'From bank', 'Come from de bank', 'glyphicon glyphicon-folder-close', 1, 1),
(2, 20, 'Unknow', 'Unknow', NULL, 1, 1),
(3, 30, 'Sales invoices', 'Assigned for sales invoices', NULL, 1, 1),
(4, 40, 'Purchase invoices', 'Assigned for expenses', NULL, 1, 1),
(6, 10, 'See later', 'I will be check later', NULL, 1, 1),
(7, 100, 'Reconciliation done', 'The bank reconciliation has already been done, reconciliation done', NULL, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id_contact` (`contact_id`);

--
-- Index pour la table `banks_lines`
--
ALTER TABLE `banks_lines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operation` (`operation`),
  ADD UNIQUE KEY `my_account` (`my_account`,`operation`),
  ADD UNIQUE KEY `my_account_2` (`my_account`,`ref`),
  ADD KEY `status_code` (`status_code`);

--
-- Index pour la table `banks_lines_status`
--
ALTER TABLE `banks_lines_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `banks_lines`
--
ALTER TABLE `banks_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `banks_lines_status`
--
ALTER TABLE `banks_lines_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `banks_lines`
--
ALTER TABLE `banks_lines`
  ADD CONSTRAINT `banks_lines_account_number` FOREIGN KEY (`my_account`) REFERENCES `banks` (`account_number`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `banks_lines_ibfk_1` FOREIGN KEY (`status_code`) REFERENCES `banks_lines_status` (`code`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
