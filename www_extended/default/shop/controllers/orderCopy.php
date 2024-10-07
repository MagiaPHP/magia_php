<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$id = (!empty($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$do = (!empty($_REQUEST['do'])) ? clean($_REQUEST['do']) : false;

$error = array();
################################################################################
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
if (!is_id($id)) {
    array_push($error, "Id format error");
}
################################################################################
// en la sede no se puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}
///////////////////////////////////////////////////////////////////////////////
# proceso
# Verifiar si el id de la orden pertenece a quien la solicita
if (orders_field_id("company_id", $id) != $u_owner_id) {
    // array_push($error , "This order is not from your office") ;
}

// puedo ver otras oficinas?
//
if (users_can_see_others_offices($u_id)) {
    // la sede de este pedido debe ser la sede de mi empresa
    if (offices_headoffice_of_office(orders_field_id("company_id", $id)) !== offices_headoffice_of_office(contacts_work_at($u_id))) {
        array_push($error, "You cannot see orders that are not from your company");
    }
} else {
    // solo la mia 
    if (orders_field_id("company_id", $id) != $u_owner_id) {
        array_push($error, "This order is not from your office");
    }
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $order = shop_orders_details($id);

    include view("shop", "orderCopy");
} else {

    include view("home", "pageError");
}