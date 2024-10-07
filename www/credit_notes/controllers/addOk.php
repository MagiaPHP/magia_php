<?php
/**
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

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

if (!$client_id) {
    array_push($error, 'client id is mandatory');
}
if (!$invoice_id) {
    array_push($error, 'Invoice id is mandatory');
}
if (!$addresses_billing) {
    array_push($error, 'Addresses billing is mandatory');
}
if (!$addresses_delivery) {
    array_push($error, 'Addresses delivery is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date registre is mandatory');
}
if (!$total) {
    array_push($error, 'Total is mandatory');
}
if (!$tax) {
    array_push($error, 'Tax is mandatory');
}
if (!$returned) {
    array_push($error, 'Returned is mandatory');
}
if (!$comments) {
    array_push($error, 'Comments is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD
//if (credit_notes_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
if (!$error) {
    $lastInsertId = credit_notes_add(
            $client_id,
            $invoice_id,
            $addresses_billing,
            $addresses_delivery,
            $date_registre,
            $total,
            $tax,
            $returned,
            $comments,
            $code,
            $status
    );

    header("Location: index.php?c=credit_notes&a=details&id=$lastInsertId");
} else {
    include view("home", "pageError");
}
 * 
 */

