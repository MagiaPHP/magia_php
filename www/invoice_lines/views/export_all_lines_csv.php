<?php

//
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');

$output = fopen('php://output', 'w');

$header_args1 = array(
    "Documento", "Factutas"
);

$header_args2 = array(
    "Fecha", "10-enero-2022"
);

$header_args = array(
    'id',
    'invoice_id',
    'budget_id',
    'code',
    'quantity',
    'description',
    'price',
    'discounts',
    'discounts_mode',
    'tax',
    'date_expiration',
    'order_by',
    'status'
);

fputcsv($output, $header_args1);
fputcsv($output, $header_args2);
fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
