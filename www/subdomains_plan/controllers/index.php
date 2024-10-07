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
    _options_push("config_subdomains_plan_order_col", $data, "subdomains_plan");
}
################################################################################
$subdomains_plan = null;

################################################################################
$pagination = new Pagination($page, subdomains_plan_list());
// puede hacer falta
//$pagination->setUrl($url);
$subdomains_plan = subdomains_plan_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$subdomains_plan = subdomains_plan_list(10, 5);


include view("subdomains_plan", "index");

if ($debug) {
    include "www/subdomains_plan/views/debug.php";
}