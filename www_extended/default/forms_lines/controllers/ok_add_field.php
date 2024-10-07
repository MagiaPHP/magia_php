<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Recolection vars
$type = (isset($_REQUEST["type"]) && $_REQUEST["type"] != "") ? clean($_REQUEST["type"]) : false;
$form_id = (isset($_REQUEST["form_id"]) && $_REQUEST["form_id"] != "") ? clean($_REQUEST["form_id"]) : false;
//$field = (isset($_REQUEST["field"]) && $_REQUEST["field"] != "") ? clean($_REQUEST["field"]) : false;
//$new_data = (isset($_REQUEST["new_data"]) && $_REQUEST["new_data"] != "") ? clean($_REQUEST["new_data"]) : 0;
$order_by = forms_lines_next_order_by($form_id) + 1;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();

//vardump($_REQUEST);
//die();
################################################################################
# REQUIRED
################################################################################
//if (!$id) {
//    array_push($error, 'id is mandatory');
//}
//if (!$field) {
//    array_push($error, 'field is mandatory');
//}
//if (!$new_data) {
//    array_push($error, 'new_data is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
//if (!forms_lines_is_id($id)) {
//    array_push($error, 'id format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( forms_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    switch ($type) {
        case 'text':
            forms_lines_add_short($form_id, 'Label', 'text', 'name', $order_by);
            break;

        case 'hidden':
            forms_lines_add_short($form_id, 'Label', 'hidden', 'name', $order_by);
            break;

        case 'email':
            forms_lines_add_short($form_id, 'Email', 'email', 'email', $order_by);
            break;

        case 'date':
            forms_lines_add_short($form_id, 'Date', 'date', 'date', $order_by);
            break;

        case 'select':
//            forms_lines_add_short($form_id, 'Escoja uno', 'select', 'select', $order_by);
            forms_lines_add($form_id, 'select', 'select', 'form-control', 'select', 'select', null, null, null, null, null, null, null, null, null, '[{"value":"1","label":"On"},{"value":"0","label":"Off"}]', $order_by, 1);

            break;

        case 'textarea':
            forms_lines_add_short($form_id, 'Text area', 'textarea', 'textarea', $order_by);
            break;

        case 'radio':
//            forms_lines_add_short($form_id, 'Radio', 'radio', 'radio', $order_by);

            forms_lines_add($form_id, 'Radio', 'radio', 'form-control', 'radio', 'radio', null, null, null, null, null, null, null, null, null, '[{"value":"1","label":"On"},{"value":"0","label":"Off"}]', $order_by, 1);

            break;

        case 'check':
//            forms_lines_add_short($form_id, 'Check', 'check', 'check', $order_by);
            forms_lines_add($form_id, 'Check', 'check', 'form-control', 'check', 'check', null, null, null, null, null, null, null, null, null, '[{"value":"1","label":"Option 1"},{"value":"2","label":"Option 2"}]', $order_by, 1);

            break;

        case 'submit':
            forms_lines_add_short($form_id, 'Ok', 'submit', 'submit', $order_by);
            break;

        default:
            break;
    }


    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=forms&a=edit&id=$form_id#2");
            break;

        default:
            header("Location: index.php?c=forms&a=edit&id=$id#default");
            break;
    }
} else {

    include view("home", "pageError");
}
