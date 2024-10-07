 
--
--


INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`) 
VALUES 
(NULL, 'banks_lines_check_index_cols_to_show', NULL, '[\"id\",\"my_account\",\"operation\",\"date_operation\",\"description\",\"type\",\"total\",\"currency\",\"date_value\",\"account_sender\",\"sender\",\"comunication\",\"ce\",\"details\",\"message\",\"id_office\",\"office_name\",\"value_bankCheck_transaction\",\"countable_balance\",\"suffix_account\",\"sequential\",\"available_balance\",\"debit\",\"credit\",\"ref\",\"ref2\",\"ref3\",\"ref4\",\"ref5\",\"ref6\",\"ref7\",\"ref8\",\"ref9\",\"ref10\",\"date_registre\",\"code\",\"order_by\",\"status\"]', '123456789', 'banks_lines_check', '1', '1') ; 

-- 
-- 
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'banks_lines_check', NULL, 'banks_lines_check', 'banks_lines_check', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'banks_lines_check', 'banks_lines_check', 'banks_lines_check') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'banks_lines_check', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'banks_lines_check', 'banks_lines_check', 'index.php?c=banks_lines_check', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
