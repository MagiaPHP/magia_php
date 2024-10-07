<?php

//
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=invoice_lines.csv');

$output = fopen('php://output', 'w');

//$header_args1 = array(
//    "Create by", $u_id,
//    "Date creation", date("Y-m-d"),
//);
//
//$header_args2 = array(
//    "Fecha", "1200-enero-2022"
//);
// SEGUN PEDIDO DE JIHLABO
//*******************************************
$header_args = array(
    'Date document (3)', //A
    'Numero document (5)', //
    'Numero client (1)',
    'Nom commercial',
    'Numero d article',
    'Description de l article',
    'Quantite', // G
    'Price', // H
    'Total', // I
    'Reduction %', // J
    'Reduction valeur', // J
    'Htva', // J
    'Tax %', // J
    'Tax valeur', // J
    'Tvac', // J    
    'Commune', // N 
    'Rue et numero', // Q
    'nom bureau' // 
);
//********************************************
//fputcsv($output, $header_args1);
//fputcsv($output, $header_args2);
fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
