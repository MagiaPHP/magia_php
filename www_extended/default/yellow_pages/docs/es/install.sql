-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-08-17 14:08:23 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'yellow_pages_index_cols_to_show', NULL, '[  \"id\", \"contact_id\", \"web\", \"url\", \"target\", \"description\", \"order_by\", \"status\", ]', '123456789', 'yellow_pages', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'yellow_pages', NULL, 'yellow_pages', 'yellow_pages', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'yellow_pages', 'yellow_pages', 'yellow_pages') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'yellow_pages', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'yellow_pages', 'yellow_pages', 'index.php?c=yellow_pages', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
