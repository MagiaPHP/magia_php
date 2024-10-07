<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$banks_lines_check = null;
$banks_lines_check = banks_lines_check_list();
//
include view("banks_lines_check", "export_pdf");
if ($debug) {
    include "www/banks_lines_check/views/debug.php";
}