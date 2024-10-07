<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
$m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
$format = (isset($_REQUEST["format"]) && isset($_REQUEST["format"]) != "") ? clean($_REQUEST["format"]) : false;
$way = (isset($_REQUEST["way"]) && isset($_REQUEST["way"]) != "") ? clean($_REQUEST["way"]) : 'web';
$order_by = (isset($_REQUEST["order_by"]) && isset($_REQUEST["order_by"]) != "") ? clean($_REQUEST["order_by"]) : 'id';
$only_cancelled = (isset($_REQUEST["only_cancelled"]) && isset($_REQUEST["only_cancelled"]) != "") ? clean($_REQUEST["only_cancelled"]) : null;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

// si es por trimerstres
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    // pongo por trimestre
    $balance = balance_search_by_year_trimestre_status($year, $m, $only_cancelled, $order_by);
} else {
    // pongo por mes
    $balance = balance_search_by_year_month_status($year, $m, $only_cancelled, $order_by);
}



$i = 0;
foreach ($balance as $bal) {
//    // a cada linea
//    $balance = (($invoice['total'] + $invoice['tax'] ) - $invoice['advance']);
    $client_name = contacts_formated($bal['client_id']);
    $client_vat = contacts_field_id('tva', $bal['client_id']);

    $sub_total = $bal['sub_total'];
    $tax = $bal['tax'];
    $total = $bal['total'];

//    // remplazo punto por comas 
    $sub_total = str_replace('.', ',', $sub_total);
    $tax = str_replace('.', ',', $tax);
    $total = str_replace('.', ',', $total);

    $lignes[$i] = array(
        $bal['id'],
        $bal['client_id'],
        $client_name,
        $client_vat,
        $bal['expense_id'],
        $bal['invoice_id'],
        $bal['credit_note_id'],
        $bal['type'],
        $bal['account_number'],
        $sub_total,
        $tax,
        $total,
        $bal['ref'],
        $bal['description'],
        $bal['ce'],
        $bal['date'],
        $bal['date_registre'],
        $bal['code'],
        $bal['canceled'],
        $bal['canceled_code'],
    );
    $i++;
}



################################################################################
if (!$error) {

    switch ($format) {
        case 'pdf':
            include view("balance", "export_all_pdf");
            break;

        case 'csv':
            include view("balance", "export_all_csv");
            break;

        case 'export_all_pdf_1_p_page':
            include view("balance", "export_all_pdf_1_p_page");
            break;

        default:
            include view("balance", "export_all_pdf");
            break;
    }
} else {
    include view("home", "pageError");
}
