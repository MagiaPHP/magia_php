-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:13 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_maintenance_lines_index_cols_to_show', NULL, '[  \"id\", \"maintenance_id\", \"description\", \"price\", \"quantity\", \"total\", \"order_by\", \"status\", ]', '123456789', 'veh_maintenance_lines', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_maintenance_lines', NULL, 'veh_maintenance_lines', 'veh_maintenance_lines', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_maintenance_lines', 'veh_maintenance_lines', 'veh_maintenance_lines') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_maintenance_lines', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_maintenance_lines', 'veh_maintenance_lines', 'index.php?c=veh_maintenance_lines', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
