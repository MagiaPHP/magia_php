<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" ) ? clean($_REQUEST["id"]) : false;

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
if (! products_origin_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! products_origin_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $products_origin = new Products_origin();
    $products_origin->setProducts_origin($id);

    include view("products_origin", "edit");
} else {
    include view("home", "pageError");
}    


