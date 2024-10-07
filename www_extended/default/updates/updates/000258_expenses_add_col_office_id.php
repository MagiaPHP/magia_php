<?php

# Controller: expenses
# Title: Add col office_id, date
# Description: Add col office_id and registre 1022 
# date: 01-20-25

$update = "


ALTER TABLE `expenses` ADD `office_id` INT NULL  DEFAULT NULL AFTER `id`; 


-- Agrego 1022 como oficina por defecto 

UPDATE expenses
SET office_id = 1022
WHERE office_id IS NULL;

";

