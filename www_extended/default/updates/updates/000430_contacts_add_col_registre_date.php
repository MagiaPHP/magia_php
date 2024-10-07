<?php

# Controller: contacts
# Title: Add col registre_date
# Description: Se agrega la columna registre_date
# date: 

$update = "

ALTER TABLE `contacts` ADD `registre_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `language`; 



";

