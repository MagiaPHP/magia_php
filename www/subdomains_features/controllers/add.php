<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $subdomains_features["id"] =  false ;
$subdomains_features["feature"] = false;
$subdomains_features["order_by"] = 1;
$subdomains_features["status"] = 1;

include view("subdomains_features", "add");
