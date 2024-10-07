<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// si tengo permiso de ver oficinas veo todas sino solo la mia
//if ( permissions_has_permission($u_rol , "shop_offices" , "read") ) {
//
if (users_can_see_others_offices($u_id)) {
    // todas las oficinas
    ################################################################################
    $pagination = new Pagination($page, shop_orders_list_by_company());
    // puede hacer falta
    //$pagination->setUrl($url);
    $orders = shop_orders_list_by_company($pagination->getStart(), $pagination->getLimit());
    ################################################################################
    // $orders = shop_orders_list_by_company();
} else {
    // solo la que estoy conectado
    ################################################################################
    $pagination = new Pagination($page, shop_orders_list_by_office($u_owner_id));
    // puede hacer falta
    //$pagination->setUrl($url);
    $orders = shop_orders_list_by_office($u_owner_id, $pagination->getStart(), $pagination->getLimit());
    ################################################################################
    // $orders = shop_orders_list_by_office();
}


include view("shop", "address_check");

include view("shop", "orders");
