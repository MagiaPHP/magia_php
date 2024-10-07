<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

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
if (!invoice_lines_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {
    $invoice_lines = invoice_lines_details($id);

    include view("invoice_lines", "edit");
} else {
    array_push($error, "Check your form");

    include view("invoice_lines", "index");
}

