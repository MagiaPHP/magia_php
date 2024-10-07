<?php

# Controller: updates
# Title: updates
# Description: Se pasa de 50 a 250 los caracteres de la columna version
# date: 01-20-25

$update = "


ALTER TABLE `updates` CHANGE `version` `version` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL; 
ALTER TABLE `updates` CHANGE `name` `name` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL; 

";

