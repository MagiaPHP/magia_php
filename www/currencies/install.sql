-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-04 08:09:19 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'currencies_index_cols_to_show', NULL, '[  \"id\", \"name\", \"code\", \"rate\", \"rate_silent\", \"rate_id\", \"accuracy\", \"rounding\", \"active\", \"company_id\", \"date\", \"base\", \"position\", \"order_by\", \"status\", ]', '123456789', 'currencies', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'currencies', NULL, 'currencies', 'currencies', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'currencies', 'currencies', 'currencies') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'currencies', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'currencies', 'currencies', 'index.php?c=currencies', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
