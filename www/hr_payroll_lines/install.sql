-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:54 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_payroll_lines_index_cols_to_show', NULL, '[  \"id\", \"payroll_id\", \"code\", \"in_out\", \"days\", \"quantity\", \"value\", \"description\", \"formula\", \"order_by\", \"status\", ]', '123456789', 'hr_payroll_lines', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_payroll_lines', NULL, 'hr_payroll_lines', 'hr_payroll_lines', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_payroll_lines', 'hr_payroll_lines', 'hr_payroll_lines') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_payroll_lines', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_payroll_lines', 'hr_payroll_lines', 'index.php?c=hr_payroll_lines', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
