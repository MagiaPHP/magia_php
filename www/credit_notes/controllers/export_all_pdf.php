<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$credit_notes = null;

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
$m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
$format = (isset($_REQUEST["format"]) && isset($_REQUEST["format"]) != "") ? clean($_REQUEST["format"]) : false;
$way = (isset($_REQUEST["way"]) && isset($_REQUEST["way"]) != "") ? clean($_REQUEST["way"]) : 'web';
$status_array = (isset($_REQUEST["status"]) && isset($_REQUEST["status"]) != "") ? clean($_REQUEST["status"]) : null;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : $u_language;

// si es por trimerstres
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    // pongo por trimestre
    $credit_notes = credit_notes_search_by_year_trimestre_status($year, $m, $status_array);
} else {
    // pongo por mes
    $credit_notes = credit_notes_search_by_year_month($year, $m, $status_array);
}

$i = 0;
foreach ($credit_notes as $credit_note) {
    // a cada linea

    $returned = (($credit_note['total'] + $credit_note['tax'] ) - $credit_note['returned']);

    $client_name = contacts_formated($credit_note['client_id']);
    $client_vat = contacts_field_id('tva', $credit_note['client_id']);
    // remplazo punto por comas 
    $total = str_replace('.', ',', $credit_note['total']);
    $tax = str_replace('.', ',', $credit_note['tax']);
    $tax = str_replace('.', ',', $credit_note['tax']);
    $returned = str_replace('.', ',', $returned);

    $lignes[$i] = array(
        $credit_note['id'],
        $credit_note['invoice_id'],
        $credit_note['client_id'],
        $client_name,
        $client_vat,
//        $credit_note['addresses_billing'],
//        $credit_note['addresses_delivery'],
        null,
        null,
        $credit_note['date_registre'],
        $total,
        $tax,
        $returned,
        $credit_note['comments'],
        $credit_note['code'],
        $credit_note['status'],
        credit_notes_status_by_status($credit_note['status']),
    );
    $i++;
}


################################################################################
if (!$error) {

    switch ($format) {
        case 'pdf':
            include view("credit_notes", "export_all_pdf");
            break;

        case 'csv':
            include view("credit_notes", "export_all_csv");
            break;

        case 'export_all_pdf_1_p_page':
            include view("credit_notes", "export_all_pdf_1_p_page");
            break;

        default:
            include view("credit_notes", "export_all_pdf");
            break;
    }
} else {
    include view("home", "pageError");
}
