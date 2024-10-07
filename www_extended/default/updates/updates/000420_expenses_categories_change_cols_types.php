<?php

# Controller: expenses_categories
# Title: expenses_categories
# Description: Se cambia de int a string code y father_code
# date: 01-20-25

$update = "


 ALTER TABLE `expenses_lines` DROP INDEX `expenses_lines_category`; 
 
ALTER TABLE `expenses_lines` DROP `category_code`;
 

ALTER TABLE `expenses` DROP `category_code`; 

ALTER TABLE `expenses_lines` DROP `category_code`; 

DROP TABLE `expenses_categories`; 



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE `expenses_categories` (
  `id` int(11) NOT NULL,
  `code` varchar(250) DEFAULT NULL,
  `father_code` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `category` (`category`);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--











";

