<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$project_id = (isset($_POST["project_id"]) && $_POST["project_id"] != "" && $_POST["project_id"] != "null" ) ? clean($_POST["project_id"]) : false;
$budget_id = (isset($_POST["budget_id"]) && $_POST["budget_id"] != "" && $_POST["budget_id"] != "null" ) ? clean($_POST["budget_id"]) : null;
$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != "" && $_POST["invoice_id"] != "null" ) ? clean($_POST["invoice_id"]) : null;
$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] != "" && $_POST["expense_id"] != "null" ) ? clean($_POST["expense_id"]) : null;
//
$value = (isset($_POST["value"]) && $_POST["value"] != "" && $_POST["value"] != "null" ) ? clean($_POST["value"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
if ($budget_id == 'null') {
    $budget_id = null;
}
if ($invoice_id == 'null') {
    $invoice_id = null;
}
if ($expense_id == 'null') {
    $expense_id = null;
}
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
################################################################################
if (!$error) {
    $lastInsertId = projects_inout_add(
            $project_id, $budget_id, $invoice_id, $expense_id, $value, $order_by, $status
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
            // ejemplo index.php?c=projects_inout&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#6");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


