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
    _options_push("config_services_unites_order_col", $data, "services_unites");
}
################################################################################
$services_unites = null;

################################################################################
$pagination = new Pagination($page, services_unites_list());
// puede hacer falta
//$pagination->setUrl($url);
$services_unites = services_unites_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$services_unites = services_unites_list(10, 5);


include view("services_unites", "index");

if ($debug) {
    include "www/services_unites/views/debug.php";
}