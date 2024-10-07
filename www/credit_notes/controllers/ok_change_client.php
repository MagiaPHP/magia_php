<?php

/**
 * Cambia el cliente, y sus direcciones de facturacion y entrega
 */
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_client_id = (($_POST["new_client_id"]) != "" ) ? clean($_POST["new_client_id"]) : null;

$error = array();

/**
 * NO SE PUEDE SI:
 * - Si una nota de credito viene de una factura anulada
 * - Si el estatus del documento no le permite 
 * - Se hay ya pagos realizados de este documentos 
 * 
 */
################################################################################
# Requerida
# Requerida
# Requerida
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$new_client_id) {
    array_push($error, 'New client_id is mandatory');
}
################################################################################
# formato
# formato
# formato
if (!credit_notes_is_id($id)) {
    array_push($error, '$id format error');
}

if (!contacts_is_id($new_client_id)) {
    array_push($error, '$new_client_id format error');
}
################################################################################
# condiciones
# condiciones
# condiciones

if (!credit_notes_can_be_edit($id)) {
    array_push($error, "Can not be edit");
}
# ------------------------------------------------------------------------------
if (credit_notes_field_id('invoice_id', $id)) {
    array_push($error, 'Credit note that comes from an invoice cannot change the customer');
}
if ((int) (balance_total_total_by_credit_note($id))) {
    array_push($error, 'If there are payments made, you cannot change the holder of the credit note');
}
if (credit_notes_field_id('status', $id) != 10) {
    array_push($error, 'Only credit notes with registered status can change the recipient');
}
################################################################################
// saco la direccion de facturacion segun el cliente 

//$new_headoffice_id = offices_headoffice_of_office($new_client_id);

$ba = (addresses_billing_by_contact_id($new_client_id));
$da = (addresses_delivery_by_contact_id($new_client_id));
//
$new_ba_json = json_encode($ba);
$new_da_json = json_encode($da);
################################################################################
################################################################################
################################################################################
################################################################################



if (!$error) {

    credit_notes_update_client_id($id, $new_client_id);

    credit_notes_update_delivery_address($id, $new_da_json);

    credit_notes_update_billing_address($id, $new_ba_json);

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Change client: credit note $id: <br>New client: [$new_client_id]";
    $doc_id = $id;
    $crud = "update";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################  




    header("Location: index.php?c=credit_notes&a=edit&id=$id");
} else {

    include view("home", "pageError");
}

