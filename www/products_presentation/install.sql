 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'products_presentation_index_cols_to_show', NULL, '[  \"id\", \"product_code\", \"presentation_code\", \"contains_total\", \"contains_code\", \"height\", \"width\", \"depth\", \"weight\", \"code\", \"order_by\", \"status\", ]', '123456789', 'products_presentation', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'products_presentation', NULL, 'products_presentation', 'products_presentation', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'products_presentation', 'products_presentation', 'products_presentation') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'products_presentation', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'products_presentation', 'products_presentation', 'index.php?c=products_presentation', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
