-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 17:09:09 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'veh_maintenance_index_cols_to_show', NULL, '[  \"id\", \"vehicle_id\", \"workshop_id\", \"date\", \"type\", \"next_visit\", \"total\", \"kl\", \"notes\", \"date_registre\", \"order_by\", \"status\", ]', '123456789', 'veh_maintenance', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'veh_maintenance', NULL, 'veh_maintenance', 'veh_maintenance', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'veh_maintenance', 'veh_maintenance', 'veh_maintenance') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'veh_maintenance', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'veh_maintenance', 'veh_maintenance', 'index.php?c=veh_maintenance', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
