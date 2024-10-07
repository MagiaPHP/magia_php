<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$contact_id = (isset($_GET['contact_id'])) ? clean($_GET['contact_id']) : false;
// 2020-05-08 aaaa-mm-dd
$date_delivery = (isset($_GET['date_delivery'])) ? clean($_GET['date_delivery']) : false;
// L & R or Stero
$side = (isset($_GET['side'])) ? clean($_GET['side']) : false;
// si nno hay delyveri day es normal entrega
$error = array();

if (!$contact_id) {
    array_push($error, '$patient_id is mandatory');
}

if (!$date_delivery) {
    array_push($error, '$date_delivery is mandatory');
}

if (!is_id($contact_id)) {
    array_push($error, '$patient_id format error');
}

if (!is_date($date_delivery)) {
    array_push($error, '$date_delivery format incorrect');
}
################################################################################
# Verificacion FORMATO de variables
# ---------------------------------
if (!contacts_is_id($contact_id)) {
    array_push($error, '$contact_id is is mandatory');
}
# ---------------------------------
if (!orders_is_date_delivery($date_delivery)) {
    array_push($error, '$date_delivery format incorrect');
}

if (in_array($side, array("L", "R", "S"))) {
    // array_push($error , '$side format error') ;
}


#************************************************************************
# verifico si el id del paciente pertenece al usuario logueado 
# si tiene las direccion de
# - facturacion 
# - delivery
//if ( contacts_field_id("owner_id" , $contact_id) != $u_owner_id ) {
//    array_push($error , 'This contact is not yours') ;
//}
// la sede no puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    //  array_push($error , "The headoffice can not make order") ;
}



if (users_can_see_others_offices($u_id)) {

    if (contacts_headoffice_of_contact_id($contact_id) !== contacts_headoffice_of_contact_id($u_id)) {

        array_push($error, "This contact does not belong to your company");
    }
} else {

    if (contacts_field_id("owner_id", $contact_id) !== contacts_work_at($u_id)) {
        array_push($error, "This contact does not belong to your office");
    }
}

#************************************************************************
// Verifica si hay direccion de facturacion
//if ( ! shop_addresses_billing() ) {
if (!addresses_billing_by_contact_id(contacts_work_for($u_id))) {
    array_push($error, "Please add your Billing's address");
// header("Location: index.php?c=shop&a=addressBillingNew&smst=danger&smsm=Please add your Billing's address");
}


// no tiene direccion de facturacion
if (!shop_addresses_delivery()) {
    array_push($error, "Please add your Delivery's address");
    //header("Location: index.php?c=shop&a=addressDeliveryNew&smst=danger&smsm=Please add your Delivery's address");
}

if (!$error) {

    if ($side == "s") {
        include view("shop", "orderNewStereo");
    } else {

        include view("shop", "orderNew");
    }
} else {


    include view("home", "pageError");
}