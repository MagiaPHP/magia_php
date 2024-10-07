<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$company_name = (!empty($_POST['company_name'])) ? clean($_POST['company_name']) : null;
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : null;

$error = array();

$pago = ( 1 == 1 ) ? true : false;

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
################################################################################
# Formato de variables // las formateo 
################################################################################
# Condcional
# Al actualizar no puede usar el mismo o uno que ya esta registrado
################################################################################


if (!$error) {
    // si el pago es ok 
    //
    // $pago


    header("Location: index.php?c=shop&a=10&sms=update");
} else {

    include view("shop", "1");
}



