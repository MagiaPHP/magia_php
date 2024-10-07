<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$project_id = (isset($_REQUEST["project_id"]) && $_REQUEST["project_id"] != "") ? clean($_REQUEST["project_id"]) : false;
$budget_id = (isset($_REQUEST["budget_id"]) && $_REQUEST["budget_id"] != "") ? clean($_REQUEST["budget_id"]) : false;
$invoice_id = (isset($_REQUEST["invoice_id"]) && $_REQUEST["invoice_id"] != "") ? clean($_REQUEST["invoice_id"]) : false;
$expense_id = (isset($_REQUEST["expense_id"]) && $_REQUEST["expense_id"] != "") ? clean($_REQUEST["expense_id"]) : false;
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$project_id) {
    array_push($error, 'Project_id is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!projects_inout_is_project_id($project_id)) {
    array_push($error, 'Project_id format error');
}
if (!projects_inout_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!projects_inout_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( projects_inout_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    projects_inout_edit(
            $id, $project_id, $budget_id, $invoice_id, $expense_id, $value, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=projects_inout");
            break;

        case 2:
            header("Location: index.php?c=projects_inout&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=projects_inout&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=projects_inout&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=projects_inout&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
