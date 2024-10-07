<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_related = new Products_related();
    $products_related->setProducts_related($id);

    include view("products_related", "export_json");
} else {
    include view("home", "pageError");
}    
