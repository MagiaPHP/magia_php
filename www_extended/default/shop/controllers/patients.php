<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_patients", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

if (users_can_see_others_offices($u_id)) {
    ################################################################################
    $pagination = new Pagination($page, shop_patients_list_by_company());
    // puede hacer falta
    $pagination->setUrl("index.php?c=shop&a=patients");
    $patients = shop_patients_list_by_company($pagination->getStart(), $pagination->getLimit());
    ################################################################################
    // todas las oficinas
    // $patients = shop_patients_list_by_company();
} else {
    ################################################################################
    $pagination = new Pagination($page, shop_patients_list_by_office());
    // puede hacer falta
    $pagination->setUrl("index.php?c=shop&a=patients");
    $patients = shop_patients_list_by_office($pagination->getStart(), $pagination->getLimit());
    ################################################################################
    // solo la que estoy conectado    
    // $patients = shop_patients_list_by_office();
}


include view("shop", "address_check");

include view("shop", "patients");
