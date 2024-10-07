-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-27 12:09:05 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'blog_comments_index_cols_to_show', NULL, '[  \"id\", \"blog_id\", \"title\", \"comment\", \"author_id\", \"date\", \"order_by\", \"status\", ]', '123456789', 'blog_comments', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'blog_comments', NULL, 'blog_comments', 'blog_comments', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'blog_comments', 'blog_comments', 'blog_comments') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'blog_comments', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'blog_comments', 'blog_comments', 'index.php?c=blog_comments', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
