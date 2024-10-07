<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// id del budget
$budgets_id = (isset($_REQUEST["budgets_id"])) ? ($_REQUEST["budgets_id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

//// Typo no se que es
//$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
////
//$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
//
//$headoffice_id = offices_headoffice_of_office(budgets_field_id("client_id", $id));

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;
$resumen = (isset($_REQUEST["resumen"])) ? clean($_REQUEST["resumen"]) : false;

$addresses_billing = addresses_billing_by_contact_id($headoffice_id);

$error = array();
################################################################################
foreach ($budgets_id as $id) {
    if (!$id) {
        array_push($error, "ID Don't send");
    }
    if (!is_id($id)) {
        array_push($error, 'ID format error');
    }
    if (!budgets_field_id("id", $id)) {
        array_push($error, "Budget id not exist");
    }
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    include pdf_template("budget");
    $doc_model = (_options_option("doc_model")) ? _options_option("doc_model") : 'default';
    $pdf = new BUDGET();

    $pdf->SetTitle("Coello.be");
    $pdf->SetAuthor("Robinson Coello <info@coello.be>");
    $pdf->SetCreator("Coello.be");
    $pdf->SetKeywords("Coello.be");
    $pdf->SetSubject("Budget");
    $pdf->AliasNbPages();

    foreach ($budgets_id as $id) {

        $pdf->AddPage();

        $budget = budgets_details($id);
        $addresses_billing = json_decode($budget['addresses_billing'], true);
        $addresses_delivery = json_decode($budget['addresses_delivery'], true);

        $doc_title = (modules_field_module('status', 'audio')) ? _trc("Delivery note", $lang) : _trc("Budget", $lang);
        $pdf->doc_title(($doc_title) . ': ' . $id);
//        $pdf->addresses($addresses_billing, $addresses_delivery);
        $pdf->Ln();
        $pdf->body($budget);
        $pdf->tax($budget);
    }


    if ($resumen) {
        $pdf->AddPage();

        // titulo

        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(10, 10, _trc("Print summary"), 0, 1);

        $pdf->SetFontSize(8);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 5, _trc("#"), 1, 0);
        $pdf->Cell(15, 5, _trc("ID"), 1, 0);
        $pdf->Cell(20, 5, _trc("Budget"), 1, 0);
        $pdf->Cell(20, 5, _trc("Date"), 1, 0);
        $pdf->Cell(60, 5, _trc("Company"), 1, 0);
        $pdf->Cell(20, 5, _trc("Total"), 1, 0);
        $pdf->Cell(45, 5, _trc("Status"), 1, 1);
        $pdf->SetFont('Arial', '', 8);

        $i = 1;
        foreach ($budgets_id as $id) {
            $pdf->SetFontSize(8);
            $pdf->Cell(10, 5, $i, 1, 0);
            $pdf->Cell(15, 5, $id, 1, 0);
            $pdf->Cell(20, 5, $i, 1, 0);
            $pdf->Cell(20, 5, budgets_field_id('date', $id), 1, 0);
            $pdf->Cell(60, 5, contacts_formated(budgets_field_id('client_id', $id)), 1, 0);
            $pdf->Cell(20, 5, moneda(budgets_field_id('total', $id) + budgets_field_id('tax', $id)), 1, 0, 'R');
            $pdf->Cell(45, 5, _trc(budget_status_by_status(budgets_field_id('status', $id))), 1, 1, 'C');
            $i++;
        }
    }




    $pdf->Output("Budget_$id" . ".pdf", "I");

    include view("budgets", "export_pdf_multi");
} else {

    include view("home", "pageError");
}