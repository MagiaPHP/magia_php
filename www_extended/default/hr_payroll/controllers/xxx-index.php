<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');


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
$hr_payroll = null;

################################################################################
$pagination = new Pagination($page, hr_payroll_list_full());
// puede hacer falta
//$pagination->setUrl($url);
$hr_payroll = hr_payroll_list_full($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$hr_payroll = hr_payroll_list(10, 5);


include view("hr_payroll", "index");

if ($debug) {
    include "www/hr_payroll/views/debug.php";
}