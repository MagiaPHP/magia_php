-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:25 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_vehicle_kilometers_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"event_date\", \"kl\", \"event_type\", \"event_id\", \"created_at\", \"order_by\", \"status\", ]', '123456789', 'veh_vehicle_kilometers', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_vehicle_kilometers', NULL, 'veh_vehicle_kilometers', 'veh_vehicle_kilometers', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_vehicle_kilometers', 'veh_vehicle_kilometers', 'veh_vehicle_kilometers') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_vehicle_kilometers', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_vehicle_kilometers', 'veh_vehicle_kilometers', 'index.php?c=veh_vehicle_kilometers', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
