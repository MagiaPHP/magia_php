<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != "") ? clean($_POST["invoice_id"]) : false;
$year = (isset($_POST["year"]) && $_POST["year"] != "") ? clean($_POST["year"]) : false;
$counter = (isset($_POST["counter"]) && $_POST["counter"] != "") ? clean($_POST["counter"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$year) {
    array_push($error, '$year is mandatory');
}
if (!$counter) {
    array_push($error, '$counter is mandatory');
}

###############################################################################
# FORMAT
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################

if (invoices_counter_search($counter)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = invoices_counter_add(
            $invoice_id, $year, $counter
    );

    header("Location: index.php?c=invoices_counter&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


