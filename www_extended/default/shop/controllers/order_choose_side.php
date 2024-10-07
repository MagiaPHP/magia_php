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



if (!$error) {

    include view("shop", "address_check");

    if (!$side) {
        include view("shop", "order_choose_side");
    } else {

        header("Location: index.php?c=shop&a=order_new_10");
    }
} else {


    include view("home", "pageError");
}
