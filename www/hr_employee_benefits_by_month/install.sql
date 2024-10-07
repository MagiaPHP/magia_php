-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:04 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_employee_benefits_by_month_index_cols_to_show', NULL, '[  \"id\", \"employee_id\", \"year\", \"month\", \"benefit_code\", \"quantity\", \"price\", \"company_part\", \"employee_part\", \"company_part_value\", \"employee_part_value\", \"order_by\", \"status\", ]', '123456789', 'hr_employee_benefits_by_month', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_employee_benefits_by_month', NULL, 'hr_employee_benefits_by_month', 'hr_employee_benefits_by_month', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_employee_benefits_by_month', 'hr_employee_benefits_by_month', 'hr_employee_benefits_by_month') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_employee_benefits_by_month', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_employee_benefits_by_month', 'hr_employee_benefits_by_month', 'index.php?c=hr_employee_benefits_by_month', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
