<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] !="") ? clean($_REQUEST["employee_id"]) : false;
//$benefit_code = (isset($_REQUEST["benefit_code"]) && $_REQUEST["benefit_code"] !="") ? clean($_REQUEST["benefit_code"]) : false;
$company_part = (isset($_REQUEST["company_part"]) && $_REQUEST["company_part"] != "") ? clean($_REQUEST["company_part"]) : false;
$periodicity = (isset($_REQUEST["periodicity"]) && $_REQUEST["periodicity"] != "") ? clean($_REQUEST["periodicity"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] != "") ? clean($_REQUEST["price"]) : false;
//
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
//if (!$employee_id) {
//    array_push($error, 'Employee_id is mandatory');
//}
//if (!$benefit_code) {
//    array_push($error, 'Benefit_code is mandatory');
//}
//if (!$company_part) {
//    array_push($error, 'Company part is mandatory');
//}
if (!$periodicity) {
    array_push($error, 'Periodicity is mandatory');
}
//if (!$price) {
//    array_push($error, 'Price is mandatory');
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
//if (! hr_employee_benefits_is_employee_id($employee_id) ) {
//    array_push($error, 'Employee id format error');
//}
//if (! hr_employee_benefits_is_benefit_code($benefit_code) ) {
//    array_push($error, 'Benefit code format error');
//}
//if (!hr_employee_benefits_is_company_part($company_part)) {
//    array_push($error, 'Company part format error');
//}
if (!hr_employee_benefits_is_periodicity($periodicity)) {
    array_push($error, 'Periodicity format error');
}
//if (!hr_employee_benefits_is_price($price)) {
//    array_push($error, 'Price format error');
//}
//if (!hr_employee_benefits_is_order_by($order_by)) {
//    array_push($error, 'Order by format error');
//}
//if (!hr_employee_benefits_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
if ($price === NULL || $price == '') {
    $price = hr_benefits_field_code('value', $benefit_code);
}
if ($company_part === NULL || $company_part == '') {
    $company_part = 0;
}
//if( hr_employee_benefits_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_employee_benefits_update(
            $id, $company_part, $periodicity, $price
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_benefits");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_benefits&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_benefits&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_benefits&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_benefits&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
