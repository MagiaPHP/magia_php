-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:17 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_employee_family_dependents_index_cols_to_show', NULL, '[  \"id\", \"employee_id\", \"name\", \"lastname\", \"birthday\", \"relation\", \"in_charge\", \"handicap\", \"notes\", \"order_by\", \"status\", ]', '123456789', 'hr_employee_family_dependents', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_employee_family_dependents', NULL, 'hr_employee_family_dependents', 'hr_employee_family_dependents', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_employee_family_dependents', 'hr_employee_family_dependents', 'hr_employee_family_dependents') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_employee_family_dependents', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_employee_family_dependents', 'hr_employee_family_dependents', 'index.php?c=hr_employee_family_dependents', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
