<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m', strtotime('-1 month'));
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');

//$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
//
//$from = (isset($_REQUEST['from']) && $_REQUEST['from'] !== '') ? clean($_REQUEST['from']) : magia_dates_first_month_day();
//$to = (isset($_REQUEST['to']) && $_REQUEST['to'] !== '') ? clean($_REQUEST['to']) : magia_dates_last_month_day();
//
//$category_code = (isset($_REQUEST['category_code'])) ? clean($_REQUEST['category_code']) : 'all';

//vardump(array(
//    '$month' => $month,
//    '$year' => $year,
//    '$id' => $id,
//    '$from' => $from,
//    '$to' => $to,
//    '$category_code' => $category_code,
//));

################################################################################
################################################################################
//fecha fijada?
$fix_date = (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true));
// si la fecha esta fijada, los meses y año sera remplazados
// si la fecha esta fijada, los meses y año sera remplazados
if (isset($fix_date) && $fix_date['fix']) {
    $month = $fix_date['month'];
    $year = $fix_date['year'];

    $from = magia_dates_first_month_day($month, $year);
    $to = magia_dates_last_month_day($month, $year);
}
################################################################################
################################################################################
//$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
//$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
//$error = array();
//################################################################################
//// Actualizo con que columna esta ordenado 
//if (isset($_GET["order_col"])) {
//    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
//    _options_push("config_hr_employee_fines_order_col", $data, "hr_employee_fines");
//}
################################################################################
$hr_employee_fines = null;

################################################################################
$pagination = new Pagination($page, hr_employee_fines_list());
// puede hacer falta
//$pagination->setUrl($url);
$hr_employee_fines = hr_employee_fines_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$hr_employee_fines = hr_employee_fines_list(10, 5);
//$hr_employee_fines = hr_employee_fines_search_by_employee_from_to_category($id, $from, $to, $category_code);

/**
 * Lista de empleados 
 * 
 */

//vardump($hr_employee_fines);

//$employee = new Employee();
//
//$employee->setEmployee($u_owner_id, $id);

include view("hr_employee_fines", "index");
