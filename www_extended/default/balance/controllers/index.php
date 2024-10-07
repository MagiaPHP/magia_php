<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$filter = array("order_by" => "ORDER BY id ");
################################################################################
$pagination = new Pagination($page, balance_list_home($filter));
// puede hacer falta
//$pagination->setUrl($url);
$balance = balance_list_home($filter, $pagination->getStart(), $pagination->getLimit());
################################################################################


include view("balance", 'index');

