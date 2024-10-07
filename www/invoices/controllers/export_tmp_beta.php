<?php

api_export_invoice($id);

//// FACTUX
//$export['factux']['version'] = "beta";
//$export['factux']['date'] = "16-oct-2021";
//$export['factux']['info'] = "http://www.factux.be";
//$export['factux']['sender']["user"] = "syb";
//$export['factux']['sender']['vat'] = "BE123.456.789";
//$export['factux']['doc']['type'] = "invoices";
//$export['factux']['doc']['id'] = 170;
//$export['factux']['doc']['code'] = "4155487f5s4s55qq4";
//
//
//// el modelo que uso el cliente
//$export['factux']['doc_model'] = _options_option('doc_model');
//// CONTROL
//$export['factux']['control']['lines'] = 10;
////
////
////
//// EMPIEZO LA FACTURA
//// SENDER
//$export['invoice']['sender']['name'] = $config_company_name;
//$export['invoice']['sender']['vat'] = $config_company_tva;
//$export['invoice']['sender']['key_public'] = "llave-publica-sender";
//// Directory del sender
//foreach (directory_names_list() as $key => $directory) {
//    $export['invoice']['sender']['directory'][$directory['name']] = directory_search_data_by_contact_id($directory['name'], 1022)['data'];
//}
//// DIRECCION del sender
//$export['invoice']['sender']['addresses']['number'] = $config_company_a_number;
//$export['invoice']['sender']['addresses']['address'] = $config_company_a_address;
//$export['invoice']['sender']['addresses']['barrio'] = $config_company_a_barrio;
//$export['invoice']['sender']['addresses']['city'] = $config_company_a_city;
//$export['invoice']['sender']['addresses']['region'] = null;
//$export['invoice']['sender']['addresses']['country'] = $config_company_a_country;
//// INVOICE
//$export['invoice']['id'] = $invoices['id'];
//$export['invoice']['budget_id'] = $invoices['budget_id'];
//$export['invoice']['credit_note_id'] = $invoices['credit_note_id'];
//$export['invoice']['date'] = $invoices['date'];
//$export['invoice']['date_expiration'] = $invoices['date_expiration'];
//$export['invoice']['total'] = $invoices['total'];
//$export['invoice']['tax'] = $invoices['tax'];
//$export['invoice']['advance'] = $invoices['advance'];
//$export['invoice']['comments'] = $invoices['comments'];
//$export['invoice']['ce'] = $invoices['ce'];
//$export['invoice']['type'] = $invoices['type'];
//// RECIVER
//$export['invoice']['reciver']['title'] = contacts_field_id('title', $invoices['client_id']);
//$export['invoice']['reciver']['name'] = contacts_field_id('name', $invoices['client_id']);
//$export['invoice']['reciver']['lastname'] = contacts_field_id('lastname', $invoices['client_id']);
//$export['invoice']['reciver']['vat'] = contacts_field_id('tva', $invoices['client_id']);
//$export['invoice']['reciver']['key_public'] = "llave-publica-reciver";
//// Directorio del RECIVER
//foreach (directory_names_list() as $key => $directory) {
//    $export['invoice']['reciver']['directory'][$directory['name']] = directory_search_data_by_contact_id($directory['name'], $invoices['client_id'])['data'];
//}
//// Direcciones del reciver sacadas de la factura
//$ba = json_decode($invoices['addresses_billing'], true);
//$da = json_decode($invoices['addresses_delivery'], true);
//// BILLING
//$export['invoice']['reciver']['addresses']['billing']['number'] = $ba['number'];
//$export['invoice']['reciver']['addresses']['billing']['address'] = $ba['address'];
//$export['invoice']['reciver']['addresses']['billing']['barrio'] = $ba['barrio'];
//$export['invoice']['reciver']['addresses']['billing']['city'] = $ba['city'];
//$export['invoice']['reciver']['addresses']['billing']['region'] = $ba['region'];
//$export['invoice']['reciver']['addresses']['billing']['country'] = $ba['country'];
//// DELIVERY
//$export['invoice']['reciver']['addresses']['delivery']['number'] = $ba['number'];
//$export['invoice']['reciver']['addresses']['delivery']['address'] = $ba['address'];
//$export['invoice']['reciver']['addresses']['delivery']['barrio'] = $ba['barrio'];
//$export['invoice']['reciver']['addresses']['delivery']['city'] = $ba['city'];
//$export['invoice']['reciver']['addresses']['delivery']['region'] = $ba['region'];
//$export['invoice']['reciver']['addresses']['delivery']['country'] = $ba['country'];
//// Contacto del reciver
//$export['invoice']['reciver']['contact']['title'] = contacts_field_id('title', $invoices['client_id']);
//$export['invoice']['reciver']['contact']['name'] = contacts_field_id('name', $invoices['client_id']);
//$export['invoice']['reciver']['contact']['lastname'] = contacts_field_id('lastname', $invoices['client_id']);
//$export['invoice']['reciver']['contact']['directory'] = array();
//// Directorio del reciver
//foreach (directory_names_list() as $key => $directory) {
//    $export['invoice']['reciver']['contact']['directory'][$directory['name']] = directory_search_data_by_contact_id($directory['name'], $invoices['client_id'])['data'];
//}
//// INVOICE LINES
//$i = 1;
//foreach (invoice_lines_list_by_invoice_id($invoices['id']) as $key => $line) {
//    $export['invoice']['lines'][$i]['invoice_id'] = $line['invoice_id'];
//    $export['invoice']['lines'][$i]['budget_id'] = $line['budget_id'];
//    $export['invoice']['lines'][$i]['code'] = $line['code'];
//    $export['invoice']['lines'][$i]['quantity'] = $line['quantity'];
//    $export['invoice']['lines'][$i]['description'] = $line['description'];
//    $export['invoice']['lines'][$i]['price'] = $line['price'];
//    $export['invoice']['lines'][$i]['discounts'] = $line['discounts'];
//    $export['invoice']['lines'][$i]['discounts_mode'] = $line['discounts_mode'];
//    $export['invoice']['lines'][$i]['tax'] = $line['tax'];
//    $export['invoice']['lines'][$i]['order_by'] = $line['order_by'];
//    $i++;
//}
//
//// FACTUX CONTINUACION
//$export['factux']['control']['crc32'] = crc32(json_encode($export));
//vardump($export['factux']['control']['crc32']);
?>