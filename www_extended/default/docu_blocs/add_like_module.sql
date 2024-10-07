INSERT INTO `modules` (`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) VALUES (NULL, 'Docu_blocs', NULL, 'docu_blocs', 'docu_blocs', 'robinson coello', 'robincoello@hotmail.com', 'http://coello.be', '0.0.1', '1', '1') ; 

INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (NULL, 'docu_blocs', 'docu_blocs', 'docu_blocs') ; 

INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, 'root', 'docu_blocs', '1111') 




