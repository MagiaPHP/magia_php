<?php

# 
# Controller: _menus
# Title: Add col location
# Description: Se agrega la key extranjera al menu 
# date: 01-20-25

$update = "

ALTER TABLE `_menus` ADD FOREIGN KEY (`location`) REFERENCES `_menus_locations`(`location`) ON DELETE NO ACTION ON UPDATE CASCADE; 


";

