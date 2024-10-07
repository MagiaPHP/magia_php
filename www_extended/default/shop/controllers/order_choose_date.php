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
    header("Location : index.php?c=shop&a=order_choose_contact");
}



if (!$error) {


    include view("shop", "address_check");

    $order_id = null;

    include view("shop", "order_choose_date");

//    if (!$date_delivery) {
//        include view("shop", "order_choose_date");
//    } else {
//        header("Location: index.php?c=shop&a=order_choose_side&order_id=$order_id");
//    }
//    
} else {

    ############################################################################
}
