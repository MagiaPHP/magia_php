<?php

# Controller: expenses
# Title: Add col date
# Description: Add col date and registre CURDATE()
# date: 01-20-25

$update = "

ALTER TABLE `expenses` ADD `date`      DATE NULL DEFAULT NULL AFTER `addresses_delivery`; 


UPDATE `expenses`
SET `date` = CURDATE();




";

