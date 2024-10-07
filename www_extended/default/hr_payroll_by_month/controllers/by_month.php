<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');
################################################################################



$error = array();

$hr_employee_worked_days = null;

################################################################################
$pagination = new Pagination($page, hr_employee_worked_days_list_employees_by_year_month($year, $month));
// puede hacer falta

$url = "index.php?c=hr_employee_worked_days&a=by_month&w=by_period&year=$year&month=$month";
$pagination->setUrl($url);

$hr_employee_worked_days = hr_employee_worked_days_list_employees_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit());
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


// El tmp, como se desea ver esta pagina 
// El tmp, como se desea ver esta pagina 
// El tmp, como se desea ver esta pagina 
// El tmp, como se desea ver esta pagina 

$hr_payroll_by_months_tmp_index = _options_option('hr_payroll_by_months_tmp_index') ?? 12;

//vardump($hr_payroll_by_months_tmp_index);

if (isset($hr_payroll_by_months_tmp_index) && $hr_payroll_by_months_tmp_index == '12') {

    include view("hr_payroll_by_month", "by_month_12_cols");
} else {

    include view("hr_payroll_by_month", "by_month");
}


