<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Crea un factura mensual con los presupuestos 
 * Verifica que:
 * los presupuestos pertenescan a un mismo cliente 
 * los presupuestos esten en el status adecuado
 * 
 * 
 * Proceso: 
 * 
 * Hago un bucle con la lista de presupuestos para agregarles en una sola factura 
 * 
 * 
 * 
 * 
 */
$m = (($_GET["m"]) != "" ) ? intval(clean($_GET["m"])) : null;
$y = (($_GET["y"]) != "" ) ? intval(clean($_GET["y"])) : null;
$client_id = (($_GET["client_id"]) != "" ) ? clean($_GET["client_id"]) : null;

$error = array();
//
//
//
//
//
//
//
//
//
//
//################################################################################
//if ( $m <1 || $m > 12 || ! is_int($m) ) {
//    array_push($error , '$m format error') ;
//}
//
//if ( $y < $config_start_year || $y > date('Y') || ! is_int($y) ) {
//    array_push($error , '$y error') ;
//}
//
//if ( ! $client_id || ! is_id($client_id)  ) {
//    array_push($error , 'client_id error') ;
//}
//
//################################################################################
//
//// busco los presupuestos: 
////  del mes indicado
//// del cliente indicado 
//// y que no tengan facturas
//// los muestro en una lista 
//
################################################################################
################################################################################
if (!$error) {

    include view("budgets", "invoice_create_mensual");

    // header("Location: index.php?c=invoices&a=edit&id=$lastInsertId") ;
} else {

    include view("home", "pageError");
}


