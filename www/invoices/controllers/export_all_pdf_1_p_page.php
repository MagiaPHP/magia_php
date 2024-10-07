<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}





// id invoice
// id invoice
// id invoice
// id invoice

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
$headoffice_id = offices_headoffice_of_office(invoices_field_id("client_id", $id));
// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
// para imprimir segun el idioma deseado
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

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

    $invoice_qr_json = json_encode($invoice_qr);

    include view("invoices", "export_pdf");
} else {

    include view("home", "pageError");
}
