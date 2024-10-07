<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$subdomains = null;
$subdomains = subdomains_list();
//
include view("subdomains", "export_pdf");
if ($debug) {
    include "www/subdomains/views/debug.php";
}