<?php

/**
 * Esto actualiza el plugin
 * 
 */
function investments_db_create() {
    $db = '

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `amount` decimal(9,0) DEFAULT NULL,
  `days` int(11) NOT NULL,
  `rate` decimal(9,2) NOT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  `retention` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institution_id` (`institution_id`,`operation`),
  ADD UNIQUE KEY `institution_id_2` (`institution_id`,`ref`);

ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `investments`
  ADD CONSTRAINT `investments_contact_id` FOREIGN KEY (`institution_id`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
';
}
