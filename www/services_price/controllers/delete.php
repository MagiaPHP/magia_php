<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!services_price_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!services_price_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
if (!$error) {
    $services_price = new Services_price();
    $services_price->setServices_price($id);

    include view("services_price", "delete");
} else {
    include view("home", "pageError");
}    

