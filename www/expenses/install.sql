-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-23 11:09:25 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'expenses_index_cols_to_show', NULL, '[  \"id\", \"office_id\", \"office_id_counter_year_month\", \"office_id_counter_year_trimestre\", \"office_id_counter\", \"my_ref\", \"father_id\", \"category_code\", \"invoice_number\", \"budget_id\", \"credit_note_id\", \"provider_id\", \"seller_id\", \"clon_from_id\", \"title\", \"addresses_billing\", \"addresses_delivery\", \"date\", \"date_registre\", \"deadline\", \"total\", \"tax\", \"advance\", \"balance\", \"comments\", \"comments_private\", \"r1\", \"r2\", \"r3\", \"fc\", \"date_update\", \"days\", \"ce\", \"code\", \"type\", \"every\", \"times\", \"date_start\", \"date_end\", \"order_by\", \"status\", ]', '123456789', 'expenses', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'expenses', NULL, 'expenses', 'expenses', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'expenses', 'expenses', 'expenses') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'expenses', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'expenses', 'expenses', 'index.php?c=expenses', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
