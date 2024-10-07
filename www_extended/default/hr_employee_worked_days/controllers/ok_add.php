<?php

// AM PM
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

foreach ($employee_ids as $key => $employee_id) {
    $date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "" && $_REQUEST["date"] != "null" ) ? clean($_REQUEST["date"]) : null;

    $start_am = (isset($_REQUEST["start_am"]) && $_REQUEST["start_am"] != "" && $_REQUEST["start_am"] != "null" ) ? clean($_REQUEST["start_am"]) : null;
    $end_am = (isset($_REQUEST["end_am"]) && $_REQUEST["end_am"] != "" && $_REQUEST["end_am"] != "null" ) ? clean($_REQUEST["end_am"]) : null;

    $lunch = (isset($_REQUEST["lunch"]) && $_REQUEST["lunch"] != "" ) ? clean($_REQUEST["lunch"]) : null;

    $start_pm = (isset($_REQUEST["start_pm"]) && $_REQUEST["start_pm"] != "" && $_REQUEST["start_pm"] != "null" ) ? clean($_REQUEST["start_pm"]) : null;
    $end_pm = (isset($_REQUEST["end_pm"]) && $_REQUEST["end_pm"] != "" && $_REQUEST["end_pm"] != "null" ) ? clean($_REQUEST["end_pm"]) : null;

    $project_id = (isset($_REQUEST["project_id"]) && $_REQUEST["project_id"] != "" && $_REQUEST["project_id"] != "null" ) ? clean($_REQUEST["project_id"]) : null;

    $notes = (isset($_REQUEST["notes"]) && $_REQUEST["notes"] != "" && $_REQUEST["notes"] != "null" ) ? clean($_REQUEST["notes"]) : null;

################################################################################
# REQUIRED
################################################################################

    if (!$employee_id) {
        array_push($error, 'Employee_id is mandatory');
    }
    if (!$date) {
        array_push($error, 'Date is mandatory');
    }
    if (!$start_am) {
        array_push($error, 'Start_am is mandatory');
    }
//    if (!$lunch) {
//        array_push($error, 'Lunch is mandatory');
//    }
    // Si el modulo esta activo y no se envia el id da error 
    if (modules_field_module('status', 'projects') && !$project_id) {
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
    if (!hr_employee_worked_days_is_employee_id($employee_id)) {
        array_push($error, 'Employee id format error');
    }
    if (!hr_employee_worked_days_is_date($date)) {
        array_push($error, 'Date format error');
    }
    if (!hr_employee_worked_days_is_start_am($start_am)) {
        array_push($error, 'Start am format error');
    }
    if (!hr_employee_worked_days_is_lunch($lunch)) {
        array_push($error, 'Lunch format error');
    }
    if (modules_field_module('status', 'projects') && !hr_employee_worked_days_is_project_id($project_id)) {
        array_push($error, 'Project id format error');
    }
    if (!hr_employee_worked_days_is_order_by($order_by)) {
        array_push($error, 'Order by format error');
    }
    if (!hr_employee_worked_days_is_status($status)) {
        array_push($error, 'Status format error');
    }
    ###########################################################################
    # C O N D I C I O N A L #
    ## pasamos el null del str a null 
    if (strtolower($project_id) == 'null') {
        $project_id = null;
    }

    $sec_start_am = magia_dates_time_to_sec($start_am);
    $sec_end_am = magia_dates_time_to_sec($end_am);
    $sec_lunch = ($lunch) ? magia_dates_time_to_sec($lunch) : 0;
    $sec_start_pm = magia_dates_time_to_sec($start_pm);
    $sec_end_pm = magia_dates_time_to_sec($end_pm);

    $total_hours = magia_dates_sec_to_time(($sec_end_am - $sec_start_am) - $sec_lunch + ($sec_end_pm - $sec_start_pm ));

    if ($sec_start_am > $sec_end_am) {
        array_push($error, "The start time in the morning must be less than the end time in the morning");
    }

    if ($sec_end_am > $sec_start_pm) {
        array_push($error, "The start time in the afternoon must be greater than or equal to the end time in the morning");
    }

    if ($sec_start_pm > $sec_end_pm) {
        array_push($error, "The afternoon end time must be greater than the afternoon end time");
    }

    ############################################################################
    ############################################################################
    if (!$error) {

        hr_employee_worked_days_add(
                $employee_id, $date, $start_am, $end_am, $lunch, $start_pm, $end_pm, $total_hours, $project_id, $notes, $order_by, $status, null, null
        );
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



