<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


/**
 * para verificar si las facturas se estan creando con las sedes
 */
$error = array();

// *****************************************
$totalItems = count(invoices_list());

include controller("invoices", "pagination");
// ****************************************

$invoices = invoices_list(999, 0);

################################################################################
if (!$error) {
    include view("invoices", 'check_office');
} else {
    include view("home", 'pageError');
}


