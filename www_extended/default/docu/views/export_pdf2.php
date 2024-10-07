<?php

# MagiaPHP 
# file date creation: 2024-03-01 
/**
  Informations
  Auteur : Aramis
  Licence : FPDF
 * http://www.fpdf.org/fr/script/script41.php
 * 
 */
?>
<?php

require("includes/fpdf185/fpdf.php");
//require("includes/fpdf185/html2pdf.php");
//$pdf = new PDF_HTML();
$pdf = new FPDF();
$pdf->AddPage("P");

$pdf->SetFont("Arial", "B", 16);
$pdf->SetFillColor(255, 200, 100);

$pdf->Cell(0, 10, utf8_decode(_tr('Documentation')), 1, 1, 'C', 1);

$pdf->SetFont("Arial", "", 10);

$i = 1;
foreach (docu_list_controllers_by_lang($u_language) as $key => $docu_line) {
    $pdf->Cell(
            40, // w
            5, // h
//            pdf_tr($docu_line['controllers'], $u_language), // txt
            $i++ . " - " . utf8_decode(($docu_line['controllers'])), // txt
            1, // border
            1, // ln next line
            'L', // align
            0 // filll
    );
}

/**
 * Espacion
 */
$pdf->Cell(
        0, // w
        5, // h
        "", // txt
        0, // border
        1, // ln next line
        'L', // align
        0 // filll
);

################################################################################
################################################################################
################################################################################
################################################################################

$controllers = null;

foreach (docu_list_controllers_by_lang($u_language) as $key => $docu_line) {

    if ($controllers !== $docu_line['controllers']) {
        // add page
        $pdf->AddPage();
        // asigno la nueva action 
        $controllers = $docu_line['controllers'];
    }




    $pdf->SetFont("Arial", "B", 15);

    $pdf->Cell(
            0, // w
            10, // h
            utf8_decode(_tr(ucfirst($docu_line['controllers']))), // txt
            'B', // border
            1, // ln next line
            'C', // align
            1 // filll
    );

    // RESET
    $pdf->SetFont("Arial", "", 10);

    $action = null;
    foreach (docu_list_actions_by_controllers_and_lang($docu_line["controllers"], $u_language) as $key => $dlabc) {


//        if ($action !== $dlabc['action']) {
//            // add page
////            $pdf->AddPage();
//            // asigno la nueva action 
//            $action = $dlabc['action'];
//        }
        // ESPACIO--------------------------------------------------------------
        $pdf->Cell(
                20, // w
                5, // h
//                pdf_tr($dlabc['controllers']) . ' : ' . $dlabc['action'], // txt
                '',
                'B', // border
                0, // 0=D, 1=nueva, 2=abajo,  ln next line
                'L', // align
                1 // filll
        );

        $pdf->SetTextColor(18, 10, 143);
        $pdf->Cell(
                0, // w
                5, // h
//                pdf_tr($dlabc['controllers']) . ' : ' . $dlabc['action'], // txt
                utf8_decode($dlabc['action']), // txt
                0, // border
                1, // 0=D, 1=nueva, 2=abajo, 
                'L', // align
                0 // filll
        );
        $pdf->SetTextColor(0, 0, 0);

        foreach (docu_blocs_search_by_docu_id($dlabc['id']) as $key => $dbsbdi) {


            // ESPACIO--------------------------------------------------------------
            $pdf->Cell(
                    40, // w
                    5, // h
                    $dbsbdi['bloc'],
                    'B', // border
                    0, // 0=D, 1=nueva, 2=abajo,  ln next line
                    'R', // align
                    1 // filll
            );

            $pdf->SetFont("Arial", "B", 10);

            $pdf->Cell(
                    0, // w
                    5, // h
                    utf8_decode($dbsbdi['title']), // txt
                    0, // border
                    2, // 0=Droit, 1=nueva, 2=abajo
                    'L', // align
                    0 // filll
            );
            $pdf->SetFont("Arial", "", 10);

//            // ESPACIO--------------------------------------------------------------
//            $pdf->Cell(
//                    40, // w
//                    5, // h
////                pdf_tr($dlabc['controllers']) . ' : ' . $dlabc['action'], // txt
//                    '',
//                    0, // border
//                    2, // 0=D, 1=nueva, 2=abajo,  ln next line
//                    'L', // align
//                    0 // filll
//            );
//            $pdf->WriteHTML(utf8_decode($dbsbdi['post']));

            $pdf->MultiCell(
                    0, //w
                    5, // h
                    utf8_decode($dbsbdi['post']), // $txt
                    1, // border
                    'L  ', // align
                    0 // fill 
            );
//            
//            
//            
            // ESPACIO--------------------------------------------------------------
            $pdf->Cell(
                    0, // w
                    5, // h
//                pdf_tr($dlabc['controllers']) . ' : ' . $dlabc['action'], // txt
                    '',
                    0, // border
                    1, // 0=D, 1=nueva, 2=abajo,  ln next line
                    'C', // align
                    0 // filll
            );

//            
        }
    }
}


// data:image/jpeg;base64,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


$pdf->SetFont("Arial", "", 10);

$write_by = "Write by: Angelica Coello S.
    
Last update: 2024


    ";

$pdf->MultiCell(0, 5, $write_by, 1, 'L', 0);
//$pdf->Cell(40, 10, "Write");



$pdf->Output();
