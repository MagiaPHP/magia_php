<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();
$investments = null;
$investments = investments_list();
//
include view("investments", "export_json");

if ($debug) {
    include "www/investments/views/debug.php";
}