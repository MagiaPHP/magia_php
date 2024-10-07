-- 
-- Documento creado con mago de Magia_PHP 
-- http://magiaphp.com 
-- Fecha de creacion del documento: 2024-09-23 19:09:40 
--
 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`)  VALUES (
 (NULL, 'cv_jobs_index_cols_to_show', NULL, '[  \"id\", \"job_title\", \"reference_number\", \"creation_date\", \"company_name\", \"location\", \"ciudad\", \"working_hours\", \"contract_type\", \"job_family\", \"job_description\", \"profile\", \"language_requirements\", \"employer_name\", \"contact_person\", \"application_mode\", \"website_url\", \"order_by\", \"status\", ]', '123456789', 'cv_jobs', '1', '1' );
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'cv_jobs', NULL, 'cv_jobs', 'cv_jobs', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'cv_jobs', 'cv_jobs', 'cv_jobs') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'cv_jobs', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'cv_jobs', 'cv_jobs', 'index.php?c=cv_jobs', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
