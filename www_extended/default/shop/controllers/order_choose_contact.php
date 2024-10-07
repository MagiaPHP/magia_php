<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
$error = array();

include view("shop", "address_check");

// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
if (contacts_field_id('status', contacts_work_at($u_id)) <= 0) {
    array_push($error, 'This office must be approved before placing a new order');
}


// la sede no puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}

if (!$error) {


    //vardump($_SESSION);

    include view("shop", "order_choose_contact");
} else {

    include view("home", "pageError");
}
