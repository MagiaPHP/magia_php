<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');

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
//$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
//$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
//$error = array();
//################################################################################
//// Actualizo con que columna esta ordenado 
//if (isset($_GET["order_col"])) {
//    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
//    _options_push("config_hr_employee_money_advance_order_col", $data, "hr_employee_money_advance");
//}
################################################################################
$hr_employee_money_advance = null;

################################################################################
$pagination = new Pagination($page, hr_employee_money_advance_search_by_year_month($year, $month));
// puede hacer falta
//$pagination->setUrl($url);
$hr_employee_money_advance = hr_employee_money_advance_search_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$hr_employee_money_advance = hr_employee_money_advance_list(10, 5);





include view("hr_employee_money_advance", "index");

if ($debug) {
    include "www/hr_employee_money_advance/views/debug.php";
}