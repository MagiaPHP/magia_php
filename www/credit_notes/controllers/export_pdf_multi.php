<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$credit_notes_id = (($_REQUEST["credit_notes_id"])) ? ($_REQUEST["credit_notes_id"]) : false;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : $u_language;
$resumen = (isset($_REQUEST["resumen"])) ? clean($_REQUEST["resumen"]) : false;

//$headoffice_id = offices_headoffice_of_office(credit_notes_field_id("client_id", $id));
//$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
//// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
//
//$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
//$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;
//$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
//$addresses_billing = addresses_billing_by_contact_id($headoffice_id);
//$reciver_name = contacts_field_id("name", $reciver_id);
//$reciver_lastname = contacts_field_id("lastname", $reciver_id);
//$reciver_salutation = contacts_field_id("title", $reciver_id);
//$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];
//$message = nl2br($message);

$error = array();

################################################################################
foreach ($credit_notes_id as $id) {
    if (!$id) {
        array_push($error, "ID Don't send");
    }
    if (!is_id($id)) {
        array_push($error, 'ID format error');
    }
    if (!credit_notes_field_id("id", $id)) {
        array_push($error, "Budget id not exist");
    }
}
################################################################################
if (!$error) {


    include pdf_template("ndc");
    $doc_model = (_options_option("doc_model")) ? _options_option("doc_model") : 'default';

    $pdf = new NDC();
    $pdf->SetTitle("Coello.be");
    $pdf->SetAuthor("Robinson Coello <info@coello.be>");
    $pdf->SetCreator("Coello.be");
    $pdf->SetKeywords("Coello.be");
    $pdf->SetSubject("Credit note > $config_company_name");
    $pdf->AliasNbPages();

    foreach ($credit_notes_id as $id) {

        $pdf->AddPage();

        $credit_note = credit_notes_details($id);
//        $addresses_billing = json_decode($credit_note['addresses_billing'], true);
//        $addresses_delivery = json_decode($credit_note['addresses_delivery'], true);

        $addresses_billing = (is_json($credit_notes['addresses_billing'])) ? json_decode($credit_notes['addresses_billing'], true) : [];
        $addresses_delivery = (is_json($credit_notes['addresses_delivery'])) ? json_decode($credit_notes['addresses_delivery'], true) : [];

        if (modules_field_module('status', 'audio')) {
            //Facture 20220061
            $pdf->doc_title(_trc("Credit note", $lang) . " " . credit_notes_numberf_to_ptint($id, 4));
        } else {
            //Facture 2022-61
            $pdf->doc_title(_trc("Credit note", $lang) . ': ' . credit_notes_numberf($id));
        }
        //
        $pdf->addresses($addresses_billing, $addresses_delivery);
        $pdf->Ln();
        $pdf->body($credit_note);
        $pdf->comments($pdf->comments);
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
        $pdf->Cell(20, 5, _trc("Credit note"), 1, 0);
        $pdf->Cell(30, 5, _trc("Date"), 1, 0);
        $pdf->Cell(60, 5, _trc("Company"), 1, 0);
        $pdf->Cell(20, 5, _trc("Total"), 1, 0);
        $pdf->Cell(40, 5, _trc("Status"), 1, 1);
        $pdf->SetFont('Arial', '', 8);
        $i = 1;
        foreach ($credit_notes_id as $id) {
            $pdf->SetFontSize(8);
            $pdf->Cell(10, 5, $i, 1, 0);
            $pdf->Cell(15, 5, $id, 1, 0);
            $pdf->Cell(20, 5, $i, 1, 0);
            $pdf->Cell(30, 5, credit_notes_field_id('date_registre', $id), 1, 0);
            $pdf->Cell(60, 5, contacts_formated(credit_notes_field_id('client_id', $id)), 1, 0);
            $pdf->Cell(20, 5, moneda(credit_notes_field_id('total', $id) + credit_notes_field_id('tax', $id)), 1, 0, 'R');
            $pdf->Cell(40, 5, _trc(credit_notes_status_by_status(($credit_note['status']))), 1, 1, 'C');
            $i++;
        }
    }





    $pdf->Output("Credit_note_$id" . ".pdf", "I");

    include view("credit_notes", "export_pdf");
} else {

    include view("home", "pageError");
}
