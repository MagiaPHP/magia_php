<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$orders_budgets = null;
$orders_budgets = orders_budgets_list(10, 5);

//include "www/orders_budgets/views/index.php";
include view("orders_budgets", "index");
if ($debug) {
    include "www/orders_budgets/views/debug.php";
}