<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Registra la direccion de entrega
 */
$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;
$error = array();

$company = new Company();
$company->setCompany($u_owner_id);

if (!$error) {
    include view("shop", "123");
} else {
    header("Location: index.php?c=shop&a=3");
}
