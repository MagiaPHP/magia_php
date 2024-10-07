-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-18 03:09:07 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'cv_motivation_letter_index_cols_to_show', NULL, '[  \"id\", \"sender_name\", \"sender_email\", \"sender_phone\", \"sender_address\", \"letter_date\", \"recipient_name\", \"recipient_position\", \"recipient_company\", \"recipient_address\", \"greeting\", \"introduction\", \"body_experience\", \"body_achievements\", \"motivation\", \"closing\", \"farewell\", \"signature\", \"order_by\", \"status\", ]', '123456789', 'cv_motivation_letter', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'cv_motivation_letter', NULL, 'cv_motivation_letter', 'cv_motivation_letter', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'cv_motivation_letter', 'cv_motivation_letter', 'cv_motivation_letter') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'cv_motivation_letter', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'cv_motivation_letter', 'cv_motivation_letter', 'index.php?c=cv_motivation_letter', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
