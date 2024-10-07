<?php

# Controller: yellow_pages_categories
# Title: Agrego icon en yellow_pages_categories
# Description: Agrega la columna <code>icon</code> a la table yellow_pages_categories
# date: 01-20-25

$update = "

ALTER TABLE `yellow_pages_categories` ADD `icon` VARCHAR(250) NULL DEFAULT 'menu-right' AFTER `id`; 


";

