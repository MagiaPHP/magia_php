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

if (!$patient_id) {
    array_push($error, 'Select a patient');
}
if (!$side) {
    array_push($error, 'Select a side');
}
if (!$date_delivery && !$delivery_days) {
    array_push($error, 'Select shipping date');
}

$error = array();
if (!$error) {
    
} else {

    include view("home", "pageError");
}