<h3><?php _t("Export data"); ?></h3>

<form class="form-horizontal" method="" action="">
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("DATA"); ?></label>	
        <div class="col-sm-10">    		
            <textarea class="form-control" name="db" rows="50">
                
 
UPDATE `contacts` SET `name` = '<?php echo $export_data->getName(); ?>' WHERE `contacts`.`id` = 1022; 
UPDATE `contacts` SET `owner_id` = NULL WHERE `contacts`.`owner_id` != 1022 ; 

UPDATE `_options` SET `data` = 'laNiebla.jpg' WHERE `_options`.`option` = 'config_company_logo';    
UPDATE `_options` SET `data` = 'laNiebla' WHERE `_options`.`option` = 'config_favicon';
UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_host'; 
UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_username'; 
UPDATE `_options` SET `data` = '0' WHERE `_options`.`option` = 'config_mail_password';
UPDATE `_options` SET `data` = 'laNiebla' WHERE `_options`.`option` = 'invitation_code'; 
UPDATE `_options` SET `data` = 'audio' WHERE `_options`.`option` = 'doc_model'; 
UPDATE `_options` SET `data` = '' WHERE `_options`.`option` = 'config_company_name2'; 
UPDATE `_options` SET `data` = '' WHERE `_options`.`option` = 'config_company_url2'; 

UPDATE `credit_notes` SET `invoice_id` = NULL ; 
UPDATE `invoices` SET `credit_note_id` = NULL ; 
UPDATE `orders` SET `bac` = null ; 
UPDATE `orders` SET `remake` = null ;  
UPDATE `bacs` SET `order_id` = null ; 
UPDATE `comments_read` SET `order_id` = null ; 
UPDATE `emails` SET `father_id` = null ; 

DELETE FROM earprint_orders;
DELETE FROM budgets_invoices;
DELETE FROM budget_lines;
DELETE FROM invoice_lines;
DELETE FROM orders_lines;
DELETE FROM comments;
DELETE FROM _diccionario;
DELETE FROM calendar_dates;
DELETE FROM calendar;
DELETE FROM calendar_contacts;
DELETE FROM expenses_categories;
DELETE FROM expenses;
DELETE FROM depositos_beneficios;
DELETE FROM depositos_condiciones;
DELETE FROM depositos;
DELETE FROM creditos;
DELETE FROM coops;
DELETE FROM yellow_pages;
DELETE FROM _translations;
DELETE FROM magia;
DELETE FROM _content;
DELETE FROM ecouteurs;
DELETE FROM formes;
DELETE FROM mesure_snr;
DELETE FROM marques;
DELETE FROM options;

DELETE FROM rols_status;
DELETE FROM _tmf_material;
DELETE FROM _tmf_materials_colours;
DELETE FROM _tmf_materials_options;
DELETE FROM _types_constitution;
DELETE FROM _types_marques;
DELETE FROM _types_modeles_formes;
DELETE FROM _type_event;
DELETE FROM _type_longuer_conduit;
DELETE FROM _type_perte_auditive;
DELETE FROM _modeles_mesures;
DELETE FROM _event_diametre;
DELETE FROM _types_marques_ecouteur;
DELETE FROM options_options;
DELETE FROM modeles;
DELETE FROM remake_motifs;
DELETE FROM couleurs;
DELETE FROM diametre;
DELETE FROM materials;
DELETE FROM types;
DELETE FROM perte_auditive;
DELETE FROM docs_comments;
DELETE FROM docs_exchange;
DELETE FROM earprints;
DELETE FROM events;
DELETE FROM longueurs;
DELETE FROM machines3d;
DELETE FROM modelers;
DELETE FROM perte_auditive;
DELETE FROM resins;

DELETE FROM updates;
DELETE FROM user_options;
DELETE FROM _aa;
DELETE FROM _aa_actions;
DELETE FROM _aa_conditions;



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
DELETE FROM `emails`;
DELETE FROM `emails_folders`;
DELETE FROM `bacs`;



DELETE FROM `contacts` WHERE `contacts`.`id` > 2500;
DELETE FROM `gallery`;
DELETE FROM `budgets`;
DELETE FROM contacts WHERE `contacts`.`owner_id` is null;
DELETE FROM contacts WHERE `contacts`.`id` > 2475;


INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`) 
VALUES (NULL, '1022', '0', 'Mr.', 'name', 'lastname', '1900-01-01', NULL, NULL, NULL, '<?php echo magia_uniqid(); ?>', 'fr_BE', '1', '1') ;


UPDATE `contacts` SET `tva` = '<?php echo $export_data->getTva(); ?>' WHERE `contacts`.`id` = 1022; 



DELETE FROM permissions WHERE `permissions`.`rol` != 'root';




            </textarea>
        </div>
    </div>	









</form>