-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-08-31 17:08:35 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'magia_forms_lines_index_cols_to_show', NULL, '[  \"id\", \"mg_form_id\", \"mg_type\", \"mg_external_table\", \"mg_external_col\", \"mg_label\", \"mg_help_text\", \"mg_name\", \"mg_id\", \"mg_placeholder\", \"mg_value\", \"mg_class\", \"mg_required\", \"mg_disabled\", \"order_by\", \"status\", ]', '123456789', 'magia_forms_lines', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'magia_forms_lines', NULL, 'magia_forms_lines', 'magia_forms_lines', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'magia_forms_lines', 'magia_forms_lines', 'magia_forms_lines') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'magia_forms_lines', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'magia_forms_lines', 'magia_forms_lines', 'index.php?c=magia_forms_lines', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
