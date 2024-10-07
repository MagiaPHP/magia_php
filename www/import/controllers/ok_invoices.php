<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$json = (isset($_POST["json"]) && $_POST['json'] != '' ) ? ($_POST["json"]) : false;

$error = array();

$icj = new Invoices();
$icj->importFromJson($json);
$icj->getImportErrors();
$inv_array = json_decode($json, true);

$json = json_encode(json_decode($json), JSON_UNESCAPED_UNICODE);
// sender
$sender = $inv_array['sender'];
$sender_name = $sender['name'];
$sender_tva = $inv_array['sender']['vat'];
// doc
$doc_type = $inv_array['document']['controller'];
$doc_id = $inv_array['document']['id'];
$label = 'invoice';
//
$pdf_base64 = base64_encode($json);
$date_send = date("Y-m-d");
$order_by = 1;
$status = 1;
// reciver
$reciver_vat = $inv_array['reciver']['vat'];

$docs_exchange = docs_exchange_search_by_reciver_tva_doc_type_doc_id($sender_tva, $doc_type, $doc_id);

if ($docs_exchange) {
    array_push($error, 'Invoice already in your doc exchange');
}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (!$error && !$icj->getImportErrors()) {

    if (!contacts_field_tva('id', $sender_tva)) {
        // agrego a mis contactos
        $company = new Company();
        $company->add_from_json_factux($json);
        // registro la factura en el exchange
        docs_exchange_add($reciver_vat, $sender_name, $label, $sender_tva, $doc_type, $doc_id, $json, $pdf_base64, $date_send, $order_by, $status);
    } else {
        // registro la factura en el exchange
        docs_exchange_add($reciver_vat, $sender_name, $label, $sender_tva, $doc_type, $doc_id, $json, $pdf_base64, $date_send, $order_by, $status);
    }


    header("Location: index.php?c=docs_exchange");
} else {
//    header("Location: index.php?c=home&a=pageError&error=");
    include view('home', 'pageError');
}