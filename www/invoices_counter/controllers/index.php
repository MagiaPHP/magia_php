<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$invoices_counter = null;
$invoices_counter = invoices_counter_list(10, 5);

include view("invoices_counter", "index");
if ($debug) {
    include "www/invoices_counter/views/debug.php";
}