-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-16 19:09:41 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'campos_index_cols_to_show', NULL, '[  \"id\", \"base_datos\", \"tabla\", \"campo\", \"accion\", \"label\", \"tipo\", \"clase\", \"nombre\", \"identificador\", \"marca_agua\", \"valor\", \"solo_lectura\", \"obligatorio\", \"seleccionado\", \"desactivado\", \"orden\", \"estatus\", ]', '123456789', 'campos', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'campos', NULL, 'campos', 'campos', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'campos', 'campos', 'campos') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'campos', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'campos', 'campos', 'index.php?c=campos', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
