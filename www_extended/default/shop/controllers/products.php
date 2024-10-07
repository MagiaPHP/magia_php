<?php

//if (  permissions_has_permission($u_rol , $c , "read") ) {
//    header("Location: index.php?c=home&a=no_access") ;
//    die("Error has permission ") ;
//}
//
//if (  permissions_has_permission($u_rol , "shop_products" , "read") ) {
//    header("Location: index.php?c=home&a=no_access") ;
//    die("Error has permission ") ;
//}


if (users_can_see_others_offices($u_id)) {
    // todas las oficinas
    $products = shop_products();
} else {
    // solo la que estoy conectado    
    $products = shop_products();
}
vardump(count($products));

include view("shop", "products");
