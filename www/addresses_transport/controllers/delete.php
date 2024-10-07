<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
if (!$c) {
    array_push($error, "Controller don't send");
}
if (!$a) {
    array_push($error, "Action don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a != "delete") {
    array_push($error, "Action error");
}

if (!addresses_transport_is_id($id)) {
    array_push($error, 'Id format error ');
}
################################################################################
$addresses_transport = addresses_transport_details($id);

//include "www/addresses_transport/views/delete.php"; 
include view("addresses_transport", "delete");
