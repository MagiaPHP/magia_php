<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $products_presentation_names = new Products_presentation_names();
    $products_presentation_names->setProducts_presentation_names($id);

    include view("products_presentation_names", "export_json");
} else {
    include view("home", "pageError");
}    
