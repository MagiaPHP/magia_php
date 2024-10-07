<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

// Saco el cliente 
$client_id = invoices_field_id('client_id', $id);
// saco su headoffice
$headoffice_id = contacts_headoffice_of_contact_id($client_id);
//
//$headoffice_id = offices_headoffice_of_office(invoices_field_id("client_id", $id));
// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
//$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
//$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : null;
//$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;

$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
//$addresses_billing = addresses_billing_by_contact_id($headoffice_id);
//$reciver_name = contacts_field_id("name", $reciver_id);
//$reciver_lastname = contacts_field_id("lastname", $reciver_id);
//$reciver_salutation = contacts_field_id("title", $reciver_id);
//$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

//$message = nl2br($message);

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

    // recojo la lista de facturas impagas de este client
    $invoices = invoices_receivable_by_client($headoffice_id);

    include view("invoices", "export_pdf_r2");

    // redirection 
    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices&a=details&id=$id#r2");
            break;

        default:
            header("Location: index.php?c=invoices&a=details&id=$id#default");
            break;
    }
} else {

    include view("home", "pageError");
}
