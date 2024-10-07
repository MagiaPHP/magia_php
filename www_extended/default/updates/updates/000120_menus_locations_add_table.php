<?php
# Controller: _menus_locations
# Title: Add table _menus_locations
# Description: Para una mejor gestion de los menus se agrega una tabla _menus_locations
# date: 01-20-25


$update = "

-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2024 at 02:27 PM
-- Server version: 10.11.8-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `_menus_locations` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `order_by` int(11) DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `_menus_locations` (`id`, `location`, `order_by`, `status`) VALUES
(1, 'location', 1, 1),
(2, 'top', 1, 1),
(3, 'footer', 1, 1),
(4, 'side', 1, 1),
(5, 'top2', 1, 1),
(6, 'robin1', 1, 1),
(7, 'nav', 1, 1),
(8, 'panel_list_add', 1, 1),
(9, 'panel_list_by_status', 1, 1),
(10, 'panel_list_by_type', 1, 1),
(11, ' ', 1, 1);


ALTER TABLE `_menus_locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`);


ALTER TABLE `_menus_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1250;
COMMIT;




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





";

