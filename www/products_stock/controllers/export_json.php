<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_stock = new Products_stock();
    $products_stock->setProducts_stock($id);

    include view("products_stock", "export_json");
} else {
    include view("home", "pageError");
}    
