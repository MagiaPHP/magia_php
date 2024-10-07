<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : null;
$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');

################################################################################
//fecha fijada?
$fix_date = (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true));
// si la fecha esta fijada, los meses y año sera remplazados
// si la fecha esta fijada, los meses y año sera remplazados
if (isset($fix_date) && $fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];
}
################################################################################

$order_data = order_by_get_order_data($u_id, 'hr_employee_benefits_by_month');
// 0, 999, $order_data['col_name'], $order_data['order_way']


$hr_employee_benefits_by_month = null;

################################################################################
$pagination = new Pagination($page, hr_employee_benefits_by_month_search_by_year_month($year, $month, 0, 999, $order_data['col_name'], $order_data['order_way']));
// puede hacer falta
//$pagination->setUrl($url);
$hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
################################################################################    
// lista de personas que trabajadon ese mes 

$hr_employee_worked_days = hr_employee_worked_days_search_by_year_month($year, $month);


include view("hr_employee_benefits_by_month", "by_month");

