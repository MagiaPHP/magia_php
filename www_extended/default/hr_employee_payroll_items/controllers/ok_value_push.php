<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
//$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!hr_employee_payroll_items_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
//if (! hr_employee_payroll_items_is_order_by($order_by) ) {
//    array_push($error, 'Order_by format error');
//}
//if (! hr_employee_payroll_items_is_status($status) ) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_payroll_items_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_employee_payroll_items_push_value_by($employee_id, $code, $value);

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_payroll_items");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_payroll_items&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_payroll_items&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_payroll_items&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_payroll_items&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
