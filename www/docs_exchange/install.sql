 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'docs_exchange_index_cols_to_show', NULL, '[  \"id\", \"reciver_tva\", \"sender_name\", \"label\", \"sender_tva\", \"doc_type\", \"doc_id\", \"json\", \"pdf_base64\", \"date_send\", \"order_by\", \"status\", ]', '123456789', 'docs_exchange', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'docs_exchange', NULL, 'docs_exchange', 'docs_exchange', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'docs_exchange', 'docs_exchange', 'docs_exchange') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'docs_exchange', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'docs_exchange', 'docs_exchange', 'index.php?c=docs_exchange', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
