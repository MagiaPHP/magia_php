<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$investment_lines = null;
$investment_lines = investment_lines_list();
//
include view("investment_lines", "export_pdf");
if ($debug) {
    include "www/investment_lines/views/debug.php";
}