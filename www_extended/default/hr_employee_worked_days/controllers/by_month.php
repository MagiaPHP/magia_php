<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date("m");

// Set $month
$_SESSION["month"] = $month;

$month = $_SESSION["month"];

$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";

$error = array();

################################################################################
// Actualizo con que columna esta ordenado 
// si la fecha esta fijada, los meses y año sera remplazados
if (isset($fix_date) && $fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];
}
################################################################################
$hr_employee_worked_days = null;

//$date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
$date_start = "$year-$month-01";
$date_end = "$year-$month-31";
$date_plus_1 = (magia_dates_add_day($date_start, 1));
$date_remove_1 = (magia_dates_remove_day($date_end, 1));

################################################################################
//$pagination = new Pagination($page, hr_employee_worked_days_search_by("date", $date));
//// puede hacer falta
//$url = "index.php?c=hr_employee_worked_days&a=search&w=by_date&date=" . $date;
//$pagination->setUrl($url);
//
//$hr_employee_worked_days = hr_employee_worked_days_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
################################################################################
$pagination = new Pagination($page, hr_employee_worked_days_search_by_from_to($date_start, $date_end));
// puede hacer falta
$url = "index.php?c=hr_employee_worked_days&a=search&w=by_period&date_start=$date_start&date_end=$date_end";
$pagination->setUrl($url);
$hr_employee_worked_days = hr_employee_worked_days_search_by_from_to($date_start, $date_end, $pagination->getStart(), $pagination->getLimit());

vardump($hr_employee_worked_days);
// agregamos hr_payroll_by_month para cada empleado d ese mes

foreach ($hr_employee_worked_days as $line) {

    foreach (array('value_round', 'total_sold', 'pay_to_bank', 'pay_to_cash', 'total_to_pay') as $key => $column) {
        hr_payroll_by_month_add($line['employee_id'], $month, $year, $column, 0, null, '', magia_uniqid(), date('Y-m-d h:m:s'), 1, 1);
    }
}



//---------------------------------------------------------------------
//$employees_list_by_day = array();
//vardump(array($date_start, $date_end)); 
//vardump($hr_employee_worked_days); 
//$employees_list = array(); 
//foreach ($hr_employee_worked_days as $key => $employees_id_day) {
//    array_push($employees_list, $employees_id_day["employee_id"]);
//}
################################################################################ 
//################################################################################
//// listar por fecha, y empezar por hoy 
//$today = date("Y-m-d");
//$pagination = new Pagination($page, hr_employee_worked_days_list());
//// puede hacer falta
////$pagination->setUrl($url);
//$hr_employee_worked_days = hr_employee_worked_days_list($pagination->getStart(), $pagination->getLimit());
//################################################################################    
//$hr_employee_worked_days = hr_employee_worked_days_list(10, 5);


include view("hr_employee_worked_days", "by_month");

