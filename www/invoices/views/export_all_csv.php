<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');

$output = fopen('php://output', 'w');

$header_args = array(
    'Invoice id',
    'Budget id',
    'Credit note id',
    'Client number',
    'Client name',
    'Client vat',
    'Invoice title',
    'Seller id',
    'Addresses billing',
    'Addresses delivery',
    'Date',
    'Date registre',
    'Date expiration',
    'Total',
    'Tax',
    'Advance',
    'Solde',
    'Comments',
    'Comments private',
    'R1',
    'R2',
    'R3',
    'Fc',
    'Date update',
    'Days',
    'ce',
    'Code',
    'Type',
    'Status code',
    'Status'
);

fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
