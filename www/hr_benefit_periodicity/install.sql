-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-21 12:09:09 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'hr_benefit_periodicity_index_cols_to_show', NULL, '[  \"id\", \"code\", \"periodicity\", \"order_by\", \"status\", ]', '123456789', 'hr_benefit_periodicity', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'hr_benefit_periodicity', NULL, 'hr_benefit_periodicity', 'hr_benefit_periodicity', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'hr_benefit_periodicity', 'hr_benefit_periodicity', 'hr_benefit_periodicity') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'hr_benefit_periodicity', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'hr_benefit_periodicity', 'hr_benefit_periodicity', 'index.php?c=hr_benefit_periodicity', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
