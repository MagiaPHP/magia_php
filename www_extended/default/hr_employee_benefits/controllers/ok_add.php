<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;
$benefit_code = (isset($_POST["benefit_code"]) && $_POST["benefit_code"] != "" && $_POST["benefit_code"] != "null" ) ? clean($_POST["benefit_code"]) : null;
$company_part = (isset($_POST["company_part"]) && $_POST["company_part"] != "" && $_POST["company_part"] != "null" ) ? clean($_POST["company_part"]) : null;
$periodicity = (isset($_POST["periodicity"]) && $_POST["periodicity"] != "" ) ? clean($_POST["periodicity"]) : 1;
$price = (isset($_POST["price"]) && $_POST["price"] != "" && $_POST["price"] != "null" ) ? clean($_POST["price"]) : null;
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
if (!$benefit_code) {
    array_push($error, 'Benefit_code is mandatory');
}
//if (!$company_part) {
//    array_push($error, 'Company part is mandatory');
//}
if (!$periodicity) {
    array_push($error, 'Periodicity is mandatory');
}
//if (!$price) {
//    array_push($error, 'Price is mandatory');
//}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!hr_employee_benefits_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
if (!hr_employee_benefits_is_benefit_code($benefit_code)) {
    array_push($error, 'Benefit_code format error');
}
if (!hr_employee_benefits_is_company_part($company_part)) {
    array_push($error, 'Company part format error');
}
if (!hr_employee_benefits_is_periodicity($periodicity)) {
    array_push($error, 'Periodicity format error');
}
if ($price && !hr_employee_benefits_is_price($price)) {
    array_push($error, 'Price format error');
}
if (!hr_employee_benefits_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_employee_benefits_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
# Si el precio es null, se le asigna el precio por defecto de este beneficio 

if ($price === NULL) {
    $price = hr_benefits_field_code('value', $benefit_code) ? hr_benefits_field_code('value', $benefit_code) : 0 ;
}
if ($company_part === NULL) {
    $company_part = 0;
}
//if( hr_employee_benefits_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {
    
    $lastInsertId = hr_employee_benefits_insert($employee_id, $benefit_code, $price, $company_part, $periodicity, $order_by, $status);

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
            // ejemplo index.php?c=hr_employee_benefits&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


