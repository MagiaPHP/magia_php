<?php

# Controller: expenses
# Title: Del col counter
# Description: Se borra la comumna counter
# date: 2024-09-23

$update = "
        
    ALTER TABLE `expenses` DROP `counter`; 

";

