<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$seller_id = (isset($_POST["seller_id"])) ? clean($_POST["seller_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$advance = (isset($_POST["advance"])) ? clean($_POST["advance"]) : false;
$balance = (isset($_POST["balance"])) ? clean($_POST["balance"]) : false;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : false;
$comments_private = (isset($_POST["comments_private"])) ? clean($_POST["comments_private"]) : false;
$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : false;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : false;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : false;
$fc = (isset($_POST["fc"])) ? clean($_POST["fc"]) : false;
$date_update = (isset($_POST["date_update"])) ? clean($_POST["date_update"]) : false;
$days = (isset($_POST["days"])) ? clean($_POST["days"]) : false;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : false;
$key = (isset($_POST["key"])) ? clean($_POST["key"]) : false;
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

if (!budgets_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
################################################################################
if (!$error) {

    budgets_edit(
            $id, $invoice_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status
    );
    header("Location: index.php?c=budgets&a=details&id=$id");
} else {
    include view('home', 'pageError');
}
