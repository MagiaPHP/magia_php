-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:17 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_vehicle_activities_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"driver_id\", \"start_date\", \"time_start\", \"kl_start\", \"end_date\", \"time_end\", \"kl_end\", \"order_by\", \"status\", \"kl_difference\", ]', '123456789', 'veh_vehicle_activities', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_vehicle_activities', NULL, 'veh_vehicle_activities', 'veh_vehicle_activities', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_vehicle_activities', 'veh_vehicle_activities', 'veh_vehicle_activities') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_vehicle_activities', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_vehicle_activities', 'veh_vehicle_activities', 'index.php?c=veh_vehicle_activities', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
