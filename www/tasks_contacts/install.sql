-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-26 17:09:16 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'tasks_contacts_index_cols_to_show', NULL, '[  \"id\", \"task_id\", \"contact_id\", \"date_registred\", \"order_by\", \"status\", ]', '123456789', 'tasks_contacts', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'tasks_contacts', NULL, 'tasks_contacts', 'tasks_contacts', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'tasks_contacts', 'tasks_contacts', 'tasks_contacts') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'tasks_contacts', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'tasks_contacts', 'tasks_contacts', 'index.php?c=tasks_contacts', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
