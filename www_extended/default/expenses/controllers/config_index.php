<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include 'www_extended/default/expenses/models/Expense.php';

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";

$preview = (isset($_GET["preview"]) && $_GET["preview"] != "" ) ? clean($_GET["preview"]) : false;
$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_expenses_order_col", $data, "expenses");
}
$order = expenses_order_by($order_col, $order_way);
//vardump($order); 
$order_way = $order['way'];
$order_col = $order['col'];
################################################################################
$expenses = null;

################################################################################
$pagination = new Pagination($page, expenses_list_full($order));
// puede hacer falta
//$pagination->setUrl($url);
$expenses = expenses_list_full($order, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$expenses = expenses_list(10, 5);

$checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true);

$expenses_db_col_list_from_table = expenses_db_col_list_from_table($c);

$after_col = array_search('tax', $expenses_db_col_list_from_table);

array_splice($expenses_db_col_list_from_table, $after_col + 1, 0, "tvac");

$expenses_db_col_list_from_table = expenses_db_col_list_from_table($c);

//Agrego a las columnas las de l directroy
$array_btn = array(
    "button_details",
    "button_pay",
    "button_edit",
    "button_print",
    "button_save",
);

foreach ($array_btn as $key => $button) {
    array_push($expenses_db_col_list_from_table, $button);
}

vardump($checked_array);

//
//
//
//
include view("expenses", "config_index");

if ($debug) {
    include "www/expenses/views/debug.php";
}