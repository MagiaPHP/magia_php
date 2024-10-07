<?php

# Controller: contacts
# Title: Add col registre_date
# Description: Se agrega la columna registre_date
# date: 

$update = "


ALTER TABLE `contacts` ADD `description` TEXT NULL DEFAULT NULL AFTER `lastname`; 


";

