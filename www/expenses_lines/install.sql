-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-04 08:09:28 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'expenses_lines_index_cols_to_show', NULL, '[  \"id\", \"expense_id\", \"budget_id\", \"category_code\", \"code\", \"quantity\", \"description\", \"price\", \"discounts\", \"discounts_mode\", \"tax\", \"order_by\", \"status\", ]', '123456789', 'expenses_lines', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'expenses_lines', NULL, 'expenses_lines', 'expenses_lines', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'expenses_lines', 'expenses_lines', 'expenses_lines') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'expenses_lines', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'expenses_lines', 'expenses_lines', 'index.php?c=expenses_lines', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
