-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:21 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_vehicle_insurances_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"insurance_code\", \"date_start\", \"date_end\", \"contrat_number\", \"countries_ok\", \"order_by\", \"status\", ]', '123456789', 'veh_vehicle_insurances', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_vehicle_insurances', NULL, 'veh_vehicle_insurances', 'veh_vehicle_insurances', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_vehicle_insurances', 'veh_vehicle_insurances', 'veh_vehicle_insurances') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_vehicle_insurances', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_vehicle_insurances', 'veh_vehicle_insurances', 'index.php?c=veh_vehicle_insurances', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
