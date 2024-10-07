 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'products_extras_index_cols_to_show', NULL, '[  \"id\", \"product_code\", \"extra_name\", \"extra_value\", \"price\", \"online\", \"order_by\", \"status\", ]', '123456789', 'products_extras', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'products_extras', NULL, 'products_extras', 'products_extras', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'products_extras', 'products_extras', 'products_extras') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'products_extras', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'products_extras', 'products_extras', 'index.php?c=products_extras', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
