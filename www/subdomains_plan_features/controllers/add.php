<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $subdomains_plan_features["id"] =  false ;
$subdomains_plan_features["plan"] = false;
$subdomains_plan_features["feature"] = false;
$subdomains_plan_features["order_by"] = 1;
$subdomains_plan_features["stattus"] = 1;

include view("subdomains_plan_features", "add");
