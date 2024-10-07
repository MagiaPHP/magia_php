-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:43 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_employee_worked_days_formule_index_cols_to_show', NULL, '[  \"id\", \"employee_id\", \"month\", \"year\", \"column\", \"value\", \"formule\", \"notes\", \"code\", \"date_registre\", \"order_by\", \"status\", ]', '123456789', 'hr_employee_worked_days_formule', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_employee_worked_days_formule', NULL, 'hr_employee_worked_days_formule', 'hr_employee_worked_days_formule', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_employee_worked_days_formule', 'hr_employee_worked_days_formule', 'hr_employee_worked_days_formule') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_employee_worked_days_formule', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_employee_worked_days_formule', 'hr_employee_worked_days_formule', 'index.php?c=hr_employee_worked_days_formule', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
