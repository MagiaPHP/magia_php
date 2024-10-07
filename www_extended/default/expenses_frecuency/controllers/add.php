<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $expenses_frecuency["id"] =  false ;
$expenses_frecuency["expense_id"] = false;
$expenses_frecuency["every"] = false;
$expenses_frecuency["times"] = false;
$expenses_frecuency["date_start"] = false;
$expenses_frecuency["date_end"] = false;
$expenses_frecuency["order_by"] = 1;
$expenses_frecuency["status"] = 1;

include view("expenses_frecuency", "add");
