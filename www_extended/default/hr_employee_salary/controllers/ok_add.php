<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;
$month = (isset($_POST["month"]) && $_POST["month"] != "" && $_POST["month"] != "null" ) ? clean($_POST["month"]) : null;
$hour = (isset($_POST["hour"]) && $_POST["hour"] != "" && $_POST["hour"] != "null" ) ? clean($_POST["hour"]) : null;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : false;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee_id is mandatory');
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
if (!hr_employee_salary_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
if (!hr_employee_salary_is_date_start($date_start)) {
    array_push($error, 'Date_start format error');
}
if (!hr_employee_salary_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_employee_salary_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_salary_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
if (!$month && !$hour) {
    array_push($error, "You must enter a remuneration");
}

if ($date_end && $date_end < $date_start) {
    array_push($error, "The end date cannot be earlier than the start date");
}

if (hr_employee_salary_has_same_start_date($employee_id, $date_start)) {
    array_push($error, "A salary is already registered with this start date for the employee.");
}

if (hr_employee_salary_check_salary_overlap($employee_id, $date_start, $date_end)) {
    array_push($error, "Unable to add a new salary for this employee because the specified salary period overlaps with an existing salary period. Please review the salary periods and make necessary adjustments before proceeding");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = hr_employee_salary_add(
            $employee_id, $month, $hour, $date_start, $date_end, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_salary");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_salary&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_salary&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_salary&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_salary&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


