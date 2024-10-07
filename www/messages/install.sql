-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-26 08:09:54 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'messages_index_cols_to_show', NULL, '[  \"id\", \"type\", \"message\", \"url_action\", \"url_label\", \"controller\", \"doc_id\", \"contact_id\", \"rol\", \"date_start\", \"date_end\", \"date_registre\", \"read_by\", \"is_logued\", \"order_by\", \"status\", ]', '123456789', 'messages', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'messages', NULL, 'messages', 'messages', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'messages', 'messages', 'messages') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'messages', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'messages', 'messages', 'index.php?c=messages', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
