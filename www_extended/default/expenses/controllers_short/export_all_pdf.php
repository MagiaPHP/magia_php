<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$expenses = null;

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
$m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
$format = (isset($_REQUEST["format"]) && isset($_REQUEST["format"]) != "") ? clean($_REQUEST["format"]) : false;
$way = (isset($_REQUEST["way"]) && isset($_REQUEST["way"]) != "") ? clean($_REQUEST["way"]) : 'web';
$order_by = (isset($_REQUEST["order_by"]) && isset($_REQUEST["order_by"]) != "") ? clean($_REQUEST["order_by"]) : '1';
$status_array = (isset($_REQUEST["status"]) && isset($_REQUEST["status"]) != "") ? clean($_REQUEST["status"]) : null;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

// si es por trimerstres
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    // pongo por trimestre
    $expenses = expenses_search_by_year_trimestre_status($year, $m, $status_array, $order_by);
} else {
    // pongo por mes
    $expenses = expenses_search_by_year_month_status($year, $m, $status_array, $order_by);
}

$i = 0;
foreach ($expenses as $expense) {
    // a cada linea

    $balance = (($expense['total'] + $expense['tax'] ) - $expense['advance']);

    $provider_name = contacts_formated($expense['provider_id']);
    $provider_vat = contacts_field_id('tva', $expense['provider_id']);
    // remplazo punto por comas 
    $total = str_replace('.', ',', $expense['total']);
    $tax = str_replace('.', ',', $expense['tax']);
    $advance = str_replace('.', ',', $expense['advance']);
    $balance = str_replace('.', ',', $balance);

    $lignes[$i] = array(
        $expense['id'],
        $expense['invoice_number'],
        $expense['budget_id'],
        $expense['credit_note_id'],
        $expense['provider_id'],
        $provider_name,
        $provider_vat,
        $expense['seller_id'],
        $expense['clon_from_id'],
        $expense['title'],
//        $expense['addresses_billing'],
//        $expense['addresses_delivery'],
        null,
        null,
        $expense['date'],
        $expense['date_registre'],
        $expense['deadline'],
        $total,
        $tax,
        $advance,
        $balance,
        $expense['comments'],
        $expense['comments_private'],
        $expense['r1'],
        $expense['r2'],
        $expense['r3'],
        $expense['fc'],
        $expense['date_update'],
        $expense['days'],
        $expense['ce'],
        $expense['code'],
        $expense['type'],
        $expense['every'],
        $expense['times'],
        $expense['date_start'],
        $expense['date_end'],
        $expense['order_by'],
        $expense['status'],
        expenses_status_by_status($expense['status']),
    );
    $i++;
}


################################################################################
if (!$error) {

    switch ($format) {
        case 'pdf':
            include view("expenses", "export_all_pdf");
            break;

        case 'csv':
            include view("expenses", "export_all_csv");
            break;

        case 'export_all_pdf_1_p_page':
            include view("expenses", "export_all_pdf_1_p_page");
            break;

        default:
            include view("expenses", "export_all_pdf");
            break;
    }
} else {
    include view("home", "pageError");
}
