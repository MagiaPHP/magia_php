<?php

$home_alert = array(
    false,
    "Alert",
    "-",
    "-"
);
$config_updates_pay = true;
$config_db_type = "MySQL";
$debug = false;
//
$config_server = "localhost";
$config_db = "factuxorg_demo";
$config_login = "root";
$config_pass = "root";
//
$config_theme = "default";
//
//$public_theme = _options_option('config_public_html_theme') ?? 'Rapid';
$config_public_theme = "Rapid";
//
$config_country = "BE";
$config_province = null;
$config_controller_by_default = "public_html";

$config_app['url'] = "http://localhost/magia_php/index.php?c=app";
$config_api["api_key"] = "YOUR_API_KEY";
$config_api["url_doc"] = "http://localhost/magia_php/index.php?api_key=" . $config_api["api_key"] . "&c=api";
//    
//BANK
$config_secure_bank['bank'] = "BNP";
$config_secure_bank['account_number'] = "BE32 1234 5698 4587";
$config_secure_bank['bic'] = "GEBABEBB";
$config_secure_bank['iban'] = "";
$config_secure_bank['code'] = "";
$config_secure_bank['invoices'] = true;
$config_secure_bank['status'] = true;

// Segndo Banco
$config_secure_bank2['bank2'] = false;
$config_secure_bank2['account_number2'] = false;
$config_secure_bank2['bic2'] = false;
$config_secure_bank2['iban2'] = false;
$config_secure_bank2['code2'] = false;
$config_secure_bank2['invoices2'] = true;
$config_secure_bank2['status2'] = true;
//
// Email
$config_mail_host = 'mail.magia_php.com';
$config_mail_username = 'demo@magia_php.com';
$config_mail_password = '-Mi---PASS-';
//
// Desactivar estas lineas en produccion 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//
$config_system_country = "BE";
//
// Paga iva una empresa que tiene su direccion en l extranjero?
$config_invoices_company_outside_pay_tax = 0;
//
$config_company_domain_name = "http://localhost/magia_php";
//
$config_nas_contacts_path = "\\\\nas\Contacts\magia_php\\";
//
define("COMPANY_PREFIX", "L");
//
// Permite que la gente se registre en el sistema?
define("AUTO_REGISTRE", TRUE);
//
// Cambiar de año 
define("CHANGE_YEAR", TRUE);
$config_change_year['label'] = '2022';
$config_change_year['goto'] = '2023';
$config_change_year['url'] = 'http://localhost/magia_php';
//
//
$config_app['url'] = "http://localhost/magia_php/index.php?c=app";
//
//
$config_company_subdomain_name = "localhost";
//
// Puedo gestionar varios numeros de tva
define('IS_MULTI_VAT', 1);
