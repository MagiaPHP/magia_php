<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');
// Derecha
$der = (isset($_GET["der"]) && $_GET["der"] != "" ) ? clean($_GET["der"]) : null;
$employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : null;

################################################################################
//fecha fijada?
$fix_date = (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true));
// si la fecha esta fijada, los meses y año sera remplazados
if ($fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];
}
################################################################################
################################################################################
################################################################################
$order_by['col'] = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_by['way'] = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $order_by_json = json_encode(array("order_col" => $order_by['col'], "order_way" => $order_by['way']));
    _options_push("config_hr_employee_worked_days_order_col", $order_by_json, "hr_employee_worked_days");
}
################################################################################
################################################################################
$error = array();

$hr_employee_worked_days = null;

################################################################################
$pagination = new Pagination($page, hr_employee_worked_days_list_employees_by_year_month($year, $month));
// puede hacer falta
$url = "index.php?c=hr_employee_worked_days&a=by_month&w=by_period&year=$year&month=$month";
$pagination->setUrl($url);
$hr_employee_worked_days = hr_employee_worked_days_list_employees_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit(), $order_by);
################################################################################
// es la lista de empleados uqe trabajan ese mes
//vardump($hr_employee_worked_days); 

foreach ($hr_employee_worked_days as $line) {
    foreach (array('value_round', 'total_sold', 'pay_to_bank', 'pay_to_cash', 'total_to_pay') as $column) {
        if (!hr_payroll_by_month_field_by('id', $line['employee_id'], $year, $month, $column)) {
            hr_payroll_by_month_add($line['employee_id'], $year, $month, $column, 0, null, '', magia_uniqid(), date('Y-m-d G:m:s'), 1, 1);
        }
    }
}

$employees_list_by_day = array();
$employees_list = array();
foreach ($hr_employee_worked_days as $key => $employees_in_day) {
    array_push($employees_list, $employees_in_day["employee_id"]);
}


include view("hr_payroll_by_month", "solde");

