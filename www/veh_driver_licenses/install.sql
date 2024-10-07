-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:51 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_driver_licenses_index_cols_to_show', NULL, '[  \"id\", \"category\", \"description\", \"min_age\", \"max_weight\", \"max_passengers\", \"notes\", \"order_by\", \"status\", ]', '123456789', 'veh_driver_licenses', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_driver_licenses', NULL, 'veh_driver_licenses', 'veh_driver_licenses', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_driver_licenses', 'veh_driver_licenses', 'veh_driver_licenses') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_driver_licenses', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_driver_licenses', 'veh_driver_licenses', 'index.php?c=veh_driver_licenses', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
