<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_groups = new Products_groups();
    $products_groups->setProducts_groups($id);

    include view("products_groups", "export_json");
} else {
    include view("home", "pageError");
}    
