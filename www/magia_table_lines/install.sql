-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-08-31 17:08:04 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'magia_table_lines_index_cols_to_show', NULL, '[  \"id\", \"table_id\", \"header_icon\", \"header_pre_label\", \"header_label\", \"header_url\", \"header_post_label\", \"body_icon\", \"body_pre_label\", \"body_label\", \"body_post_label\", \"footer_icon\", \"footer_pre_label\", \"footer_label\", \"footer_post_label\", \"description\", \"permission\", \"align\", \"show\", \"translate\", \"order_by\", \"status\", ]', '123456789', 'magia_table_lines', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'magia_table_lines', NULL, 'magia_table_lines', 'magia_table_lines', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'magia_table_lines', 'magia_table_lines', 'magia_table_lines') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'magia_table_lines', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'magia_table_lines', 'magia_table_lines', 'index.php?c=magia_table_lines', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
