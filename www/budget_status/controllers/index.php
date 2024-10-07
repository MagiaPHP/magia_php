<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$budget_status = null;
$budget_status = budget_status_list(10, 5);

//include "www/budget_status/views/index.php";
include view("budget_status", "index");
if ($debug) {
    include "www/budget_status/views/debug.php";
}