<?php

# Controller: addresses
# Title: Set null col region
# Description: Se pone por defecto null a region
# date: 

$update = "


ALTER TABLE `addresses` CHANGE `region` `region` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL; 

";

