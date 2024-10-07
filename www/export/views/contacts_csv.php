<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=contacts.csv');

$output = fopen('php://output', 'w');

$contacts_lines = contacts_export();

$lignes = [];

$i = 1;
//
foreach ($contacts_lines as $contact) {
//
//    // SEGUN PEDIDO DE web
//    //****************************************
    $lignes[$i] = array(
        $i, // b
        $contact['id'], // b
        $contact['owner_id'], //c
        $contact['type'], //d
        $contact['title'], //e
        $contact['name'], //f
        $contact['lastname'], //g
        $contact['birthdate'], // N
        $contact['tva'],
        $contact['billing_method'],
        $contact['discounts'],
        $contact['code'],
        $contact['language'],
        $contact['order_by'],
        $contact['status'],
    );

    foreach (directory_names_list() as $key => $value) {
        array_push($lignes[$i], directory_list_by_contact_name($contact['id'], $value['name']));
    }


    $i++;
}
////$header_args1 = array(
////    "Create by", $u_id,
////    "Date creation", date("Y-m-d"),
////);
////$header_args2 = array(
////    "Fecha", "1200-enero-2022"
////);
//// SEGUN PEDIDO DE JIHLABO
////*******************************************
$header_args = array(
    '#',
    'Id',
    'owner_id',
    'type',
    'title',
    'name',
    'lastname',
    'birthdate',
    'tva',
    'billing_method',
    'discounts',
    'code',
    'language',
    'order_by',
    'status',
);

foreach (directory_names_list() as $key => $value) {
    array_push($header_args, $value['name']);
}

fputcsv($output, $header_args);

foreach ($lignes AS $data_item) {
    fputcsv($output, $data_item);
}
exit;

ob_end_clean();
