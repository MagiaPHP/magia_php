 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'banks_index_cols_to_show', NULL, '[  \"id\", \"contact_id\", \"bank\", \"account_number\", \"bic\", \"iban\", \"code\", \"codification\", \"delimiter\", \"date_format\", \"thousands_separator\", \"decimal_separator\", \"invoices\", \"order_by\", \"status\", ]', '123456789', 'banks', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'banks', NULL, 'banks', 'banks', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'banks', 'banks', 'banks') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'banks', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'banks', 'banks', 'index.php?c=banks', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
