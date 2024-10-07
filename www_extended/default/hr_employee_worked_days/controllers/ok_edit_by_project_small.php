<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;

//$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : false;
//$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
//
//$start_am = (isset($_REQUEST["start_am"]) && $_REQUEST["start_am"] != "") ? clean($_REQUEST["start_am"]) : false;
//$end_am = (isset($_REQUEST["end_am"]) && $_REQUEST["end_am"] != "") ? clean($_REQUEST["end_am"]) : '00:00:00';
//$lunch = (isset($_REQUEST["lunch"]) && $_REQUEST["lunch"] != "") ? clean($_REQUEST["lunch"]) : '00:00:00';
//$start_pm = (isset($_REQUEST["start_pm"]) && $_REQUEST["start_pm"] != "") ? clean($_REQUEST["start_pm"]) : '00:00:00';
//$end_pm = (isset($_REQUEST["end_pm"]) && $_REQUEST["end_pm"] != "") ? clean($_REQUEST["end_pm"]) : '00:00:00';

$total_hours = (isset($_REQUEST["total_hours"]) && $_REQUEST["total_hours"] != "" ) ? clean($_REQUEST["total_hours"]) : '00:00:00';
$project_id = (isset($_REQUEST["project_id"]) && $_REQUEST["project_id"] != "") ? clean($_REQUEST["project_id"]) : null;
$notes = (isset($_REQUEST["notes"]) && $_REQUEST["notes"] != "") ? clean($_REQUEST["notes"]) : null;

//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
//if (!$employee_id) {
//    array_push($error, 'Employee id is mandatory');
//}
//if (!$date) {
//    array_push($error, 'Date is mandatory');
//}
//if (!$start_am) {
//    array_push($error, 'Start_am is mandatory');
//}
//if (!$lunch) {
//    array_push($error, 'Lunch is mandatory');
//}
//if (!$total_hours) {
//    array_push($error, 'Total hours is mandatory');
//}
//if (!$project_id) {
//array_push($error, 'Project id is mandatory');
//}
//if (!$notes) {
//    array_push($error, 'notes id is mandatory');
//}
//if (!$order_by) {
//    array_push($error, 'Order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!hr_employee_worked_days_is_id($id)) {
    array_push($error, 'Id format error');
}
//if (!hr_employee_worked_days_is_employee_id($employee_id)) {
//    array_push($error, 'Employee_id format error');
//}
//if (!hr_employee_worked_days_is_date($date)) {
//    array_push($error, 'Date format error');
//}
//if (!hr_employee_worked_days_is_start_am($start_am)) {
//    array_push($error, 'Start_am format error');
//}
//if (!hr_employee_worked_days_is_lunch($lunch)) {
//    array_push($error, 'Lunch format error');
//}
if (!hr_employee_worked_days_is_total_hours($total_hours)) {
    array_push($error, 'Total hours format error');
}
if (!hr_employee_worked_days_is_project_id($project_id)) {
    array_push($error, 'Project_id format error');
}
if (!hr_employee_worked_days_is_notes($notes)) {
    array_push($error, 'Notes format error');
}
//if (!hr_employee_worked_days_is_order_by($order_by)) {
//    array_push($error, 'Order_by format error');
//}
//if (!hr_employee_worked_days_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_worked_days_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
if ($total_hours == 'null') {
    $total_hours = null;
}
################################################################################
################################################################################
################################################################################

if (!$error) {

//    hr_employee_worked_days_edit(
//            $id, $employee_id, $date, $start_am, $end_am, $lunch, $start_pm, $end_pm, $project_id, $notes, $order_by, $status
//    );


    hr_employee_worked_days_edit_small(
            $id, $total_hours, $project_id, $notes
    );

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
            // ejemplo index.php?c=hr_employee_worked_days&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
