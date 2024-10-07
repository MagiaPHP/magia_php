-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-10-01 09:10:44 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'contacts_index_cols_to_show', NULL, '[  \"id\", \"owner_id\", \"office_id\", \"type\", \"title\", \"name\", \"lastname\", \"description\", \"birthdate\", \"tva\", \"billing_method\", \"discounts\", \"code\", \"language\", \"registre_date\", \"order_by\", \"status\", ]', '123456789', 'contacts', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'contacts', NULL, 'contacts', 'contacts', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'contacts', 'contacts', 'contacts') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'contacts', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'contacts', 'contacts', 'index.php?c=contacts', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
