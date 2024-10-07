<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" )      ? clean($_REQUEST["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (! $id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (! products_pictures_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! products_pictures_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $products_pictures = new Products_pictures();
    $products_pictures->setProducts_pictures($id);

    include view("products_pictures", "details");
} else {
    include view("home", "pageError");
}    

