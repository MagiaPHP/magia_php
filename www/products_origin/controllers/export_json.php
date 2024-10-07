<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_origin = new Products_origin();
    $products_origin->setProducts_origin($id);

    include view("products_origin", "export_json");
} else {
    include view("home", "pageError");
}    
