<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : false;
//
$year = (isset($_REQUEST["year"]) && $_REQUEST["year"] != "") ? clean($_REQUEST["year"]) : false;
$month = (isset($_REQUEST["month"]) && $_REQUEST["month"] != "") ? clean($_REQUEST["month"]) : false;
$benefit_code = (isset($_REQUEST["benefit_code"]) && $_REQUEST["benefit_code"] != "") ? clean($_REQUEST["benefit_code"]) : false;
$all_workers = (isset($_REQUEST["all_workers"]) && $_REQUEST["all_workers"] != "") ? clean($_REQUEST["all_workers"]) : false;
//
$quantity = (isset($_REQUEST["quantity"]) && $_REQUEST["quantity"] != "") ? clean($_REQUEST["quantity"]) : false;
//$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] != "") ? clean($_REQUEST["price"]) : false;
//$company_part = (isset($_REQUEST["company_part"]) && $_REQUEST["company_part"] != "") ? clean($_REQUEST["company_part"]) : false;
//$employee_part = (isset($_REQUEST["employee_part"]) && $_REQUEST["employee_part"] != "") ? clean($_REQUEST["employee_part"]) : false;
//$company_part_value = (isset($_REQUEST["company_part_value"]) && $_REQUEST["company_part_value"] != "") ? clean($_REQUEST["company_part_value"]) : false;
//$employee_part_value = (isset($_REQUEST["employee_part_value"]) && $_REQUEST["employee_part_value"] != "") ? clean($_REQUEST["employee_part_value"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Employee_id is mandatory');
}

if ($all_workers) {
    if (!$year) {
        array_push($error, 'Year is mandatory');
    }
    if (!$month) {
        array_push($error, 'Month is mandatory');
    }
    if (!$benefit_code) {
        array_push($error, 'Benefit code is mandatory');
    }
}



//if (!$quantity) {
//    array_push($error, 'Quantity is mandatory');
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
if (!hr_employee_benefits_by_month_is_id($id)) {
    array_push($error, 'Id format error');
}
//if (!hr_employee_benefits_by_month_is_employee_id($employee_id)) {
//    array_push($error, 'Employee_id format error');
//}
//if (!hr_employee_benefits_by_month_is_year($year)) {
//    array_push($error, 'Year format error');
//}
//if (!hr_employee_benefits_by_month_is_month($month)) {
//    array_push($error, 'Month format error');
//}
//if (!hr_employee_benefits_by_month_is_benefit_code($benefit_code)) {
//    array_push($error, 'Benefit_code format error');
//}
//if (!hr_employee_benefits_by_month_is_quantity($quantity)) {
//    array_push($error, 'Quantity format error');
//}
//if (!hr_employee_benefits_by_month_is_order_by($order_by)) {
//    array_push($error, 'Order_by format error');
//}
//if (!hr_employee_benefits_by_month_is_status($status)) {
//    array_push($error, 'Status format error');
//}
//
//
if (!$quantity || $quantity == '' || $quantity == null) {
    $quantity = 0;
}
###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_benefits_by_month_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

//    hr_employee_benefits_by_month_edit(
//            $id, $employee_id, $year, $month, $benefit_code, $quantity, $price, $company_part, $employee_part, $company_part_value, $employee_part_value, $order_by, $status
//    );

//
//    vardump(hr_employee_benefits_by_month_search_by_year_month($year, $month)); 
//    
//    die(); 

    if ($all_workers) {
        foreach (hr_employee_benefits_by_month_search_by_year_month($year, $month) as $key => $line) {
            hr_employee_benefits_by_month_update_quantity($line['id'], $quantity);
        }
    } else {
        hr_employee_benefits_by_month_update_quantity($id, $quantity);
    }





    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_benefits_by_month");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_benefits_by_month&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
