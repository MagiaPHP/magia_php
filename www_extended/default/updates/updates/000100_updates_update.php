<?php

# Controller: updates
# Title: Varios cambios en la tabla update
# Description: Actualiza la tabla updates con varios cambios 
# date: 01-20-25

$update = "
    ALTER TABLE `updates` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
    CHANGE `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    CHANGE `code_install` `code_install` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `code_uninstall` `code_uninstall` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `code_check` `code_check` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `installed` `installed` INT(1) NULL DEFAULT NULL, CHANGE `order_by` `order_by` INT(11) NOT NULL DEFAULT '1', 
    CHANGE `status` `status` INT(1) NOT NULL DEFAULT '1'; 

";

