 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'schedule_index_cols_to_show', NULL, '[  \"id\", \"contact_id\", \"day\", \"am_start\", \"am_end\", \"pm_start\", \"pm_end\", \"order_by\", \"status\", ]', '123456789', 'schedule', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'schedule', NULL, 'schedule', 'schedule', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'schedule', 'schedule', 'schedule') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'schedule', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'schedule', 'schedule', 'index.php?c=schedule', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
