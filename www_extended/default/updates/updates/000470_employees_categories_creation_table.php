<?php

# Controller: employees_categories
# Title: Creation table employees_categories
# Description: Se crea la tabla employees_categories
# date: 

$update = "


ALTER TABLE `employees`
  MODIFY `cargo` VARCHAR(255) NOT NULL;


CREATE TABLE `factuxorg_demo`.`employees_categories` (`id` INT NOT NULL AUTO_INCREMENT , `category` VARCHAR(255) NOT NULL , `order_by` INT(11) NOT NULL DEFAULT '1' , `status` INT(1) NOT NULL DEFAULT '1' , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

ALTER TABLE `employees_categories` ADD UNIQUE(`category`); 

INSERT INTO `employees_categories` (`id`, `category`, `order_by`, `status`) VALUES (NULL, 'Employee', '1', '1') ; 
INSERT INTO `employees_categories` (`id`, `category`, `order_by`, `status`) VALUES (NULL, 'Secretary', '1', '1') ; 

UPDATE `employees` SET `cargo` = 'Employee' ; 

ALTER TABLE `employees` ADD FOREIGN KEY (`cargo`) REFERENCES `employees_categories`(`category`) ON DELETE NO ACTION ON UPDATE CASCADE; 








";

