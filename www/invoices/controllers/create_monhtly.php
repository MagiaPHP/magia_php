<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// saco el mes anterior 
$month_anterior = magia_dates_get_month_from_date(magia_dates_remove_month(date("Y") . "-" . date("m") . "-1", 1));

// si no se envia, se coje por defecto el mes actual asi que el año 
$year = (isset($_REQUEST["year"]) && $_REQUEST["year"] != "" ) ? clean($_REQUEST["year"]) : date("Y");
// si no e manda mes, se pone el mes anterior
$month = (isset($_REQUEST["month"]) && $_REQUEST["month"] != "" ) ? clean($_REQUEST["month"]) : $month_anterior;

$error = array();

// saco la lista de empresas que tienen presupuesto no facturados el mes de x 
// *****************************************
//$totalItems = count(invoices_list());
//include controller("invoices", "pagination");
// ****************************************
//$invoices = invoices_list($limit, $start);
################################################################################
if (!$error) {
    include view("invoices", 'create_monhtly');
} else {
    include view("home", 'pageError');
}


