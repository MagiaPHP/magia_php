<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$task_id = (isset($_POST["task_id"]) && $_POST["task_id"] != "" && $_POST["task_id"] != "null" ) ? clean($_POST["task_id"]) : null;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : null;
$date_registred = (isset($_POST["date_registred"]) && $_POST["date_registred"] != "" ) ? clean($_POST["date_registred"]) : date("Y-m-d-h:m:s");
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$task_id) {
    array_push($error, 'Task_id is mandatory');
}
if (!$contact_id) {
    array_push($error, 'Contact_id is mandatory');
}
if (!$date_registred) {
    array_push($error, 'Date_registred is mandatory');
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
if (!tasks_contacts_is_task_id($task_id)) {
    array_push($error, 'Task_id format error');
}
if (!tasks_contacts_is_contact_id($contact_id)) {
    array_push($error, 'Contact_id format error');
}
if (!tasks_contacts_is_date_registred($date_registred)) {
    array_push($error, 'Date_registred format error');
}
if (!tasks_contacts_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!tasks_contacts_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( tasks_contacts_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = tasks_contacts_add(
            $task_id, $contact_id, $date_registred, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_contacts");
            break;

        case 2:
            header("Location: index.php?c=tasks_contacts&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks_contacts&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks_contacts&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks_contacts&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=tasks&a=details&id=$task_id#6");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


