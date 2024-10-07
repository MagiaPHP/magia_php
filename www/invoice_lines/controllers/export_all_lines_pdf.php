<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$invoices_lines = null;

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
$m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
$format = (isset($_REQUEST["format"]) && isset($_REQUEST["format"]) != "") ? clean($_REQUEST["format"]) : false;

// si es por trimerstres
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    // pongo por trimestre
    $invoices_lines = invoices_search_by_year_trimestre($year, $m);
} else {
    // pongo por mes
    $invoices_lines = invoice_lines_search_by_year_month($year, $m);
}

$i = 0;

foreach ($invoices_lines as $lines) {

    $lignes[$i] = array(
        $lines['id'],
        $lines['invoice_id'],
        $lines['budget_id'],
        $lines['code'],
        $lines['quantity'],
        $lines['description'],
        $lines['price'],
        $lines['discounts'],
        $lines['discounts_mode'],
        $lines['tax'],
        $lines['order_by'],
        $lines['status']
    );
    $i++;
}

################################################################################
if (!$error) {

    switch ($format) {
//        case 'pdf':
//            include view("invoices", "export_all_pdf");
//            break;

        case 'csv':
            include view("invoice_lines", "export_all_lines_csv");
            break;

//        case 'export_all_pdf_1_p_page':
//            include view("invoices", "export_all_pdf_1_p_page");
//            break;
//        
//        default:
//            include view("invoices", "export_all_pdf");
//            break;
    }
} else {
    include view("home", "pageError");
}
