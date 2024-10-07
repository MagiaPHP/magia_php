<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$invoices = null;

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
$m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
$format = (isset($_REQUEST["format"]) && isset($_REQUEST["format"]) != "") ? clean($_REQUEST["format"]) : false;
$way = (isset($_REQUEST["way"]) && isset($_REQUEST["way"]) != "") ? clean($_REQUEST["way"]) : 'web';
$order_by = (isset($_REQUEST["order_by"]) && isset($_REQUEST["order_by"]) != "") ? clean($_REQUEST["order_by"]) : '1';
$status_array = (isset($_REQUEST["status"]) && isset($_REQUEST["status"]) != "") ? ($_REQUEST["status"]) : null;
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

// si es por trimerstres
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    // pongo por trimestre
    $invoices = invoices_search_by_year_trimestre_status($year, $m, $status_array, $order_by);
} else {
    // pongo por mes
    $invoices = invoices_search_by_year_month_status($year, $m, $status_array, $order_by);
}

//vardump($status);

/**
 * 
  $i = 0;
  foreach ($invoices as $invoice) {
  // a cada linea
  $balance = (($invoice['total'] + $invoice['tax'] ) - $invoice['advance']);
  $client_name = contacts_formated($invoice['client_id']);
  $client_vat = contacts_field_id('tva', $invoice['client_id']);
  // remplazo punto por comas
  $total = str_replace('.', ',', $invoice['total']);
  $tax = str_replace('.', ',', $invoice['tax']);
  $advance = str_replace('.', ',', $invoice['advance']);
  $balance = str_replace('.', ',', $balance);

  $lignes[$i] = array(
  $invoice['id'],
  $invoice['budget_id'],
  $invoice['credit_note_id'],
  $invoice['client_id'],
  $client_name,
  $client_vat,
  $invoice['title'],
  $invoice['seller_id'],
  //        $invoice['addresses_billing'],
  //        $invoice['addresses_delivery'],
  null,
  null,
  $invoice['date'],
  $invoice['date_registre'],
  $invoice['date_expiration'],
  $total,
  $tax,
  $advance,
  $balance,
  $invoice['comments'],
  $invoice['comments_private'],
  $invoice['r1'],
  $invoice['r2'],
  $invoice['r3'],
  $invoice['fc'],
  $invoice['date_update'],
  $invoice['days'],
  $invoice['ce'],
  $invoice['code'],
  $invoice['type'],
  $invoice['status'],
  invoice_status_by_status($invoice['status']),
  );
  $i++;
  }
 */
################################################################################
if (!$error) {

    switch ($format) {
        case 'pdf':
            include view("invoices", "export_all_pdf");
            break;

        case 'csv':
            include view("invoices", "export_all_csv");
            break;

        case 'export_all_pdf_1_p_page':
            include view("invoices", "export_all_pdf_1_p_page");
            break;

        default:
            include view("invoices", "export_all_pdf");
            break;
    }
} else {
    include view("home", "pageError");
}
