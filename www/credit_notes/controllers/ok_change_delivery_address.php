<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Si ya tiene facturas, no puede ser anulado 
 * si la factura creada no es igual o superrior al monto de la factura se puede aun crear mas facturas 
 * 
 * id
 * cambio el status si
 *      creo la factura, 
 *      copio los items 
 *      
 * 
 */
$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_adress_id = (($_POST["new_adress_id"]) != "" ) ? clean($_POST["new_adress_id"]) : null;

$error = array();

################################################################################
if (!$id) {
    array_push($error, 'id not send');
}
if (!$new_adress_id) {
    array_push($error, '$new_adress_id not send');
}


if (!is_id($id)) {
    array_push($error, '$id format error');
}

if (!is_id($new_adress_id)) {
    array_push($error, '$new_adress_id format error');
}

if (addresses_field_id("contact_id", $new_adress_id) != credit_notes_field_id("client_id", $id)) {
    //  array_push($error , 'This address does not belong to the company') ;
}

$address = addresses_details($new_adress_id);

$new_address_json = json_encode($address);

################################################################################
################################################################################
if (!$error) {
// cambio de direccion de entrega en el devis 

    credit_notes_update_delivery_address($id, $new_address_json);

    header("Location: index.php?c=credit_notes&a=edit&id=$id");
} else {
    include view("home", "pageError");
}    