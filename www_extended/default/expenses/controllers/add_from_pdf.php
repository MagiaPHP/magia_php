<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file = ( isset($_REQUEST["file"]) && $_REQUEST["file"] != "null" ) ? clean($_REQUEST["file"]) : null;

include view("expenses", "add_from_pdf");
