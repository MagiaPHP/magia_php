<?php

class Cv_ml extends Cv_motivation_letter {

    private $cellHeight = 6.5; // Altura de las celdas
    private $leftMargin = 50; // Margen izquierdo
    private $barHeight = 15; // Altura de la barra decorativa
    private $barWidth = 40; // Ancho de la barra decorativa
    private $barColor = [173, 216, 230]; // Color RGB de la barra decorativa (azul suave)

    public function __construct() {
        parent::__construct();
    }

    public function generatePDF($model = 1) {
        if ($model == 1) {
            $this->generatePDF_m1();
        } elseif ($model == 2) {
            $this->generatePDF_m2();
        } elseif ($model == 3) {
            $this->generatePDF_m3();
        } else {
            echo "Modelo no válido.";
        }
    }

    private function printSenderInfo($pdf) {
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getSender_name(), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getSender_address(), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding('Teléfono: ', 'ISO-8859-1', 'UTF-8') . $this->getSender_phone(), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding('Email: ', 'ISO-8859-1', 'UTF-8') . $this->getSender_email(), 0, 1);
    }

    private function printRecipientInfo($pdf) {
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getRecipient_name(), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getRecipient_position(), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getRecipient_company(), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getRecipient_address(), 'ISO-8859-1', 'UTF-8'), 0, 1);
    }

    private function drawBlackBar($pdf) {
        //$pdf->SetY(0); // Posicionar en la parte superior
        $pdf->SetFillColor($this->barColor[0], $this->barColor[1], $this->barColor[2]); // Color de la barra
        $pdf->Rect(0, 0, $this->barWidth, $pdf->GetPageHeight(), 'F'); // Dibuja la barra vertical
    }

    private function drawHeaderBar($pdf) {
        //$pdf->SetY(0); // Posicionar en la parte superior
        $pdf->SetFillColor($this->barColor[0], $this->barColor[1], $this->barColor[2]); // Color de la barra
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), $this->barHeight, 'F'); // Dibujar barra
    }

    public function generatePDF_m1() {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $this->drawBlackBar($pdf); // Dibuja la barra negra

        $this->printSenderInfo($pdf);

        $pdf->Ln($this->cellHeight); // Espacio para la fecha
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, $this->getLetter_date(), 0, 1);

        $pdf->Ln($this->cellHeight); // Espacio para los datos del destinatario
        $this->printRecipientInfo($pdf);

        $pdf->Ln($this->cellHeight); // Espacio antes del saludo
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getGreeting(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getIntroduction(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_experience(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_achievements(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getMotivation(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln($this->cellHeight); // Espacio para el cierre
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getClosing(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln($this->cellHeight); // Espacio para la despedida
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getFarewell(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(20); // Espacio para la firma
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getSignature(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Output('I', 'motivation_letter_' . $this->getId() . '.pdf');
    }

    public function generatePDF_m2() {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        $this->drawBlackBar($pdf); // Dibuja la barra negra

        $this->printSenderInfo($pdf);

        $pdf->Ln($this->cellHeight); // Espacio para la fecha
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, $this->getLetter_date(), 0, 1, 'R');

        $pdf->Ln(20); // Espacio para los datos del destinatario
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $this->printRecipientInfo($pdf);

        $pdf->Ln(20); // Espacio antes del saludo
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getGreeting(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getIntroduction(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_experience(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_achievements(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getMotivation(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln($this->cellHeight); // Espacio para el cierre
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getClosing(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(20); // Espacio para la despedida
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getFarewell(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(20); // Espacio para la firma
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, mb_convert_encoding($this->getSignature(), 'ISO-8859-1', 'UTF-8'), 0, 1);

        $pdf->SetDrawColor(50, 50, 50);
        $pdf->Line($this->leftMargin, $pdf->GetY(), $pdf->GetPageWidth() - $this->leftMargin, $pdf->GetY());

        $pdf->Output('I', 'motivation_letter_' . $this->getId() . '.pdf');
    }

    public function generatePDF_m3() {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $this->drawHeaderBar($pdf);

        $pdf->SetY($this->barHeight + 5); // Ajustar la posición vertical después de la barra
        $this->printSenderInfo($pdf);

        $pdf->Ln($this->cellHeight); // Espacio para la fecha
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->Cell(0, $this->cellHeight, $this->getLetter_date(), 0, 1);

        $pdf->Ln($this->cellHeight); // Espacio para los datos del destinatario
        $this->printRecipientInfo($pdf);

        $pdf->Ln($this->cellHeight); // Espacio antes del saludo
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getGreeting(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getIntroduction(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_experience(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getBody_achievements(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(5);
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getMotivation(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln($this->cellHeight); // Espacio para el cierre
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getClosing(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln($this->cellHeight); // Espacio para la despedida
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getFarewell(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Ln(20); // Espacio para la firma
        $pdf->SetX($this->leftMargin); // Establecer margen izquierdo
        $pdf->MultiCell(0, $this->cellHeight, mb_convert_encoding($this->getSignature(), 'ISO-8859-1', 'UTF-8'));

        $pdf->Output('I', 'motivation_letter_' . $this->getId() . '.pdf');
    }
}
