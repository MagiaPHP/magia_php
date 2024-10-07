<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
################################################################################
# Recolection de variables desde el formulario
################################################################################
$id = (!empty($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($id)) {
    array_push($error, "Error in id");
}

################################################################################
# proceso
# Verifiar si el id de la orden pertenece a quien la solicita
################################################################################

if (!$error) {
    $order = shop_orders_details($id);
    include 'www/shop/controllers/header.php';
    include view("shop", "orderNewScan");
} else {

    include view("home", "pageError");
}