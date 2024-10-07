-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-08-23 20:08:29 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'inv_transsactions_index_cols_to_show', NULL, '[  \"id\", \"company_id\", \"product\", \"transaction_number\", \"period\", \"start_date\", \"operation_number\", \"currency\", \"amount\", \"percentage\", \"term\", \"interest\", \"total\", \"retencion\", \"company_comission\", \"comision_bolsa\", \"total_receivable\", \"expiration_date\", \"order_by\", \"status\", ]', '123456789', 'inv_transsactions', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'inv_transsactions', NULL, 'inv_transsactions', 'inv_transsactions', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'inv_transsactions', 'inv_transsactions', 'inv_transsactions') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'inv_transsactions', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'inv_transsactions', 'inv_transsactions', 'index.php?c=inv_transsactions', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
