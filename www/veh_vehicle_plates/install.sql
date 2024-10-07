-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:32 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_vehicle_plates_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"plate\", \"date_start\", \"date_end\", \"old_plate\", \"date_registre\", \"order_by\", \"status\", ]', '123456789', 'veh_vehicle_plates', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_vehicle_plates', NULL, 'veh_vehicle_plates', 'veh_vehicle_plates', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_vehicle_plates', 'veh_vehicle_plates', 'veh_vehicle_plates') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_vehicle_plates', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_vehicle_plates', 'veh_vehicle_plates', 'index.php?c=veh_vehicle_plates', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
