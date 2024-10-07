<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoices_id = (isset($_REQUEST["invoices_id"])) ? clean($_REQUEST["invoices_id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;
$resumen = (isset($_REQUEST["resumen"])) ? clean($_REQUEST["resumen"]) : false;

$error = array();

################################################################################

foreach ($invoices_id as $id) {

    if (!$id) {
        array_push($error, "ID Don't send");
    }
    if (!invoices_is_id($id)) {
        array_push($error, 'ID format error');
    }
    if (!invoices_field_id("id", $id)) {
        array_push($error, "Invoice id not exist");
    }
}


if (!$error) {

    foreach ($invoices_id as $id) {

        include pdf_template("invoice");
        $pdf = new PDF_INVOICE();
        $pdf->setPdfInvoice($id);
        $pdf->setDocModele(_options_option('doc_model'));

        $pdf->setDoc('invoices');
        $pdf->setLang($lang);
        $pdf->setCell_selected($cell_selected);

        $pdf->SetTitle("Coello.be");
        $pdf->SetAuthor("Robinson Coello <info@coello.be>");
        $pdf->SetCreator("Coello.be");
        $pdf->SetKeywords('invoice->exportJson()');
        $pdf->SetSubject("Invoice");
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->body();


        $invoices = invoices_details($id);
        $total = invoice_lines_totalHTVA($id);
        $tax = invoice_lines_totalTVA($id);
        invoices_update_total_tax($id, $total, $tax);

        $addresses_billing = json_decode($invoices['addresses_billing'], true);
        $addresses_delivery = json_decode($invoices['addresses_delivery'], true);
        //$invoice_qr_json = json_encode($invoice_qr);
//        if (_options_option("config_invoices_print_counter")) {
//            if (modules_field_module('status', 'audio')) {
//                //Facture 20220061
//                $pdf->doc_title(_trc("Invoice", $lang) . " " . invoices_numberf_to_print($id, 4));
//            } else {
//                //Facture 2022-61
//                $pdf->doc_title(_trc("Invoice", $lang) . " " . invoices_numberf_to_print($id));
//            }
//        } else {
//            // id en factura
//            $pdf->doc_title(_trc("Invoice", $lang) . " " . invoices_pdf_formated_id($id));
//        }


        //$pdf->Ln();

        //$pdf->addresses($addresses_billing, $addresses_delivery);
        //$pdf->body($invoices, $addresses_billing, $addresses_delivery);
    }

    // agrego al final un resumen de facturas impresas
    // agrego al final un resumen de facturas impresas
    // agrego al final un resumen de facturas impresas

    if ($resumen) {
        $pdf->AddPage();

        // titulo

        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(10, 10, _trc("Print summary"), 0, 1);

        $pdf->SetFontSize(8);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 5, _trc("#"), 1, 0);
        $pdf->Cell(15, 5, _trc("ID"), 1, 0);
        $pdf->Cell(20, 5, _trc("Invoice"), 1, 0);
        $pdf->Cell(20, 5, _trc("Date"), 1, 0);
        $pdf->Cell(60, 5, _trc("Company"), 1, 0);
        $pdf->Cell(20, 5, _trc("Total"), 1, 0);
        $pdf->Cell(45, 5, _trc("Status"), 1, 1);
        $pdf->SetFont('Arial', '', 8);

        $i = 1;
        foreach ($invoices_id as $id) {
            $pdf->SetFontSize(8);
            $pdf->Cell(10, 5, $i, 1, 0);
            $pdf->Cell(15, 5, $id, 1, 0);
            $pdf->Cell(20, 5, $i, 1, 0);
            $pdf->Cell(20, 5, invoices_field_id('date', $id), 1, 0);
            $pdf->Cell(60, 5, contacts_formated(invoices_field_id('client_id', $id)), 1, 0);
            $pdf->Cell(20, 5, moneda(invoices_field_id('total', $id) + invoices_field_id('tax', $id)), 1, 0, 'R');
            $pdf->Cell(45, 5, _trc(invoice_status_by_status(invoices_field_id('status', $id))), 1, 1, 'C');
            $i++;
        }
    }



    // saco la factura impresa
    $pdf->Output("Invoice_$id" . ".pdf", "I");

    include view("invoices", "export_pdf_multi");
} else {

    include view("home", "pageError");
}
