ALTER TABLE `_menus` ADD FOREIGN KEY (`location`) REFERENCES `_menus_locations`(`location`) ON DELETE NO ACTION ON UPDATE CASCADE; 
