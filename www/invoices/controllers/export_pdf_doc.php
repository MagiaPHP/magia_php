<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
$headoffice_id = offices_headoffice_of_office(invoices_field_id("client_id", $id));
// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
// para imprimir segun el idioma deseado
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

//$email_cc       = (isset($_REQUEST["cc"])) ? clean($_REQUEST["cc"]) : false ;
//// caja check or not 
//$cc2m           = (isset($_REQUEST["cc2m"])) ? clean($_REQUEST["cc2m"]) : false ;
//// si caja check, recojo el email del usuario conectado 
//if( $cc2m ){
//    $email_cc2m = directory_search_data_by_contact_id("Email", $u_id)[0]; 
//}

$addresses_billing = addresses_billing_by_contact_id($headoffice_id);
$reciver_name = contacts_field_id("name", $reciver_id);
$reciver_lastname = contacts_field_id("lastname", $reciver_id);
$reciver_salutation = contacts_field_id("title", $reciver_id);
$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];
//
$message = nl2br($message);
////////////////////////////////////////////////////////////////////////////////
// Verificar los email to, cc, ccb 
// mensajhe 
//
if (!is_email($reciver_email)) {
    array_push($error, '$reciver_email : Email format is not correct');
}
//if( ! is_email($email_cc) ){
//    array_push($error , '$email_cc : Email format is not correct') ;
//}
////
//if( ! is_email($email_cc2m) ){
//    array_push($error , '$cc2m : Email format is not correct') ;
//}
//vardump($_POST);
//
//die(); 

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}

################################################################################

if (!invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!invoices_field_id("id", $id)) {
    array_push($error, "Invoice id not exist");
}


################################################################################

if (!$error) {

    $invoices = invoices_details($id);

    // actualizo los totales
    $total = invoice_lines_totalHTVA($id);
    $tax = invoice_lines_totalTVA($id);
    invoices_update_total_tax($id, $total, $tax);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    // esto es para la expotacion en qr
    $invoice_qr['factux']['version'] = "beta";
    //$invoice_qr['factux']['date'] = "2020-04-11"; 
    $invoice_qr['invoice']['number'] = $id;
//   $invoice_qr['invoice']['from_budget'] = $invoices['budget_id']; 
//   $invoice_qr['invoice']['addresses_billing'] = $invoices['addresses_billing']; 
//   $invoice_qr['invoice']['addresses_delivery'] = $invoices['addresses_delivery']; 


    $invoice_qr_json = json_encode($invoice_qr);

//    vardump($invoices);


    include view("invoices", "export_pdf_doc");
} else {

    include view("home", "pageError");
}
