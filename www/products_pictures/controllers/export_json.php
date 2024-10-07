<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_pictures = new Products_pictures();
    $products_pictures->setProducts_pictures($id);

    include view("products_pictures", "export_json");
} else {
    include view("home", "pageError");
}    
