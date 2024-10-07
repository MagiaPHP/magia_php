<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * El cliente debe existir 
 * Debe tener facturas inpagas
 * Debe tener un email
 * enviar copia a otro email
 * 
 */
$client_id = (isset($_POST['client_id']) && $_POST['client_id'] != "") ? $_POST['client_id'] : false;
$email = "robincoello@hotmail.com";
$error = array();

################################################################################
if (!$office_id) {
    array_push($error, '$office_id is mandatory');
}
if (!is_id($office_id)) {
    array_push($error, '$office_id format error');
}
################################################################################
if (!contacts_field_id("id", $office_id)) {
    array_push($error, '$office_id don t exist');
}

if (invoices_unpaid_by_office($office_id)) {
    array_push($error, '$office_id don t exist');
}

################################################################################

if (!$error) {

    invoices_update_type($invoice_id, $type);

    header("Location: index.php?c=invoices&a=edit&id=$invoice_id");
} else {

    include view("home", "pageError");
}
