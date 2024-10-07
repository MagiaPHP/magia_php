-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-10-02 17:10:10 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'addresses_index_cols_to_show', NULL, '[  \"id\", \"contact_id\", \"name\", \"address\", \"number\", \"postcode\", \"barrio\", \"sector\", \"ref\", \"city\", \"province\", \"region\", \"country\", \"code\", \"status\", ]', '123456789', 'addresses', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'addresses', NULL, 'addresses', 'addresses', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'addresses', 'addresses', 'addresses') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'addresses', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'addresses', 'addresses', 'index.php?c=addresses', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
