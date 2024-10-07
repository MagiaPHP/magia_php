<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date("Y-m-d G:i:s");
$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != "" && $_POST["invoice_id"] != "null" ) ? clean($_POST["invoice_id"]) : false;
$invoice_solde = (isset($_POST["invoice_solde"]) && $_POST["invoice_solde"] != "" && $_POST["invoice_solde"] != "null" ) ? clean($_POST["invoice_solde"]) : false;
$reminder = (isset($_POST["reminder"]) && $_POST["reminder"] != "" && $_POST["reminder"] != "null" ) ? clean($_POST["reminder"]) : false;
$reminder_percent = (isset($_POST["reminder_percent"]) && $_POST["reminder_percent"] != "" && $_POST["reminder_percent"] != "null" ) ? clean($_POST["reminder_percent"]) : false;
$invoice_to_add_id = (isset($_POST["invoice_to_add_id"]) && $_POST["invoice_to_add_id"] != "" && $_POST["invoice_to_add_id"] != "null" ) ? clean($_POST["invoice_to_add_id"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = reminders_invoices_add(
            $date_registre, $invoice_id, $invoice_solde, $reminder, $reminder_percent, $invoice_to_add_id, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=reminders_invoices");
            break;

        case 2:
            header("Location: index.php?c=reminders_invoices&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=reminders_invoices&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=reminders_invoices&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


