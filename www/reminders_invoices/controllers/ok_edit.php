<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$invoice_id = (isset($_REQUEST["invoice_id"]) && $_REQUEST["invoice_id"] != "") ? clean($_REQUEST["invoice_id"]) : false;
$invoice_solde = (isset($_REQUEST["invoice_solde"]) && $_REQUEST["invoice_solde"] != "") ? clean($_REQUEST["invoice_solde"]) : false;
$reminder = (isset($_REQUEST["reminder"]) && $_REQUEST["reminder"] != "") ? clean($_REQUEST["reminder"]) : false;
$reminder_percent = (isset($_REQUEST["reminder_percent"]) && $_REQUEST["reminder_percent"] != "") ? clean($_REQUEST["reminder_percent"]) : false;
$invoice_to_add_id = (isset($_REQUEST["invoice_to_add_id"]) && $_REQUEST["invoice_to_add_id"] != "") ? clean($_REQUEST["invoice_to_add_id"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$invoice_solde) {
    array_push($error, '$invoice_solde is mandatory');
}
if (!$reminder) {
    array_push($error, '$reminder is mandatory');
}
if (!$reminder_percent) {
    array_push($error, '$reminder_percent is mandatory');
}
if (!$invoice_to_add_id) {
    array_push($error, '$invoice_to_add_id is mandatory');
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
if (!reminders_invoices_is_date_registre($date_registre)) {
    array_push($error, '$date_registre format error');
}
if (!reminders_invoices_is_invoice_id($invoice_id)) {
    array_push($error, '$invoice_id format error');
}
if (!reminders_invoices_is_invoice_solde($invoice_solde)) {
    array_push($error, '$invoice_solde format error');
}
if (!reminders_invoices_is_reminder($reminder)) {
    array_push($error, '$reminder format error');
}
if (!reminders_invoices_is_reminder_percent($reminder_percent)) {
    array_push($error, '$reminder_percent format error');
}
if (!reminders_invoices_is_invoice_to_add_id($invoice_to_add_id)) {
    array_push($error, '$invoice_to_add_id format error');
}
if (!reminders_invoices_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!reminders_invoices_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( reminders_invoices_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    reminders_invoices_edit(
            $id, $date_registre, $invoice_id, $invoice_solde, $reminder, $reminder_percent, $invoice_to_add_id, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=reminders_invoices");
            break;

        default:
            header("Location: index.php?c=reminders_invoices&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
