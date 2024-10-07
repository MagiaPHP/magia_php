<?php

# Controller: credit_notes
# Title: Add col date
# Description: Add col date and registre CURDATE()
# date: 01-20-25

$update = "

ALTER TABLE `credit_notes` ADD `date`      DATE NULL DEFAULT NULL AFTER `addresses_delivery`; 


UPDATE `credit_notes`
SET `date` = CURDATE();




";

