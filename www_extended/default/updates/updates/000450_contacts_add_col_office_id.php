<?php

# Controller: contacts
# Title: Add col office_id
# Description: Se agrega la columna office_id
# date: 

$update = "


ALTER TABLE `contacts` ADD `office_id` INT NULL DEFAULT NULL AFTER `owner_id`; 


";

