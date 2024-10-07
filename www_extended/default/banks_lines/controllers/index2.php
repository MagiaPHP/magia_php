<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_banks_lines_order_col", $data, "banks_lines");
}
################################################################################
$banks_lines = null;

################################################################################
$pagination = new Pagination($page, banks_lines_search_by('status_code', 1));
// puede hacer falta
//$pagination->setUrl($url);
$banks_lines = banks_lines_search_by('status_code', 1, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$banks_lines = banks_lines_list(10, 5);


include view("banks_lines", "index");

if ($debug) {
    include "www/banks_lines/views/debug.php";
}