<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################

if ($a != "edit") {
    array_push($error, "Action format error");
}
if (!addresses_transport_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {
    $addresses_transport = addresses_transport_details($id);

    include view("addresses_transport", "edit");
} else {
    array_push($error, "Check your form");

    include view("addresses_transport", "index");
}

