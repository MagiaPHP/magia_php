<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$clients = null;
$clients = clients_list(10, 5);

//include "www/clients/views/index.php";
include view("clients", "index");
if ($debug) {
    include "www/clients/views/debug.php";
}