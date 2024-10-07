<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$form_id = (isset($_POST["form_id"]) && $_POST["form_id"] != "" && $_POST["form_id"] != "null" ) ? clean($_POST["form_id"]) : false;
$m_label = (isset($_POST["m_label"]) && $_POST["m_label"] != "" && $_POST["m_label"] != "null" ) ? clean($_POST["m_label"]) : false;
$m_type = (isset($_POST["m_type"]) && $_POST["m_type"] != "" ) ? clean($_POST["m_type"]) : text;
$m_class = (isset($_POST["m_class"]) && $_POST["m_class"] != "" ) ? clean($_POST["m_class"]) : form - control;
$m_name = (isset($_POST["m_name"]) && $_POST["m_name"] != "" && $_POST["m_name"] != "null" ) ? clean($_POST["m_name"]) : false;
$m_id = (isset($_POST["m_id"]) && $_POST["m_id"] != "" && $_POST["m_id"] != "null" ) ? clean($_POST["m_id"]) : false;
$m_placeholder = (isset($_POST["m_placeholder"]) && $_POST["m_placeholder"] != "" && $_POST["m_placeholder"] != "null" ) ? clean($_POST["m_placeholder"]) : false;
$m_value = (isset($_POST["m_value"]) && $_POST["m_value"] != "" && $_POST["m_value"] != "null" ) ? clean($_POST["m_value"]) : false;
$m_only_read = (isset($_POST["m_only_read"]) && $_POST["m_only_read"] != "" && $_POST["m_only_read"] != "null" ) ? clean($_POST["m_only_read"]) : false;
$m_mandatory = (isset($_POST["m_mandatory"]) && $_POST["m_mandatory"] != "" && $_POST["m_mandatory"] != "null" ) ? clean($_POST["m_mandatory"]) : false;
$m_selected = (isset($_POST["m_selected"]) && $_POST["m_selected"] != "" && $_POST["m_selected"] != "null" ) ? clean($_POST["m_selected"]) : false;
$m_disabled = (isset($_POST["m_disabled"]) && $_POST["m_disabled"] != "" && $_POST["m_disabled"] != "null" ) ? clean($_POST["m_disabled"]) : false;
$m_table_external = (isset($_POST["m_table_external"]) && $_POST["m_table_external"] != "" && $_POST["m_table_external"] != "null" ) ? clean($_POST["m_table_external"]) : false;
$m_col_external = (isset($_POST["m_col_external"]) && $_POST["m_col_external"] != "" && $_POST["m_col_external"] != "null" ) ? clean($_POST["m_col_external"]) : false;
$m_label_external = (isset($_POST["m_label_external"]) && $_POST["m_label_external"] != "" && $_POST["m_label_external"] != "null" ) ? clean($_POST["m_label_external"]) : false;
$m_options_values = (isset($_POST["m_options_values"]) && $_POST["m_options_values"] != "" && $_POST["m_options_values"] != "null" ) ? clean($_POST["m_options_values"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = forms_lines_add(
            $form_id, $m_label, $m_type, $m_class, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $m_table_external, $m_col_external, $m_label_external, $m_options_values, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=forms_lines");
            break;

        case 2:
            header("Location: index.php?c=forms_lines&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=forms_lines&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=forms_lines&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


