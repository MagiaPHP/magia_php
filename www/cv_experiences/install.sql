-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-18 06:09:31 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'cv_experiences_index_cols_to_show', NULL, '[  \"id\", \"cv_id\", \"role\", \"company\", \"employment_type\", \"start_date\", \"end_date\", \"description\", \"order_by\", \"status\", ]', '123456789', 'cv_experiences', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'cv_experiences', NULL, 'cv_experiences', 'cv_experiences', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'cv_experiences', 'cv_experiences', 'cv_experiences') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'cv_experiences', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'cv_experiences', 'cv_experiences', 'index.php?c=cv_experiences', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
