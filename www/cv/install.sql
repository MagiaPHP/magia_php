-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-18 07:09:41 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'cv_index_cols_to_show', NULL, '[  \"id\", \"first_name\", \"last_name\", \"address\", \"city\", \"postal_code\", \"phone_number\", \"email\", \"driver_license\", \"birth_date\", \"availability\", \"professional_goal\", \"summary\", \"hobbies\", \"created_at\", \"work_experience\", \"education\", \"technologies\", \"skills\", \"projects\", \"languages\", \"order_by\", \"status\", ]', '123456789', 'cv', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'cv', NULL, 'cv', 'cv', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'cv', 'cv', 'cv') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'cv', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'cv', 'cv', 'index.php?c=cv', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
