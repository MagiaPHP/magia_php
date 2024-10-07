<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Recolection vars
$form_id = (isset($_REQUEST["form_id"]) && $_REQUEST["form_id"] != "") ? clean($_REQUEST["form_id"]) : null;
$line_id = (isset($_REQUEST["line_id"]) && $_REQUEST["line_id"] != "") ? clean($_REQUEST["line_id"]) : null;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();

//vardump($_REQUEST);
//die();
################################################################################
# REQUIRED
################################################################################
if (!$line_id) {
    array_push($error, 'id is mandatory');
}
//if (!$field) {
//    array_push($error, 'field is mandatory');
//}
//if (!$new_data) {
//    array_push($error, 'new_data is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!forms_lines_is_id($line_id)) {
    array_push($error, 'id format error');
}
###############################################################################
# CONDITIONAL
################################################################################
if (!forms_lines_field_id('id', $line_id)) {
    array_push($error, "Id does not exist in the db");
}
################################################################################
################################################################################
################################################################################

if (!$error) {

    forms_lines_delete($line_id);

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=forms&a=edit&id=$form_id#2");
            break;

        default:
            header("Location: index.php?c=forms&a=edit&id=$form_id#default");
            break;
    }
} else {

    include view("home", "pageError");
}
