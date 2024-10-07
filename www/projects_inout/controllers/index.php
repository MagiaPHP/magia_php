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
    _options_push("config_projects_inout_order_col", $data, "projects_inout");
}
################################################################################
$projects_inout = null;

################################################################################
$pagination = new Pagination($page, projects_inout_list());
// puede hacer falta
//$pagination->setUrl($url);
$projects_inout = projects_inout_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$projects_inout = projects_inout_list(10, 5);


include view("projects_inout", "index");

if ($debug) {
    include "www/projects_inout/views/debug.php";
}