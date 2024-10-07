<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $investments["id"] =  false ;
$investments["institution_id"] = false;
$investments["type"] = false;
$investments["operation"] = false;
$investments["ref"] = false;
$investments["amount"] = false;
$investments["days"] = false;
$investments["rate"] = false;
$investments["total"] = false;
$investments["retention"] = false;
$investments["date_start"] = false;
$investments["date_end"] = false;
$investments["order_by"] = 1;
$investments["status"] = 1;

include view("investments", "add");
