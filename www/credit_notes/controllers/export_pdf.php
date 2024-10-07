<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : $u_language;

$headoffice_id = offices_headoffice_of_office(credit_notes_field_id("client_id", $id));

// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
//$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
//$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;
//$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
//$addresses_billing = addresses_billing_by_contact_id($headoffice_id);
//$reciver_name = contacts_field_id("name", $reciver_id);
//$reciver_lastname = contacts_field_id("lastname", $reciver_id);
//$reciver_salutation = contacts_field_id("title", $reciver_id);
//$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];
//$message = nl2br($message);

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}

################################################################################

if (!is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!credit_notes_field_id("id", $id)) {
    array_push($error, "Credit note id not exist");
}


//$LettreDate = _tr("Brussels") . ", " . date("d") . " " . _tr(date("F")) . " " . date("Y");
//
//$LettreBody = "Purpose: Budget presentation";
//
//$LettreSignature = "";
//
//$LettreSignature = _tr("Sales team");
//
//$LettreSignature .= "
//$config_company_name
//Tel: $config_company_tel
//email: $config_company_email";
################################################################################
if (!$error) {
    // detalle de nota de credito 
    // detalle de nota de credito 
    // detalle de nota de credito 
    $credit_note = credit_notes_details($id);

//    $addresses_billing = json_decode($credit_note['addresses_billing'], true);
//    $addresses_delivery = json_decode($credit_note['addresses_delivery'], true);

    $addresses_billing = (is_json($credit_note['addresses_billing'])) ? json_decode($credit_note['addresses_billing'], true) : [];
    $addresses_delivery = (is_json($credit_note['addresses_delivery'])) ? json_decode($credit_note['addresses_delivery'], true) : [];

    include view("credit_notes", "export_pdf");
} else {

    include view("home", "pageError");
}
