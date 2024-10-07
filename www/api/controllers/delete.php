<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]) && $_GET["id"] !="" )         ? clean($_GET["id"]) : false;


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
if (! api_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! api_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
if (!$error) {
    $api = new Api();
    $api->setApi($id);

    include view("api", "delete");
} else {
    include view("home", "pageError");
}    

