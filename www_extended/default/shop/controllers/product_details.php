<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

if (!$id) {
    array_push($error, "id is mandatory");
}


if (!is_id($id)) {
    array_push($error, "Error in price");
}

################################################################################
if (!$error) {

    $product = shop_product_details($id);

    include view("shop", "product_details");
} else {

    include view("home", "pageError");
}


