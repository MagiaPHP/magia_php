<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $subdomains_plan["id"] =  false ;
$subdomains_plan["plan"] = false;
$subdomains_plan["features"] = false;
$subdomains_plan["price"] = false;
$subdomains_plan["order_by"] = 1;
$subdomains_plan["status"] = 1;

include view("subdomains_plan", "add");
