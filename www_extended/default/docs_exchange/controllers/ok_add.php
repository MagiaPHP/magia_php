<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$reciver_tva = (isset($_POST["reciver_tva"]) && $_POST["reciver_tva"] != "") ? clean($_POST["reciver_tva"]) : false;
$sender_name = (isset($_POST["sender_name"]) && $_POST["sender_name"] != "") ? clean($_POST["sender_name"]) : false;
$label = (isset($_POST["label"]) && $_POST["label"] != "") ? clean($_POST["label"]) : false;
$sender_tva = (isset($_POST["sender_tva"]) && $_POST["sender_tva"] != "") ? clean($_POST["sender_tva"]) : false;
$doc_type = (isset($_POST["doc_type"]) && $_POST["doc_type"] != "") ? clean($_POST["doc_type"]) : false;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "") ? clean($_POST["doc_id"]) : false;
$json = (isset($_POST["json"]) && $_POST["json"] != "") ? clean($_POST["json"]) : false;
$pdf_base64 = (isset($_POST["pdf_base64"]) && $_POST["pdf_base64"] != "") ? clean($_POST["pdf_base64"]) : false;
$date_send = (isset($_POST["date_send"]) && $_POST["date_send"] != "") ? clean($_POST["date_send"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$reciver_tva) {
    array_push($error, '$reciver_tva is mandatory');
}
if (!$sender_tva) {
    array_push($error, '$sender_tva is mandatory');
}
if (!$doc_type) {
    array_push($error, '$doc_type is mandatory');
}
if (!$doc_id) {
    array_push($error, '$doc_id is mandatory');
}
if (!$json) {
    array_push($error, '$json is mandatory');
}
if (!$pdf_base64) {
    array_push($error, '$pdf_base64 is mandatory');
}
if (!$date_send) {
    array_push($error, '$date_send is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!docs_exchange_is_reciver_tva($reciver_tva)) {
    array_push($error, '$reciver_tva format error');
}
if (!docs_exchange_is_sender_tva($sender_tva)) {
    array_push($error, '$sender_tva format error');
}
if (!docs_exchange_is_doc_type($doc_type)) {
    array_push($error, '$doc_type format error');
}
if (!docs_exchange_is_doc_id($doc_id)) {
    array_push($error, '$doc_id format error');
}
if (!docs_exchange_is_json($json)) {
    array_push($error, '$json format error');
}
if (!docs_exchange_is_pdf_base64($pdf_base64)) {
    array_push($error, '$pdf_base64 format error');
}
if (!docs_exchange_is_date_send($date_send)) {
    array_push($error, '$date_send format error');
}
if (!docs_exchange_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!docs_exchange_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( docs_exchange_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = docs_exchange_add(
            $reciver_tva, $sender_name, $label, $sender_tva, $doc_type, $doc_id, $json, $pdf_base64, $date_send, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=docs_exchange&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=docs_exchange");
            break;
    }
} else {

    include view("home", "pageError");
}


