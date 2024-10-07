<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Recolection vars
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : null;
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
//if (!forms_lines_field_id('m_options_values', $line_id)) {
//    array_push($error, "Id does not exist in the db");
//}
################################################################################
$values = json_decode(forms_lines_field_id('m_options_values', $line_id), true);
################################################################################
#
//vardump($values);

$found_key = array_search($value, array_column($values, 'value'));

//vardump($value);
//vardump($found_key);
//vardump($values[$found_key]);

unset($values[$found_key]);

//vardump($values);
//vardump(array_values($values));
//vardump($values);


$new_data = ($values) ? json_encode(array_values($values)) : null;

//die();
################################################################################

if (!$error) {

    forms_lines_update_field($line_id, 'm_options_values', $new_data);

    switch ($redi) {

        default:
            header("Location: index.php?c=forms&a=edit&id=" . forms_lines_field_id('form_id', $line_id) . "&line=$line_id#default");
            break;
    }
} else {

    include view("home", "pageError");
}
