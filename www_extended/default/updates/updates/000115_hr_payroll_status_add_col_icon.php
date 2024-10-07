<?php

# Controller: hr_payroll_status
# Title: Add col icon
# Description: Se agrega la columna icon
# date: 01-20-25
// Consulta SQL separada en dos partes
$update = "
        
ALTER TABLE `hr_payroll_status` ADD `icon` VARCHAR(250) NULL DEFAULT NULL AFTER `name`; 


";

