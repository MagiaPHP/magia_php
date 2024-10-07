-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:38 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_employee_sizes_clothes_index_cols_to_show', NULL, '[  \"id\", \"employee_id\", \"clothes_code\", \"size\", \"notes\", \"order_by\", \"status\", ]', '123456789', 'hr_employee_sizes_clothes', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_employee_sizes_clothes', NULL, 'hr_employee_sizes_clothes', 'hr_employee_sizes_clothes', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_employee_sizes_clothes', 'hr_employee_sizes_clothes', 'hr_employee_sizes_clothes') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_employee_sizes_clothes', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_employee_sizes_clothes', 'hr_employee_sizes_clothes', 'index.php?c=hr_employee_sizes_clothes', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
