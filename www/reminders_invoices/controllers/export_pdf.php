<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$reminders_invoices = null;
$reminders_invoices = reminders_invoices_list();
//
include view("reminders_invoices", "export_pdf");
if ($debug) {
    include "www/reminders_invoices/views/debug.php";
}