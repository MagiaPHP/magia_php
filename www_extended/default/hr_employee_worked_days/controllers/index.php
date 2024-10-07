<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date("m"); //date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');

################################################################################
//fecha fijada?
$fix_date = (json_decode(is_json(_options_option('config_hr_payroll_by_month_fix_date')) ?? [], true));

// si la fecha esta fijada, los meses y año sera remplazados
if (is_json($fix_date) && $fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];
} else {
    // Manejar el caso en que la fecha fija no esté definida o no se pueda decodificar correctamente
    $month = date('m'); // Mes actual
    $year = date('Y');  // Año actual
}
################################################################################
$date_start = date("Y-m-d");
$date_end = date("Y-m-d");
$date_plus_1 = (magia_dates_add_day($date_start, 1));
$date_remove_1 = (magia_dates_remove_day($date_end, 1));
################################################################################
$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_hr_employee_worked_days_order_col", $data, "hr_employee_worked_days");
}
################################################################################
$hr_employee_worked_days = null;
################################################################################
//$pagination = new Pagination($page, hr_employee_worked_days_search_by("date", $date));
//// puede hacer falta
//$url = "index.php?c=hr_employee_worked_days&a=search&w=by_date&date=" . $date;
//$pagination->setUrl($url);
//
//$hr_employee_worked_days = hr_employee_worked_days_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
################################################################################
$pagination = new Pagination($page, hr_employee_worked_days_search_by_period($date_start, $date_end));
// puede hacer falta
$url = "index.php?c=hr_employee_worked_days&a=search&w=by_period&date_start=$date_start&date_end=$date_end";
$pagination->setUrl($url);
$hr_employee_worked_days = hr_employee_worked_days_search_by_period($date_start, $date_end, $pagination->getStart(), $pagination->getLimit());
//---------------------------------------------------------------------
$employees_list_by_day = array();

foreach ($hr_employee_worked_days as $key => $employees_id_day) {
    array_push($employees_list_by_day, $employees_id_day["employee_id"]);
}
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


include view("hr_employee_worked_days", "index");

