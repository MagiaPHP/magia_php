<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$balance = null;

$balance = balance_list();

//include "www/balance/views/export_json.php";
include view("balance", "export_json");
if ($debug) {
    include "www/balance/views/debug.php";
}