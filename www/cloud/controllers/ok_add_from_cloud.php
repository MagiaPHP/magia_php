<?php

/**
 * Esto agrega una companya desde cloud a una cuenta de un usuario 
 * coje la company en formato json
 * la companya se busca segun si tva
 * 
 * 
 */
$tva = (isset($_REQUEST["tva"])) ? clean($_REQUEST["tva"]) : false;

//$c12 = cloud_company_details($tva);
//vardump($c12);
//
//die();
////////////////////////////////////////////////////////////////////////////////
// REquerido
// Requiere la TVA
if ($tva == '' || $tva == null || $tva == false) {
    array_push($error, 'Vat number is mandatory');
}
////////////////////////////////////////////////////////////////////////////////
// Formato
// Formato TVA Belga
if (!vat_check_format("BE", $tva)) {
    array_push($error, 'VAT number format is incorrect');
}
////////////////////////////////////////////////////////////////////////////////
// Condicional
// Existe en cloud?
// Existe en mis contactos?
// Tiene todos los datos necesarios?
// en la red
if (!cloud_contact_details_by_tva($tva)) {
    array_push($error, 'This vat number does not exist in the factux network');
}
// En mis contactos
if (contacts_details_by_tva($tva)) {
    array_push($error, 'This vat number already exists in my contact');
}
////////////////////////////////////////////////////////////////////////////////
// si no hay error, agrego 
//


$cloudCompany = new CloudCompany();
$cloudCompany->setCompany($tva);

vardump($cloudCompany);

//$cloud_company_json = json_encode($company);
//$cloud_company_json = '{"_logo64":null,"_tva":"BEPATO","_why_can_not_edit_tva":["This company is already in cloud"],"_discounts":false,"_is_head_office":true,"_employees":[{"_id":"779","_company_id":"60178","_contact_id":"60179","_owner_ref":"ref","_date":"2023-08-24 02:36:28","_cargo":"Manager","_owner_id":"60178","_type":"0","_title":"Mr.","_name":"Patricia","_lastname":"Cadavid","_birthdate":"1900-01-01","_tva":null,"_billing_method":null,"_discounts":null,"_code":null,"_language":"es_ES","_order_by":null,"_status":null,"_logo":null,"_addresses":[],"_directory":{"Email":"info@pato.com","Web":false,"GSM":false,"Tel":false,"Facebook":false,"Tel3":false,"Tel2":false,"Fax":false,"Email-secure":false,"nationalNumber":false},"_banks":[]}],"_export":null,"_error_add":null,"_is_in_cloud":true,"_id":"60178","_owner_id":"60178","_type":"1","_title":null,"_name":"Patricia SPRL","_lastname":null,"_birthdate":null,"_billing_method":null,"_code":null,"_language":"en_GB","_order_by":null,"_status":null,"_logo":null,"_addresses":{"Billing":{"_id":"648","_contact_id":"60178","_name":"Billing","_address":"Av del atomium","_number":"1","_postcode":"1020","_barrio":"Laken","_city":"Bruxelles","_region":"-","_country":"BE","_code":"2023082409362864e7087c8eeb8","_status":"1","_transport":[],"_redi":1,"_redi_val":null,"_errors":[]},"Delivery":{"_id":"649","_contact_id":"60178","_name":"Delivery","_address":"Av del atomium","_number":"1","_postcode":"1020","_barrio":"Laken","_city":"Bruxelles","_region":"-","_country":"BE","_code":"2023082409362864e7087c8eeb9","_status":"1","_transport":[],"_redi":1,"_redi_val":null,"_errors":[]}},"_directory":{"Email":"info@pato.com","Web":"https:\\/\\/pato.com","GSM":"+32484169400","Tel":false,"Facebook":false,"Tel3":false,"Tel2":false,"Fax":false,"Email-secure":false,"nationalNumber":false},"_banks":[]}';
//vardump($cloud_company_json);
//cloud_company_add_from_cloud_json($cloud_company_json);

if (!$error) {



    cloud_company_add_from_cloud_json($cloud_company_json);

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {
    include view("home", "pageError");
}

