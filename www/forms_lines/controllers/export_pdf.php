<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$forms_lines = null;
$forms_lines = forms_lines_list();
//
include view("forms_lines", "export_pdf");
if ($debug) {
    include "www/forms_lines/views/debug.php";
}