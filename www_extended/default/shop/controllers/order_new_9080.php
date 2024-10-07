<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
include "order_new_00_REG.php";

$error = array();
//
if (!$patient_id) {
    array_push($error, 'Select a patient');
}
//
if (!$side) {
    array_push($error, 'Select a side');
}
//
if (!$date_delivery && !$delivery_days) {
    array_push($error, 'Select shipping date');
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $da_id = json_decode($order['address_delivery'], true);

    $ba = addresses_billing_by_contact_id(contacts_work_for($u_id));

    $da = addresses_details($da_id);

    include view("shop", "order_new_9080");
} else {

    include view("home", "pageError");
}