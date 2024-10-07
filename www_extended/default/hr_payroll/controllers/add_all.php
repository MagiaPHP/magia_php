<?php


vardump($_REQUEST); 

die(); 


/**
 * Add by all workers work this date
 */
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$error = array();
################################################################################
#//fecha fijada?
$fix_date = (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true));
// si la fecha esta fijada, los meses y año sera remplazados
if ($fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];
}
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_hr_payroll_order_col", $data, "hr_payroll");
}
################################################################################
$pagination = new Pagination($page, hr_employee_worked_days_list_employees_by_year_month($year, $month));
// puede hacer falta
$url = "index.php?c=hr_employee_worked_days&a=by_month&w=by_period&year=$year&month=$month";
$pagination->setUrl($url);
$hr_employee_worked_days = hr_employee_worked_days_list_employees_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit(), $order_by);
################################################################################



include view("hr_payroll", "add_all");
