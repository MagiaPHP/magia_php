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
    _options_push("config_products_presentation_names_order_col", $data, "products_presentation_names");
}
################################################################################
$products_presentation_names = null;
    
################################################################################
$pagination = new Pagination($page, products_presentation_names_list());
// puede hacer falta
//$pagination->setUrl($url);
$products_presentation_names = products_presentation_names_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$products_presentation_names = products_presentation_names_list(10, 5);
    

include view("products_presentation_names", "index");  
    
if ($debug) {
    include "www/products_presentation_names/views/debug.php";
}