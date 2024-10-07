<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : null;
$error = array();

$hr_employee_payroll_items = null;

$order_data = order_by_get_order_data($u_id, 'hr_employee_payroll_items');

################################################################################
$pagination = new Pagination($page, hr_employee_payroll_items_list(0, 999, $order_data['col_name'], $order_data['order_way']));
// puede hacer falta
//$pagination->setUrl($url);
$hr_employee_payroll_items = hr_employee_payroll_items_list($pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
################################################################################    


include view("hr_employee_payroll_items", "hr");

if ($debug) {
    include "www/hr_employee_payroll_items/views/debug.php";
}