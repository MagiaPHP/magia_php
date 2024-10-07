<?php

/**/
include pdf_template("order");

// Instanciation de la classe dérivée
$pdf = new PDF();

$pdf->setDate($pdf_order['date']);

$pdf->SetAuthor("Coello.be");
$pdf->SetTitle("Order-$pdf_order[id]");
$pdf->setId($pdf_order['id']);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->cell_QR();

$pdf->cell_empresa(
        $pdf_order['id']
);
$pdf->cell_client($client);

$pdf->cell_patient($patient);
//$pdf->cell_client();
//$pdf->cell_address_delivery();
$pdf->cell_items(
        $pdf_items_l,
        $pdf_items_r,
        $pdf_items_s
);
$pdf->Ln();
//$pdf->cell_items_rigth();
//$pdf->cell_extras();
$pdf->cell_comments();

$pdf->ln();
$pdf->remake_motifs($pdf_order['id']);

$pdf->cell_resumen($pdf_order_side);

$pdf->Output();
