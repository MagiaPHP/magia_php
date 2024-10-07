<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $services_price = new Services_price();
    $services_price->setServices_price($id);

    include view("services_price", "export_json");
} else {
    include view("home", "pageError");
}    
