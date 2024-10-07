<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
$pagination = new Pagination($page, balance_list());
// puede hacer falta
//$pagination->setUrl($url);
$balance = balance_list($pagination->getStart(), $pagination->getLimit());
################################################################################


include view("balance", 'index');

