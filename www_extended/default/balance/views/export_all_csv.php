<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');

$output = fopen('php://output', 'w');

$header_args = array(
    'Balance id',
    'Client number',
    'Client name',
    'Client vat',
    'Expense id',
    'Invoice id',
    'Credit note id',
    'Type',
    'Account number',
    'Sub Total',
    'Tax',
    'Total',
    'Ref',
    'Description',
    'ce',
    'Date',
    'Date registre',
    'Code',
    'Canceled',
    'Canceled code'
);

fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
