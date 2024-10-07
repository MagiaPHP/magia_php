<?php

# Controller: credit_notes
# Title: Add col office_id
# Description: Add col office_id and registre 1022 
# date: 01-20-25

$update = "


ALTER TABLE `credit_notes` ADD `office_id` INT NULL  DEFAULT NULL AFTER `id`; 


-- Agrego 1022 como oficina por defecto 

UPDATE credit_notes
SET office_id = 1022
WHERE office_id IS NULL;

";
