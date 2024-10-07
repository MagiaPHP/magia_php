<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$payroll_id = (isset($_REQUEST["payroll_id"]) && $_REQUEST["payroll_id"] != "") ? clean($_REQUEST["payroll_id"]) : null;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : null;
$in_out = (isset($_REQUEST["in_out"]) && $_REQUEST["in_out"] != "") ? clean($_REQUEST["in_out"]) : null;
$days = (isset($_REQUEST["days"]) && $_REQUEST["days"] != "") ? clean($_REQUEST["days"]) : null;
$quantity = (isset($_REQUEST["quantity"]) && $_REQUEST["quantity"] != "") ? clean($_REQUEST["quantity"]) : null;
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : null;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : null;
$formula = (isset($_REQUEST["formula"]) && $_REQUEST["formula"] != "") ? clean($_REQUEST["formula"]) : null;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : null;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : 1;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$payroll_id) {
    array_push($error, 'Payroll_id is mandatory');
}
if (!$value) {
    array_push($error, 'Value is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
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
if (!hr_payroll_lines_is_payroll_id($payroll_id)) {
    array_push($error, 'Payroll id format error');
}
if (!hr_payroll_lines_is_value($value)) {
    array_push($error, 'Value format error');
}
if (!hr_payroll_lines_is_description($description)) {
    array_push($error, 'Description format error');
}
if (!hr_payroll_lines_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!hr_payroll_lines_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_payroll_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_payroll_lines_edit(
            $id, $payroll_id, $code, $in_out, $days, $quantity, $value, $description, $formula, $order_by, $status
    );
    
    

    

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_lines");
            break;

        case 2:
            header("Location: index.php?c=hr_payroll_lines&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_payroll_lines&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_payroll_lines&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_payroll_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
