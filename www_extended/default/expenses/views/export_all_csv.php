<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Export_Achat.csv');

$output = fopen('php://output', 'w');

$header_args = array(
    'Expense id',
    'Invoice number',
    'Budget id',
    'Credit note id',
    'Provider number',
    'Provider name',
    'Provider vat',
    'Seller id',
    'Clon from id',
    'Title',
    'Addresses billing',
    'Addresses delivery',
    'Date',
    'Date registre',
    'Deadline',
    'Total (HTVA)',
    'Tax (TVA)',
    'Advance',
    'Balance',
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
    'Every',
    'Times',
    'Date start',
    'Date end',
    'Order by',
    'Status code',
    'Status'
);

fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
