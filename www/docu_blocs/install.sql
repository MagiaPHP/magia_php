-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-22 18:09:53 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'docu_blocs_index_cols_to_show', NULL, '[  \"id\", \"docu_id\", \"bloc\", \"title\", \"post\", \"h\", \"order_by\", \"status\", ]', '123456789', 'docu_blocs', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'docu_blocs', NULL, 'docu_blocs', 'docu_blocs', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'docu_blocs', 'docu_blocs', 'docu_blocs') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'docu_blocs', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'docu_blocs', 'docu_blocs', 'index.php?c=docu_blocs', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
