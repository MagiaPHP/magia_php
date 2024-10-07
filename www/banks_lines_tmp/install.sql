-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 12:09:10 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'banks_lines_tmp_index_cols_to_show', NULL, '[  \"id\", \"account_number\", \"template\", \"order_by\", \"status\", ]', '123456789', 'banks_lines_tmp', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'banks_lines_tmp', NULL, 'banks_lines_tmp', 'banks_lines_tmp', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'banks_lines_tmp', 'banks_lines_tmp', 'banks_lines_tmp') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'banks_lines_tmp', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'banks_lines_tmp', 'banks_lines_tmp', 'index.php?c=banks_lines_tmp', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
