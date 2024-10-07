<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!reminders_invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!reminders_invoices_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {
    $reminders_invoices = new Reminders_invoices();
    $reminders_invoices->setReminders_invoices($id);

    include view("reminders_invoices", "delete");
} else {
    include view("home", "pageError");
}    

