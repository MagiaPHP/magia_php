-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-26 16:09:00 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_payroll_index_cols_to_show', NULL, '[  \"id\", \"employee_id\", \"date_entry\", \"address\", \"fonction\", \"salary_base\", \"civil_status\", \"tax_system\", \"date_start\", \"date_end\", \"value_round\", \"to_pay\", \"account_number\", \"notes\", \"extras\", \"code\", \"date_registre\", \"order_by\", \"status\", ]', '123456789', 'hr_payroll', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_payroll', NULL, 'hr_payroll', 'hr_payroll', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_payroll', 'hr_payroll', 'hr_payroll') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_payroll', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_payroll', 'hr_payroll', 'index.php?c=hr_payroll', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
