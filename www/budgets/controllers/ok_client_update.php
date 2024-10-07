<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_client_id = (($_POST["client_id"]) != "" ) ? clean($_POST["client_id"]) : null;

$error = array();

################################################################################
################################################################################
if (!budgets_can_change_client($id, $new_client_id)) {
    $error = array_merge($error, budgets_why_can_not_change_client($id, $new_client_id));
}

$headOffice_id = contacts_headoffice_of_contact_id($new_client_id);

$ba = json_encode(addresses_billing_by_contact_id($headOffice_id));
$da = json_encode(addresses_delivery_by_contact_id($new_client_id));
################################################################################
################################################################################
################################################################################


if (!$error) {

    //invoices_update_client_id($id, $headOffice_id);
    budgets_update_client_id($id, $new_client_id);
    //invoices_update_billing_address($id, $ba);
    budgets_update_billing_address($id, $ba);
    //invoices_update_delivery_address($id, $da);
    budgets_update_delivery_address($id, $da);

    header("Location: index.php?c=budgets&a=edit&id=$id");
} else {
    include view("home", "pageError");
}    