<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Cambio de cliente: 

 * si ya esta aceptado no puede ser anulado 
 * si un budget viene de un pedido no puede ser cambiado de cliente 
 * si ya se ha creado una factura o factura pacial no se puede cambiar de cliente
 * 
 * --------------------------------------------------
 * Se actualiza el id del cliente 
 * Se actualiza la direccion de facturacion 
 * Se actualiza la direccion de entrega
 * 
 *      
 * 
 */
$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_client_id = (($_POST["new_client_id"]) != "" ) ? clean($_POST["new_client_id"]) : null;

// Debo sacar la sede
$headoffice_id = contacts_headoffice_of_contact_id($new_client_id);

// Saco las direcciones 
$da = addresses_delivery_by_contact_id($new_client_id);
$ba = addresses_billing_by_contact_id($headoffice_id);

$da_json = json_encode($da);
$ba_json = json_encode($ba);

$error = array();

################################################################################
if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$new_client_id) {
    array_push($error, '$new_adress_id is mandatory');
}
################################################################################

if (!is_id($id)) {
    array_push($error, '$id format error');
}

if (!is_id($new_client_id)) {
    array_push($error, '$new_adress_id format error');
}
################################################################################
# Condiciones
// segun estatus
switch (budgets_field_id('status', $id)) {
    case 30:
        array_push($error, 'A budgets accepted by customer can not be changed customers');
        break;

    case -10:
        array_push($error, 'A budgets canceled can not be changed customers');
        break;

    case 35:
        array_push($error, 'A budget with status invoices created cannot be changed customers');
        break;

    default:
        break;
}

// si viene de un pedido 
if (orders_budgets_list_orders_by_budget($id)) {
    array_push($error, 'A budget that comes from an order cannot be changed from client');
}

// Ya tiene facturas creadas
if (budgets_invoices_list_invoice_by_budget_id($id)) {
    array_push($error, 'A budget with invoices created cannot be changed customers');
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    budgets_update_client_id($id, $headoffice_id);
    // si tiene el nuevo cliente se actualiza las direcciones
    if (budgets_field_id("client_id", $id) == $headoffice_id) {
        budgets_update_delivery_address($id, $da_json);
        budgets_update_billing_address($id, $ba_json);
    }

    ############################################################################
    ############################################################################
    ############################################################################    
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Change client to budget: $id <br>New client: [ $headoffice_id : " . contacts_formated($headoffice_id) . " ]";
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



    header("Location: index.php?c=budgets&a=edit&id=$id");
} else {
    include view("home", "pageError");
}    