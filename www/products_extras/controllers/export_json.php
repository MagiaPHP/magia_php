<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_extras = new Products_extras();
    $products_extras->setProducts_extras($id);

    include view("products_extras", "export_json");
} else {
    include view("home", "pageError");
}    
