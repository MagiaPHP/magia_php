<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products = new Products();
    $products->setProducts($id);

    include view("products", "export_json");
} else {
    include view("home", "pageError");
}    
