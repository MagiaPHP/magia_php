<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$pagination = new Pagination($page, invoices_list());
// puede hacer falta
//$pagination->setUrl($url);
$invoices = invoices_list($pagination->getStart(), $pagination->getLimit());
################################################################################

if (!$error) {
    include view("invoices", 'home');
} else {
    include view("home", 'pageError');
}


