<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//
$employee_ids = (isset($_REQUEST["employee_ids"]) && $_REQUEST["employee_ids"] != "" && $_REQUEST["employee_ids"] != "null" ) ? clean($_REQUEST["employee_ids"]) : null;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "" ) ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "" ) ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
$error = array();

if (!$employee_ids) {
    array_push($error, 'Employee id is mandatory');
}


//

foreach ($employee_ids as $key => $employee_id) {
    $date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "" && $_REQUEST["date"] != "null" ) ? clean($_REQUEST["date"]) : null;
    $start_am = (isset($_REQUEST["start_am"]) && $_REQUEST["start_am"] != "" && $_REQUEST["start_am"] != "null" ) ? clean($_REQUEST["start_am"]) : null;
    $end_am = (isset($_REQUEST["end_am"]) && $_REQUEST["end_am"] != "" && $_REQUEST["end_am"] != "null" ) ? clean($_REQUEST["end_am"]) : null;
    $lunch = (isset($_REQUEST["lunch"]) && $_REQUEST["lunch"] != "" ) ? clean($_REQUEST["lunch"]) : null;
    $start_pm = (isset($_REQUEST["start_pm"]) && $_REQUEST["start_pm"] != "" && $_REQUEST["start_pm"] != "null" ) ? clean($_REQUEST["start_pm"]) : null;
    $end_pm = (isset($_REQUEST["end_pm"]) && $_REQUEST["end_pm"] != "" && $_REQUEST["end_pm"] != "null" ) ? clean($_REQUEST["end_pm"]) : null;
    $total_hours = (isset($_REQUEST["total_hours"]) && $_REQUEST["total_hours"] != "" && $_REQUEST["total_hours"] != "null" ) ? clean($_REQUEST["total_hours"]) : null;
    $project_id = (isset($_REQUEST["project_id"]) && $_REQUEST["project_id"] != "" && $_REQUEST["project_id"] != "null" ) ? clean($_REQUEST["project_id"]) : null;
    $notes = (isset($_REQUEST["notes"]) && $_REQUEST["notes"] != "" && $_REQUEST["notes"] != "null" ) ? clean($_REQUEST["notes"]) : null;
################################################################################
# REQUIRED
################################################################################
    if (!$employee_id) {
        array_push($error, 'Employee id is mandatory');
    }
    if (!$date) {
        array_push($error, 'Date is mandatory');
    }
//    if (!$start_am) {
//        array_push($error, 'Start_am is mandatory');
//    }
//    if (!$lunch) {
//        array_push($error, 'Lunch is mandatory');
//    }
    if (modules_field_module('status', 'projects') && !$project_id) {
        array_push($error, 'Project id is mandatory');
    }
    if (!$order_by) {
        array_push($error, 'Order by is mandatory');
    }
    if (!$status) {
        array_push($error, 'Status is mandatory');
    }

    ###############################################################################
# FORMAT
###############################################################################
    if (!hr_employee_worked_days_is_employee_id($employee_id)) {
        array_push($error, 'Employee_id format error');
    }
    if (!hr_employee_worked_days_is_date($date)) {
        array_push($error, 'Date format error');
    }
    if (modules_field_module('status', 'projects') && !hr_employee_worked_days_is_project_id($project_id)) {
        array_push($error, 'Project_id format error');
    }
//    if (!hr_employee_worked_days_is_order_by($order_by)) {
//        array_push($error, 'Order_by format error');
//    }
//    if (!hr_employee_worked_days_is_status($status)) {
//        array_push($error, 'Status format error');
//    }
    ############################################################################
    ############################################################################
    ############################################################################
    ## pasamos el null del str a null 
    if (strtolower($project_id) == 'null') {
        $project_id = null;
    }

    if (!$error) {

        hr_employee_worked_days_add_small($employee_id, $date, $total_hours, $project_id, $notes, $order_by, $status);
    }
}

################################################################################
################################################################################
################################################################################

if (!$error) {


    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_worked_days");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_worked_days&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_worked_days&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_worked_days&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_worked_days&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}



