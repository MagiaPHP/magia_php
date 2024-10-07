<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;
$month = (isset($_POST["month"]) && $_POST["month"] != "" && $_POST["month"] != "null" ) ? clean($_POST["month"]) : null;
$year = (isset($_POST["year"]) && $_POST["year"] != "" && $_POST["year"] != "null" ) ? clean($_POST["year"]) : null;
$column = (isset($_POST["column"]) && $_POST["column"] != "" && $_POST["column"] != "null" ) ? clean($_POST["column"]) : null;
$value = (isset($_POST["value"]) && $_POST["value"] != "" && $_POST["value"] != "null" ) ? clean($_POST["value"]) : null;
$formule = (isset($_POST["formule"]) && $_POST["formule"] != "" && $_POST["formule"] != "null" ) ? clean($_POST["formule"]) : null;
$notes = (isset($_POST["notes"]) && $_POST["notes"] != "" && $_POST["notes"] != "null" ) ? clean($_POST["notes"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : magia_uniqid();
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date('Y-m-d G:i:s');
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
if (!$month) {
    array_push($error, 'Month is mandatory');
}
if (!$year) {
    array_push($error, 'Year is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
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
if (!hr_employee_worked_days_formule_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
if (!hr_employee_worked_days_formule_is_month($month)) {
    array_push($error, 'Month format error');
}
if (!hr_employee_worked_days_formule_is_year($year)) {
    array_push($error, 'Year format error');
}
if (!hr_employee_worked_days_formule_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!hr_employee_worked_days_formule_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!hr_employee_worked_days_formule_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_employee_worked_days_formule_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_worked_days_formule_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    vardump(array($employee_id, $month, $year, $column, $value));

    die();

    hr_employee_worked_days_formule_push_value_by($employee_id, $month, $year, $column, $value);

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_worked_days_formule");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_worked_days_formule&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_worked_days_formule&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_worked_days_formule&a=by_month#4");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_worked_days_formule&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


