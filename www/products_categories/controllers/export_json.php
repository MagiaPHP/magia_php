<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_categories = new Products_categories();
    $products_categories->setProducts_categories($id);

    include view("products_categories", "export_json");
} else {
    include view("home", "pageError");
}    
