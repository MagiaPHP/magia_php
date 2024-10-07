-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:42 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_vehicles_fuel_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"fuel_code\", \"date\", \"price\", \"paid_by\", \"ref\", \"notes\", \"registred_by\", \"date_registre\", \"kl\", \"order_by\", \"status\", ]', '123456789', 'veh_vehicles_fuel', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_vehicles_fuel', NULL, 'veh_vehicles_fuel', 'veh_vehicles_fuel', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_vehicles_fuel', 'veh_vehicles_fuel', 'veh_vehicles_fuel') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_vehicles_fuel', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_vehicles_fuel', 'veh_vehicles_fuel', 'index.php?c=veh_vehicles_fuel', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
