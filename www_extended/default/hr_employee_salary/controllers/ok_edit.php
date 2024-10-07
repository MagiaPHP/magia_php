<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : false;
$month = (isset($_REQUEST["month"]) && $_REQUEST["month"] != "") ? clean($_REQUEST["month"]) : false;
$hour = (isset($_REQUEST["hour"]) && $_REQUEST["hour"] != "") ? clean($_REQUEST["hour"]) : false;
$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] != "") ? clean($_REQUEST["date_start"]) : false;
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] != "") ? clean($_REQUEST["date_end"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee_id is mandatory');
}

if (!$month && !$hour) {
    array_push($error, 'You must write a value in salary per month or per hour, you cannot send both empty');
}

if (!$date_start) {
    array_push($error, 'Date_start is mandatory');
}
//if (!$order_by) {
//    array_push($error, 'Order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!hr_employee_salary_is_employee_id($employee_id)) {
    array_push($error, 'Employee id format error');
}
if (!hr_employee_salary_is_date_start($date_start)) {
    array_push($error, 'Date start format error');
}
//if (! hr_employee_salary_is_order_by($order_by) ) {
//    array_push($error, 'Order by format error');
//}
//if (! hr_employee_salary_is_status($status) ) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_salary_search($status)){
//array_push($error, "That text with that context the database already exists");
//}

if (!$month && $hour) {
    $month = null;
}

if ($month && !$hour) {
    $hour = null;
}
if (!$date_end) {
    $date_end = null;
}

//if (!$month && !$hour) {
//    array_push($error, "You must enter a remuneration");
//}

if (isset($date_end) && $date_end < $date_start) {
    array_push($error, "The end date cannot be earlier than the start date");
}

//if (hr_employee_salary_check_salary_overlap($employee_id, $date_start, $date_end)) {
//    array_push($error, "There is already a salary rate for the employee in the specified period");
//}


################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_employee_salary_edit(
            $id, $employee_id, $month, $hour, $date_start, $date_end, $order_by, $status
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
            // ejemplo index.php?c=hr_employee_salary&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
