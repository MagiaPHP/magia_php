<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$projects_status = null;
$projects_status = projects_status_list();
//
include view("projects_status", "export_pdf");
if ($debug) {
    include "www/projects_status/views/debug.php";
}