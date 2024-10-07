<?php

# Controller: expense_lines
# Title: updates
# Description: se agrega coo llave extranjera tax
# date: 01-20-25
// Consulta SQL separada en dos partes
$update = "
        
    ALTER TABLE `expense_lines` ADD CONSTRAINT `expense_lines_tax` FOREIGN KEY (`tax`) REFERENCES `tax`(`value`) ON DELETE NO ACTION ON UPDATE CASCADE; 

";

