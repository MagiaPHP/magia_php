<?php

//if ( ! permissions_has_permission($u_rol , $c , "read") ) {
//    header("Location: index.php?c=home&a=no_access") ;
//    die("Error has permission ") ;
//}

$w = "";
$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

$error = array();
################################################################################
#################################################################################
#################################################################################
if (!$error) {


    switch ($w) {
        case 'byCategoryId':
            $products = shop_products_list_by_status(1);
            break;

        default:
            $products = shop_products_list_by_status(1);
            break;
    }

    include view("shop", "products");
} else {

    include view("home", "pageError");
}


    