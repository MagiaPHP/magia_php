<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : null;
$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : null;
$work_status_code = (isset($_REQUEST["work_status_code"]) && $_REQUEST["work_status_code"] != "") ? clean($_REQUEST["work_status_code"]) : null;
$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] != "") ? clean($_REQUEST["date_start"]) : null;
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] != "") ? clean($_REQUEST["date_end"]) : null;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : null;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : null;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee_id is mandatory');
}
if (!$work_status_code) {
    array_push($error, 'Work_status_code is mandatory');
}
if (!$date_start) {
    array_push($error, 'Date_start is mandatory');
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
if (!hr_employee_work_status_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
if (!hr_employee_work_status_is_work_status_code($work_status_code)) {
    array_push($error, 'Work_status_code format error');
}
if (!hr_employee_work_status_is_date_start($date_start)) {
    array_push($error, 'Date_start format error');
}
if (!hr_employee_work_status_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_employee_work_status_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_work_status_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_employee_work_status_edit(
            $id, $employee_id, $work_status_code, $date_start, $date_end, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_work_status");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_work_status&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_work_status&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
