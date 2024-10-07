<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();
$subdomains_plan = null;
$subdomains_plan = subdomains_plan_list();
//
include view("subdomains_plan", "export_json");

if ($debug) {
    include "www/subdomains_plan/views/debug.php";
}