<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

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
if (!invoices_counter_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!invoices_counter_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $invoices_counter = invoices_counter_details($id);
    include view("invoices_counter", "details");
} else {
    include view("home", "pageError");
}

