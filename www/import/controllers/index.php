<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$factux_code = (isset($_GET["factux_code"]) && $_GET['factux_code'] != '' ) ? clean($_GET["factux_code"]) : false;
$check = (isset($_GET["check"]) && $_GET['check'] != '' ) ? clean($_GET["check"]) : false;

include view("import", "index");

