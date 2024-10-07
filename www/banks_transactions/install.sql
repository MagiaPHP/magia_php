-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 12:09:23 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'banks_transactions_index_cols_to_show', NULL, '[  \"id\", \"client_id\", \"document\", \"document_id\", \"type\", \"account_number\", \"total\", \"operation_number\", \"date\", \"ref\", \"description\", \"ce\", \"details\", \"message\", \"currency\", \"code\", \"registre_date\", \"created_date\", \"updated_date\", \"canceled_code\", \"order_by\", \"status\", ]', '123456789', 'banks_transactions', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'banks_transactions', NULL, 'banks_transactions', 'banks_transactions', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'banks_transactions', 'banks_transactions', 'banks_transactions') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'banks_transactions', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'banks_transactions', 'banks_transactions', 'index.php?c=banks_transactions', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
