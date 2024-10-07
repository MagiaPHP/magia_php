<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
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

if (orders_field_id("company_id", $id) != $u_owner_id) {
    array_push($error, "This orders is not yours");
}
################################################################################

if (!$error) {

    shop_express_update($id, 1);

    header("Location: index.php?c=shop&a=orderDetails&id=$id");
} else {


    include view("home", "pageError");
}

