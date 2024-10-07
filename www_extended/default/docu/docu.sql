-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 06 mars 2024 à 12:11
-- Version du serveur : 5.7.44
-- Version de PHP : 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `factuxorg_coop`
--

-- --------------------------------------------------------

--
-- Structure de la table `docu`
--

CREATE TABLE `docu` (
  `id` int(11) NOT NULL,
  `controllers` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_id` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `h` int(1) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `docu`
--

INSERT INTO `docu` (`id`, `controllers`, `action`, `language`, `father_id`, `title`, `post`, `h`, `order_by`, `status`) VALUES
(1, 'budgets', 'index', 'en_GB', NULL, 'index', '<p>Hola esta es la lista de presupuestos del sistema, en ella encontraras:&nbsp;</p><ul><li>Hola pajaro con cola de plumas rojas1</li><li>item2d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>d</li><li>dd</li><li>&nbsp;</li></ul><p>Si deseas mas info lama a angelica</p>', NULL, 1, 1),
(2, 'contacts', 'index', 'en_GB', NULL, 'index', '<p>contactos index espanol</p>', NULL, 1, 1),
(3, 'docu', 'edit', 'en_GB', NULL, 'edit', '', NULL, 1, 1),
(4, 'invoices', 'index', 'en_GB', NULL, 'index', '<h2>Modulo<strong> </strong><i><strong>Facturas de Venta</strong></i></h2><p>Este módulo le facilita la creación de facturas de venta, adaptadas al tipo de actividad comercial de la empresa, ya sea &nbsp;productos o servicios.</p><p>Al acceder al módulo, encontrará dos menús en la pantalla:</p><p>Menú de Búsqueda en el lado izquierdo.</p><p>Menú de Facturación en el centro de la pantalla.</p><p>AÑADIR BOTON OJOOJOOJOJO</p><p>En la pantalla, notará un botón llamado Nueva Factura ubicado en el área central derecha. Al hacer clic en él, se mostrarán tres opciones:</p><ol><li>Contacto Existente: Esta opción le permite buscar un contacto ya registrado en la base de datos del sistema.</li><li>Nueva Empresa: Puede crear una nueva empresa con un número de identificación fiscal, que será registrada automáticamente en la base de contactos del sistema</li><li>Nuevo Cliente Privado: Esta opción te permite crear un nuevo contacto, el cual también será registrado automáticamente en la base de contactos del sistema</li></ol><p>Tome en cuenta: la opción \'Nuevo Cliente Privado\' está indicada con (OJOJOJOJO) para una fácil identificación.</p><p>&nbsp;</p><p>&nbsp;</p>', NULL, 1, 1),
(5, 'credit_notes', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(6, 'balance', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(7, 'users', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(8, 'expenses_categories', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(9, 'expenses', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(10, 'export', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(11, 'export', 'contacts', 'en_GB', NULL, 'contacts', '', NULL, 1, 1),
(12, 'export', 'invoices', 'en_GB', NULL, 'invoices', '', NULL, 1, 1),
(13, 'export', 'credit_notes', 'en_GB', NULL, 'credit_notes', '', NULL, 1, 1),
(14, 'export', 'expenses', 'en_GB', NULL, 'expenses', '', NULL, 1, 1),
(15, 'export', 'balance', 'en_GB', NULL, 'balance', '', NULL, 1, 1),
(16, 'export', 'providers', 'en_GB', NULL, 'providers', '', NULL, 1, 1),
(17, 'invoices', 'details', 'en_GB', NULL, 'details', '', NULL, 1, 1),
(18, 'invoices', 'edit', 'en_GB', NULL, 'edit', '', NULL, 1, 1),
(19, 'invoices', 'cancel', 'en_GB', NULL, 'cancel', '', NULL, 1, 1),
(20, 'credit_notes', 'search', 'en_GB', NULL, 'search', '', NULL, 1, 1),
(21, 'contacts', 'details', 'en_GB', NULL, 'details', '<figure class=\"image\"><img src=\"https://coop.factux.org/www/gallery/img/_factuxorg_coop/users/6106420240305145554.jpg\"></figure><p>bandera del ecuador</p><figure class=\"image\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/800px-Flag_of_Ecuador.svg.png\" alt=\"Archivo:Flag of Ecuador.svg\"></figure>', NULL, 1, 1),
(22, 'contacts', 'employees', 'en_GB', NULL, 'employees', '', NULL, 1, 1),
(23, 'contacts', 'offices', 'en_GB', NULL, 'offices', '', NULL, 1, 1),
(24, 'contacts', 'directory', 'en_GB', NULL, 'directory', '', NULL, 1, 1),
(25, 'contacts', 'addresses', 'en_GB', NULL, 'addresses', '', NULL, 1, 1),
(26, 'contacts', 'banks', 'en_GB', NULL, 'banks', '', NULL, 1, 1),
(27, 'contacts', 'comments', 'en_GB', NULL, 'comments', '', NULL, 1, 1),
(28, 'home', 'about', 'en_GB', NULL, 'about', '', NULL, 1, 1),
(29, '_content', 'documentation', 'en_GB', NULL, 'documentation', '', NULL, 1, 1),
(30, 'tasks', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(31, 'permissions', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(32, 'permissions', 'search', 'en_GB', NULL, 'search', '', NULL, 1, 1),
(33, 'home', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(34, 'contacts', 'system', 'en_GB', NULL, 'system', '', NULL, 1, 1),
(35, 'contacts', 'logs', 'en_GB', NULL, 'logs', '', NULL, 1, 1),
(36, 'contacts', 'users', 'en_GB', NULL, 'users', '', NULL, 1, 1),
(37, 'config', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(38, 'my_info', 'language', 'en_GB', NULL, 'language', '', NULL, 1, 1),
(39, 'my_info', 'change_colors', 'en_GB', NULL, 'change_colors', '', NULL, 1, 1),
(40, 'tasks', 'search', 'en_GB', NULL, 'search', '', NULL, 1, 1),
(41, '_translations', 'index', 'fr_BE', NULL, 'index', '', NULL, 1, 1),
(42, '_translations', 'search', 'fr_BE', NULL, 'search', '', NULL, 1, 1),
(43, '_translations', 'ok_push', 'fr_BE', NULL, 'ok_push', '', NULL, 1, 1),
(44, 'balance', 'details', 'fr_BE', NULL, 'details', '', NULL, 1, 1),
(45, 'invoices', 'add_company', 'fr_BE', NULL, 'add_company', '<p>Nueva Empresa: Puede crear una nueva empresa con un número de identificación fiscal, que será registrada automáticamente en la base de contactos del sistema</p>', NULL, 1, 1),
(46, 'contacts', 'balance', 'es_ES', NULL, 'balance', '', NULL, 1, 1),
(47, 'contacts', 'invoices', 'es_ES', NULL, 'invoices', '', NULL, 1, 1),
(48, 'expenses_references', 'index', 'es_ES', NULL, 'index', '', NULL, 1, 1),
(49, 'contacts', 'expenses', 'es_ES', NULL, 'expenses', '', NULL, 1, 1),
(50, 'invoices', 'search', 'fr_BE', NULL, 'search', '', NULL, 1, 1),
(51, 'contacts', 'budgets', 'fr_BE', NULL, 'budgets', '', NULL, 1, 1),
(52, 'contacts', 'credit_notes', 'fr_BE', NULL, 'credit_notes', '', NULL, 1, 1),
(53, '_menus', 'index', 'fr_BE', NULL, 'index', '', NULL, 1, 1),
(54, '_menus', 'search', 'fr_BE', NULL, 'search', '', NULL, 1, 1),
(55, '_menus', 'edit', 'fr_BE', NULL, 'edit', '', NULL, 1, 1),
(56, '_content', 'details', 'fr_BE', NULL, 'details', '', NULL, 1, 1),
(57, 'budgets', 'details', 'fr_BE', NULL, 'details', '<p>Hola pajaro con cola</p>', NULL, 1, 1),
(58, 'contacts', 'edit', 'es_ES', NULL, 'edit', '', NULL, 1, 1),
(59, 'budgets', 'edit', 'es_ES', NULL, 'editar', '<p>Hola, esto es para editar aqui encuentas</p><ol><li>el nombre del documento&nbsp;</li><li>fechas&nbsp;</li><li>qsdfqs</li><li>dfqs</li><li>df</li><li>qsdf</li><li>qsf</li><li>qsd</li><li>fqs</li><li>df</li><li>qsdf</li><li>qs</li><li>fqs</li><li>&nbsp;</li></ol>', NULL, 1, 1),
(60, '_languages', 'index', 'es_ES', NULL, 'index', '', NULL, 1, 1),
(61, 'budgets', 'editar', 'es_ES', NULL, 'editar', '', NULL, 1, 1),
(62, 'home', 'documentation', 'es_ES', NULL, 'documentation', '', NULL, 1, 1),
(63, 'docu', 'index', 'es_ES', NULL, 'index', '', NULL, 1, 1),
(64, 'docu', 'search', 'es_ES', NULL, 'search', '', NULL, 1, 1),
(65, '_content', 'index', 'es_ES', NULL, 'index', '', NULL, 1, 1),
(66, 'contacts', 'add', 'es_ES', NULL, 'add', '', NULL, 1, 1),
(67, 'gallery', 'ok_pic_user_add', 'es_ES', NULL, 'ok_pic_user_add', '', NULL, 1, 1),
(68, 'rols', 'index', 'en_GB', NULL, 'index', '', NULL, 1, 1),
(69, 'tasks_categories', 'index', 'fr_BE', NULL, 'index', '', NULL, 1, 1),
(70, 'tasks_categories', 'add', 'es_ES', NULL, 'add', '', NULL, 1, 1),
(71, 'invoices', 'add_contact', 'en_GB', NULL, 'add_contact', '<h2>Nuevo Cliente Privado: Esta opción te permite crear un nuevo contacto, el cual también será registrado automáticamente en la base de contactos del sistema</h2>', NULL, 1, 1),
(72, 'contacts', 'add_company', 'es_ES', NULL, 'add_company', '', NULL, 1, 1),
(73, 'invoices', 'add', 'es_ES', NULL, 'add', '<p>En la sección Mis contactos podrá buscar un contacto existente dentro del sistema&nbsp;</p>', NULL, 1, 1),
(74, 'config', 'invoices', 'es_ES', NULL, 'invoices', '', NULL, 1, 1),
(75, 'config', 'invoices_monthly', 'es_ES', NULL, 'invoices_monthly', '', NULL, 1, 1),
(76, 'config', 'logo', 'es_ES', NULL, 'logo', '', NULL, 1, 1),
(77, 'config', 'budgets', 'es_ES', NULL, 'budgets', '', NULL, 1, 1),
(78, 'config', 'credit_notes', 'es_ES', NULL, 'credit_notes', '', NULL, 1, 1),
(79, 'config', 'expenses', 'es_ES', NULL, 'expenses', '', NULL, 1, 1),
(80, 'config', 'balance', 'es_ES', NULL, 'balance', '', NULL, 1, 1),
(81, '_content', 'add_company', 'es_ES', NULL, 'add_company', '', NULL, 1, 1),
(82, '_content', 'add_contact', 'es_ES', NULL, 'add_contact', '', NULL, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `docu`
--
ALTER TABLE `docu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `controllers` (`controllers`,`action`,`language`),
  ADD KEY `language` (`language`),
  ADD KEY `docu_father_id` (`father_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `docu`
--
ALTER TABLE `docu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `docu`
--
ALTER TABLE `docu`
  ADD CONSTRAINT `docu_controller` FOREIGN KEY (`controllers`) REFERENCES `controllers` (`controller`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `docu_father_id` FOREIGN KEY (`father_id`) REFERENCES `docu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `docu_languages` FOREIGN KEY (`language`) REFERENCES `_languages` (`language`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;