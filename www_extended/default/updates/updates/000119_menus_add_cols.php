<?php

# Controller: _menus_locations
# Title: Add cols
# Description: Se agrega la columnas label e icon a _menus_locations 
# date: 01-20-25
// Consulta SQL separada en dos partes
$update = "
        

ALTER TABLE `_menus_locations` ADD `label` VARCHAR(250) NULL DEFAULT NULL AFTER `location`, ADD `icon` VARCHAR(250) NULL DEFAULT NULL AFTER `label`; 



";

