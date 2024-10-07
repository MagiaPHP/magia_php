<?php

//
//echo 'go to <a href="index.php?c=hr_employee_worked_days&a=by_month">new by month</a>';
//die();
// http://localhost/factuz/index.php?c=hr_payroll&a=by_month

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date("Y");
$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date("m");
//
//
$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";

$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_hr_payroll_order_col", $data, "hr_payroll");
}
################################################################################
$hr_payroll = null;

################################################################################
$pagination = new Pagination($page, hr_payroll_list());
// puede hacer falta
//$pagination->setUrl($url);
$hr_payroll = hr_payroll_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$hr_payroll = hr_payroll_list(10, 5);


include view("hr_payroll", "by_month");
