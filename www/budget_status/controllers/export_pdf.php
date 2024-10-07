<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$budget_status = null;
$budget_status = budget_status_list();

//include "www/budget_status/views/export_pdf.php";
include view("budget_status", "export_pdf");
if ($debug) {
    include "www/budget_status/views/debug.php";
}