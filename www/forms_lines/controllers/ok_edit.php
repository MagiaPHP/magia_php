<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$form_id = (isset($_REQUEST["form_id"]) && $_REQUEST["form_id"] != "") ? clean($_REQUEST["form_id"]) : false;
$m_label = (isset($_REQUEST["m_label"]) && $_REQUEST["m_label"] != "") ? clean($_REQUEST["m_label"]) : false;
$m_type = (isset($_REQUEST["m_type"]) && $_REQUEST["m_type"] != "") ? clean($_REQUEST["m_type"]) : false;
$m_class = (isset($_REQUEST["m_class"]) && $_REQUEST["m_class"] != "") ? clean($_REQUEST["m_class"]) : false;
$m_name = (isset($_REQUEST["m_name"]) && $_REQUEST["m_name"] != "") ? clean($_REQUEST["m_name"]) : false;
$m_id = (isset($_REQUEST["m_id"]) && $_REQUEST["m_id"] != "") ? clean($_REQUEST["m_id"]) : false;
$m_placeholder = (isset($_REQUEST["m_placeholder"]) && $_REQUEST["m_placeholder"] != "") ? clean($_REQUEST["m_placeholder"]) : false;
$m_value = (isset($_REQUEST["m_value"]) && $_REQUEST["m_value"] != "") ? clean($_REQUEST["m_value"]) : false;
$m_only_read = (isset($_REQUEST["m_only_read"]) && $_REQUEST["m_only_read"] != "") ? clean($_REQUEST["m_only_read"]) : false;
$m_mandatory = (isset($_REQUEST["m_mandatory"]) && $_REQUEST["m_mandatory"] != "") ? clean($_REQUEST["m_mandatory"]) : false;
$m_selected = (isset($_REQUEST["m_selected"]) && $_REQUEST["m_selected"] != "") ? clean($_REQUEST["m_selected"]) : false;
$m_disabled = (isset($_REQUEST["m_disabled"]) && $_REQUEST["m_disabled"] != "") ? clean($_REQUEST["m_disabled"]) : false;
$m_table_external = (isset($_REQUEST["m_table_external"]) && $_REQUEST["m_table_external"] != "") ? clean($_REQUEST["m_table_external"]) : false;
$m_col_external = (isset($_REQUEST["m_col_external"]) && $_REQUEST["m_col_external"] != "") ? clean($_REQUEST["m_col_external"]) : false;
$m_label_external = (isset($_REQUEST["m_label_external"]) && $_REQUEST["m_label_external"] != "") ? clean($_REQUEST["m_label_external"]) : false;
$m_options_values = (isset($_REQUEST["m_options_values"]) && $_REQUEST["m_options_values"] != "") ? clean($_REQUEST["m_options_values"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$m_class) {
    array_push($error, '$m_class is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!forms_lines_is_m_class($m_class)) {
    array_push($error, '$m_class format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( forms_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    forms_lines_edit(
            $id, $form_id, $m_label, $m_type, $m_class, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $m_table_external, $m_col_external, $m_label_external, $m_options_values, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=forms_lines");
            break;

        default:
            header("Location: index.php?c=forms_lines&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
