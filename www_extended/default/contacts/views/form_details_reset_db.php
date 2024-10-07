<h3><?php _t("DB"); ?></h3>

<form class="form-horizontal" method="" action="">




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Reset"); ?></label>	
        <div class="col-sm-6">    		
            <textarea class="form-control" name="db" rows="50">
                
 
UPDATE `contacts` SET `name` = '<?php echo $coo->getName(); ?>' WHERE `contacts`.`id` = 1022; 
UPDATE `contacts` SET `tva` = '<?php echo $coo->getTva(); ?>' WHERE `contacts`.`id` = 1022; 
UPDATE `contacts` SET `owner_id` = NULL WHERE `contacts`.`owner_id` != 1022 ; 

UPDATE `_options` SET `data` = '<?php echo $coo->getName(); ?>' WHERE `_options`.`option` = 'config_company_name'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getTva(); ?>' WHERE `_options`.`option` = 'config_company_tva'; 
UPDATE `_options` SET `data` = 'laNiebla.jpg' WHERE `_options`.`option` = 'config_company_logo'; 
  
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getAddress(); ?>' WHERE `_options`.`option` = 'config_company_a_address'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getNumber(); ?>' WHERE `_options`.`option` = 'config_company_a_number'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getPostcode(); ?>' WHERE `_options`.`option` = 'config_company_a_postal_code'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getBarrio(); ?>' WHERE `_options`.`option` = 'config_company_a_barrio'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getCity(); ?>' WHERE `_options`.`option` = 'config_company_a_city'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getAddresses("Billing")->getCountry(); ?>' WHERE `_options`.`option` = 'config_company_a_country'; 
  
UPDATE `_options` SET `data` = '<?php echo $coo->getDirectory('Tel'); ?>' WHERE `_options`.`option` = 'config_company_tel'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getDirectory('Web'); ?>' WHERE `_options`.`option` = 'config_company_url'; 
UPDATE `_options` SET `data` = '<?php echo $coo->getDirectory('Email'); ?>' WHERE `_options`.`option` = 'config_company_email';
 
UPDATE `_options` SET `data` = 'laNiebla' WHERE `_options`.`option` = 'config_favicon';
UPDATE `_options` SET `data` = '<?php echo $coo->getDirectory('Email-secure'); ?>' WHERE `_options`.`option` = 'config_company_email_secure';

UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_host'; 
UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_username'; 
UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_password';
 
UPDATE `_options` SET `data` = 'laNiebla' WHERE `_options`.`option` = 'invitation_code'; 
UPDATE `_options` SET `data` = 'audio' WHERE `_options`.`option` = 'doc_model'; 

UPDATE `_options` SET `data` = 'Banque ABC' WHERE `_options`.`option` = 'config_bank_bank'; 
UPDATE `_options` SET `data` = '001-123456-789' WHERE `_options`.`option` = 'config_bank_account_number'; 
UPDATE `_options` SET `data` = 'BIC123' WHERE `_options`.`option` = 'config_bank_bic'; 
UPDATE `_options` SET `data` = 'IBAN123' WHERE `_options`.`option` = 'config_bank_iban'; 
UPDATE `_options` SET `data` = 'BANCCODE' WHERE `_options`.`option` = 'config_bank_code';  

UPDATE `_options` SET `data` = '' WHERE `_options`.`option` = 'config_company_name2'; 
UPDATE `_options` SET `data` = '' WHERE `_options`.`option` = 'config_company_url2'; 

UPDATE `modules` SET `status` = '0' WHERE `modules`.`name` = 'audio'; 
UPDATE `modules` SET `status` = '0' WHERE `modules`.`name` = 'products';

UPDATE `credit_notes` SET `invoice_id` = NULL ; 
UPDATE `orders` SET `bac` = null ; 
UPDATE `orders` SET `remake` = null ;  
UPDATE `bacs` SET `order_id` = null ; 

DELETE FROM budgets_invoices;
DELETE FROM budget_lines;
DELETE FROM invoice_lines;
DELETE FROM orders_lines;
DELETE FROM comments;
DELETE FROM _diccionario;

DELETE FROM `users` WHERE `users`.`email` != 'robincoello@hotmail.com';

TRUNCATE TABLE `balance`;
TRUNCATE `budget_lines`;
TRUNCATE `credit_note_lines`;
TRUNCATE `invoice_lines`;
TRUNCATE `orders_lines`;
TRUNCATE `budgets_invoices`;
TRUNCATE `credit_note_lines`;
TRUNCATE `invoice_lines`;
TRUNCATE `logs`;
TRUNCATE `patients`;
TRUNCATE `clients`;
TRUNCATE `contacts_positions`;
TRUNCATE `schedule`;
TRUNCATE `users_ask_pass`;
TRUNCATE `orders_budgets`;
TRUNCATE `orders_files_comments`;
TRUNCATE `orders_remake`;
TRUNCATE `balance`;
TRUNCATE `addresses_transport`;

DELETE FROM addresses ;
DELETE FROM directory ;
DELETE FROM orders_files ;
 
DELETE FROM `employees`;

DELETE FROM `directory`;  
DELETE FROM `contacts` WHERE `contacts`.`owner_id` = NULL;  
DELETE FROM `users` WHERE `users`.`email` != 'robincoello@hotmail.com';
DELETE FROM `agenda_comments`;
DELETE FROM `agenda_price`;
DELETE FROM `agenda_dates_places`;
DELETE FROM `agenda`;
DELETE FROM `agenda_public`;
DELETE FROM `agenda_categories`;
DELETE FROM `agenda_public`;

DELETE FROM `credit_notes_counter`;
DELETE FROM `credit_note_lines`;
DELETE FROM `credit_notes`;
DELETE FROM `gallery`;
DELETE FROM `invoices_counter`;
DELETE FROM `invoice_lines`;
DELETE FROM `invoices`;
DELETE FROM `orders`;
DELETE FROM `comments_read`;
DELETE FROM `comments_folders`;
DELETE FROM budgets;
DELETE FROM banks;
DELETE FROM `contacts` WHERE `contacts`.`id` > 2500;
DELETE FROM `gallery`;
DELETE FROM `budgets`;
DELETE FROM contacts WHERE `contacts`.`owner_id` is null;
DELETE FROM contacts WHERE `contacts`.`id` > 2475;


INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`) 
VALUES (NULL, '1022', '0', 'Mr.', 'name', 'lastname', '1900-01-01', NULL, NULL, NULL, '<?php echo magia_uniqid(); ?>', 'fr_BE', '1', '1') 




            </textarea>
        </div>
    </div>	









</form>