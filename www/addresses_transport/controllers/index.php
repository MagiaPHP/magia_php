<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$addresses_transport = null;
$addresses_transport = addresses_transport_list(10, 5);

//include "www/addresses_transport/views/index.php";
include view("addresses_transport", "index");
if ($debug) {
    include "www/addresses_transport/views/debug.php";
}