<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$limit = 999;
// *****************************************
$totalItems = count(invoices_list());

include controller("invoices", "pagination");
// ****************************************

$invoices = invoices_list_check_ce();

################################################################################
if (!$error) {
    include view("invoices", 'index_check_ce');
} else {
    include view("home", 'pageError');
}


