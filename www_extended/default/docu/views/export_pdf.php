<?php

/**
 * MagiaPHP 
 * file date creation: 2024-03-01 
 * Informations
 * Auteur : Aramis
 * Licence : FPDF
 * http://www.fpdf.org/fr/script/script41.php
 */
require("includes/fpdf185/fpdf.php");

// Crear instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage("P");

// Agregar el índice
$index = [];
$pageNumber = 1;

// Configuración de fuente y colores
$pdf->SetFont("Arial", "B", 16);
$pdf->SetFillColor(255, 200, 100);

// Título del documento
$pdf->Cell(0, 10, utf8_decode(_tr('Documentation')), 1, 1, 'C', 1);

// Configuración de la fuente para el índice
$pdf->SetFont("Arial", "", 12);

// Añadir índice
$pdf->Cell(0, 10, utf8_decode('Índice'), 0, 1, 'C');
$pdf->Ln(10); // Espacio entre título y contenido del índice

$pdf->SetFont("Arial", "", 10);

$controllersList = docu_list_controllers_by_lang($u_language);
foreach ($controllersList as $i => $docu_line) {
    $currentPage = $pdf->PageNo();
    $index[] = [
        'title' => utf8_decode(ucfirst($docu_line['controllers'])),
        'page' => $currentPage
    ];

    if ($i > 0) {
        $pdf->AddPage();
    }

    $pdf->SetFont("Arial", "B", 15);
    $pdf->Cell(0, 10, utf8_decode(ucfirst($docu_line['controllers'])), 'B', 1, 'C', 1);
    $pdf->SetFont("Arial", "", 10);

    $actionsList = docu_list_actions_by_controllers_and_lang($docu_line["controllers"], $u_language);
    foreach ($actionsList as $dlabc) {
        $pdf->SetTextColor(18, 10, 143);
        $pdf->Cell(20, 5, '', 'B', 0, 'L', 1);
        $pdf->Cell(0, 5, utf8_decode($dlabc['action']), 0, 1, 'L', 0);
        $pdf->SetTextColor(0, 0, 0);

        $blocksList = docu_blocs_search_by_docu_id($dlabc['id']);
        foreach ($blocksList as $dbsbdi) {
            $pdf->Cell(40, 5, $dbsbdi['bloc'], 'B', 0, 'R', 1);
            $pdf->SetFont("Arial", "B", 10);
            $pdf->Cell(0, 5, utf8_decode($dbsbdi['title']), 0, 1, 'L', 0);
            $pdf->SetFont("Arial", "", 10);

            $pdf->MultiCell(0, 5, utf8_decode($dbsbdi['post']), 1, 'L', 0);
        }
    }
}

// Volver a la primera página para agregar el índice
$pdf->PageNo();
$pdf->SetXY(10, 40);
$pdf->AddPage();

// Configuración del índice
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(0, 10, utf8_decode('Índice'), 0, 1, 'C');
$pdf->Ln(10); // Espacio entre título del índice y contenido

foreach ($index as $entry) {
    $pdf->Cell(0, 10, utf8_decode('Page') . ' ' . $entry['page'] . ' : ......................................... ' . utf8_decode($entry['title']), 0, 1, 'L');
}

// Generar el archivo PDF
$pdf->Output();
?>
