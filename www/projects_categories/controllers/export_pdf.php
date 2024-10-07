<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$projects_categories = null;
$projects_categories = projects_categories_list();
//
include view("projects_categories", "export_pdf");
if ($debug) {
    include "www/projects_categories/views/debug.php";
}