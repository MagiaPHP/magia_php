<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_price = new Products_price();
    $products_price->setProducts_price($id);

    include view("products_price", "export_json");
} else {
    include view("home", "pageError");
}    
