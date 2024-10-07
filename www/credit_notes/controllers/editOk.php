<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$addresses_billing = (isset($_POST["addresses_billing"])) ? clean($_POST["addresses_billing"]) : false;
$addresses_delivery = (isset($_POST["addresses_delivery"])) ? clean($_POST["addresses_delivery"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$returned = (isset($_POST["returned"])) ? clean($_POST["returned"]) : false;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!credit_notes_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    credit_notes_edit(
            $id, $client_id, $invoice_id, $addresses_billing, $addresses_delivery, $date_registre, $total, $tax, $returned, $comments, $code, $status
    );
    header("Location: index.php?c=credit_notes&a=details&id=$id");
} else {
    include view("home", "pageError");
}

