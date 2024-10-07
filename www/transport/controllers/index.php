<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$transport = null;

################################################################################
$pagination = new Pagination($page, transport_list());
// puede hacer falta
//$pagination->setUrl($url);
$transport = transport_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$transport = transport_list(10, 5);


include view("transport", "index");

if ($debug) {
    include "www/transport/views/debug.php";
}