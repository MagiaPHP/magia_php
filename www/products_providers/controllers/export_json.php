<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_providers = new Products_providers();
    $products_providers->setProducts_providers($id);

    include view("products_providers", "export_json");
} else {
    include view("home", "pageError");
}    
