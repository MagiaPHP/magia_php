<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : null;
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : null;
$error = array();





$banks_lines = null;

################################################################################
//
include "order_by_col_way.php";
################################################################################

$pagination = new Pagination($page, banks_lines_full($order));
// puede hacer falta
//$pagination->setUrl($url);
$banks_lines = banks_lines_full($order, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$banks_lines = banks_lines_list(10, 5);


include view("banks_lines", "index");

if ($debug) {
    include "www/banks_lines/views/debug.php";
}