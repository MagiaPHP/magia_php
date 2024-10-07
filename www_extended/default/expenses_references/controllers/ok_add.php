<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] != "" ) ? clean($_POST["expense_id"]) : null;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : null;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : null;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$expense_id) {
    array_push($error, '$expense_id is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!expenses_references_is_expense_id($expense_id)) {
    array_push($error, '$expense_id format error');
}
if (!expenses_references_is_name($name)) {
    array_push($error, '$name format error');
}
if (!expenses_references_is_description($description)) {
    array_push($error, '$description format error');
}
if (!expenses_references_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!expenses_references_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( expenses_references_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = expenses_references_add(
            $expense_id, $name, $description, $order_by, $status
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=expenses_references&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=details&id=$expense_id");
            break;

        default:
            header("Location: index.php?c=expenses_references");
            break;
    }
} else {

    include view("home", "pageError");
}


