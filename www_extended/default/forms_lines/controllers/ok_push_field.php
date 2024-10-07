<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$field = (isset($_REQUEST["field"]) && $_REQUEST["field"] != "") ? clean($_REQUEST["field"]) : false;
$new_data = (isset($_REQUEST["new_data"]) && $_REQUEST["new_data"] != "") ? clean($_REQUEST["new_data"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
//vardump($_REQUEST);
//die();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$field) {
    array_push($error, 'field is mandatory');
}
//if (!$new_data) {
//    array_push($error, 'new_data is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!forms_lines_is_id($id)) {
    array_push($error, 'id format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( forms_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
if ($field == 'm_options_values') {

    $values = json_decode(forms_lines_field_id('m_options_values', $id), true);
    if ($values == null || $values == 'null') {
        $values = array();
    }

    $value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : false;
    $label = (isset($_REQUEST["label"]) && $_REQUEST["label"] != "") ? clean($_REQUEST["label"]) : false;

    array_push($values, array('value' => $value, "label" => $label));

    $new_data = json_encode($values);
}




################################################################################
################################################################################
################################################################################
if (!$error) {

//    vardump(array(
//        $id, $field, $new_data
//    ));
//
//    die();
    forms_lines_update_field($id, $field, $new_data);

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=forms&a=edit&id=" . forms_lines_field_id('form_id', $id) . "&line=$id");
            break;

        default:
            header("Location: index.php?c=forms&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
