<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$subdomains_plan_features = null;
$subdomains_plan_features = subdomains_plan_features_list();
//
include view("subdomains_plan_features", "export_pdf");
if ($debug) {
    include "www/subdomains_plan_features/views/debug.php";
}