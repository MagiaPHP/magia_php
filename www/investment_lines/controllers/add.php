<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $investment_lines["id"] =  false ;
$investment_lines["investment_id"] = false;
$investment_lines["date"] = false;
$investment_lines["value"] = false;
$investment_lines["irf"] = false;
$investment_lines["date_payment"] = false;
$investment_lines["order_by"] = 1;
$investment_lines["status"] = 1;

include view("investment_lines", "add");
