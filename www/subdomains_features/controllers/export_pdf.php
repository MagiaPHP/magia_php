<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$subdomains_features = null;
$subdomains_features = subdomains_features_list();
//
include view("subdomains_features", "export_pdf");
if ($debug) {
    include "www/subdomains_features/views/debug.php";
}