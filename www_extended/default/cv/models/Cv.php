<?php

//require('fpdf/fpdf.php'); // Asegúrate de tener FPDF en la ruta correcta

class Mi_cv extends Cv {

    public function __construct() {
        parent::__construct();
    }

    public function generateCvPdf() {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Variable para la altura de las celdas (configurable)
        $cellHeight = 6;
        $marginLeft = 45;
        $headerHeight = 60; // Altura del rectángulo de color gris

        // Función para corregir texto con acentos y caracteres especiales
        function fixTextEncoding($text) {
            return mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
        }

        // Dibujar rectángulo de color gris para los datos personales
        $pdf->SetFillColor(200,200,200); // Color
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), $headerHeight, 'F'); // Dibuja el rectángulo
        // Escribir los datos personales sobre el rectángulo
        $pdf->SetXY($marginLeft, 10); // Ajusta la posición del texto
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(50,50,50); // Color gris oscuro para el texto
        $pdf->Cell(0, $cellHeight, fixTextEncoding($this->getFirst_name() . ' ' . $this->getLast_name()), 0, 1, 'R');
        
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(0, $cellHeight, fixTextEncoding('Tél: ' . $this->getPhone_number()), 0, 1, 'R');
        $pdf->Cell(0, $cellHeight, fixTextEncoding('Email: ' . $this->getEmail()), 0, 1, 'R');

        $pdf->Cell(0, $cellHeight, fixTextEncoding($this->getAddress()), 0, 1, 'L');
        $pdf->Cell(0, $cellHeight, fixTextEncoding($this->getCity() . ', ' . $this->getPostal_code()), 0, 1, 'L');

        // Datos personales
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, $cellHeight, fixTextEncoding('Date de naissance: ' . $this->getBirth_date()), 0, 1);
        $pdf->Cell(0, $cellHeight, fixTextEncoding('Permis de conduire: ' . $this->getDriver_license()), 0, 1);
        $pdf->Ln(10);

        // Objetivo Profesional
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(51, 51, 51); // Color gris oscuro para el texto
        $pdf->SetX(20);
        $pdf->Cell(0, $cellHeight, fixTextEncoding('Curriculum Vitae'), 0, 1, 'C');
        $pdf->Ln(10);
        
        // Objectif Professionnel
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(51, 51, 51); // Color gris oscuro para el texto
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight, fixTextEncoding('Objectif Professionnel'), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetX($marginLeft);
        $pdf->MultiCell(0, $cellHeight, fixTextEncoding($this->getProfessional_goal()));
        $pdf->Ln(10);

        // Expérience Professionnelle
        $pdf->SetFont('Arial', 'B', 16);  // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Expérience Professionnelle'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de experiencia laboral
        $getWork_experience = json_decode($this->getWork_experience(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getWork_experience)) {
            foreach ($getWork_experience['positions'] as $exp) {
                // Poste et Entreprise
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding($exp['position'] . ' - ' . $exp['company']), 0, 1);

                // Type de Contrat
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding('Type de contrat: ' . $exp['contract_type']), 0, 1);

                // Dates de Début et de Fin
                $endDate = $exp['end_date'] ? $exp['end_date'] : 'Présent';
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding('De: ' . $exp['start_date'] . ' À: ' . $endDate), 0, 1);

                // Responsabilités
                $pdf->SetFont('Arial', 'I', 12); // Cursiva para diferenciar las responsabilidades
                $pdf->SetX($marginLeft);
                $pdf->MultiCell(0, $cellHeight, fixTextEncoding('Responsabilités: ' . implode(', ', $exp['responsibilities'])));

                // Añadir una línea divisoria entre trabajos
                $pdf->Ln(2); // Pequeño espacio
                $pdf->SetDrawColor(192, 192, 192); // Color gris para la línea divisoria
                $pdf->Line($marginLeft, $pdf->GetY(), $pdf->GetPageWidth() - $marginLeft, $pdf->GetY()); // Dibujar la línea
                $pdf->Ln(6); // Espacio extra después de la línea
            }
        }

        // Ajouter un espace supplémentaire entre les sections
        // Formation
        $pdf->SetFont('Arial', 'B', 16); // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Formation'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de formación
        $getEducation = json_decode($this->getEducation(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getEducation)) {
            foreach ($getEducation as $edu) {
                // Titre du cours et Institution
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding($edu['degree'] . ' - ' . $edu['institution']), 0, 1, 'L'); // Alineado a la izquierda
                // Dates
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding('De: ' . $edu['start_date'] . ' À: ' . $edu['end_date']), 0, 1, 'L'); // Alineado a la izquierda
                // Détails supplémentaires
                if (!empty($edu['details'])) {
                    $pdf->SetX($marginLeft);
                    $pdf->MultiCell(0, $cellHeight, fixTextEncoding($edu['details']));
                }

                // Ajouter une ligne de séparation entre les entrées de formation
                $pdf->Ln(2); // Pequeño espacio
                $pdf->SetDrawColor(192, 192, 192); // Color gris para la línea divisoria
                $pdf->Line($marginLeft, $pdf->GetY(), $pdf->GetPageWidth() - $marginLeft, $pdf->GetY()); // Dibujar la línea
                $pdf->Ln(6); // Espacio extra después de la línea
            }
        }

        // Ajouter un espace supplémentaire entre les sections
        $pdf->Ln(10);

        // Technologies
        $pdf->SetFont('Arial', 'B', 16); // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Technologies'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de tecnologías
        $getTechnologies = json_decode($this->getTechnologies(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getTechnologies)) {
            // Configuración de estilo para las tecnologías
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetX($marginLeft);

            // Crear una lista de tecnologías
            $technologyList = implode(', ', $getTechnologies);
            $pdf->MultiCell(0, $cellHeight, fixTextEncoding($technologyList));
        }

        // Añadir un espacio adicional entre secciones
        $pdf->Ln(10);

        // Compétences
        $pdf->SetFont('Arial', 'B', 16); // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Compétences'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de habilidades
        $getSkills = json_decode($this->getSkills(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getSkills)) {
            // Configuración de estilo para las habilidades
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetX($marginLeft);

            // Crear una lista de habilidades
            $skillsList = implode(', ', $getSkills);
            $pdf->MultiCell(0, $cellHeight, fixTextEncoding($skillsList));
        }

        // Añadir un espacio adicional entre secciones
        $pdf->Ln(10);

        // Projets
        $pdf->SetFont('Arial', 'B', 16); // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Projets'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de proyectos
        $getProjects = json_decode($this->getProjects(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getProjects)) {
            foreach ($getProjects as $project) {
                // Nom du Projet
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding($project['project_name']), 0, 1);

                // Technologies Utilisées
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding('Technologies: ' . implode(', ', $project['technologies'])), 0, 1);

                // Description
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetX($marginLeft);
                $pdf->MultiCell(0, $cellHeight, fixTextEncoding('Description: ' . $project['description']));

                // Ajouter une ligne de séparation entre les projets
                $pdf->Ln(2); // Pequeño espacio
                $pdf->SetDrawColor(192, 192, 192); // Color gris para la línea divisoria
                $pdf->Line($marginLeft, $pdf->GetY(), $pdf->GetPageWidth() - $marginLeft, $pdf->GetY()); // Dibujar la línea
                $pdf->Ln(6); // Espacio extra después de la línea
            }
        }

        // Ajouter un espace supplémentaire entre les sections
        $pdf->Ln(10);

        // Langues
        $pdf->SetFont('Arial', 'B', 16); // Tamaño más grande para el título
        $pdf->SetX($marginLeft);
        $pdf->Cell(0, $cellHeight + 2, fixTextEncoding('Langues'), 0, 1, 'L'); // Alineado a la izquierda
        $pdf->Ln(5); // Espacio debajo del título
        // Decodificar el JSON de idiomas
        $getLanguages = json_decode($this->getLanguages(), true);

        // Si es un array válido, lo procesamos
        if (is_array($getLanguages)) {
            foreach ($getLanguages as $language) {
                // Langue et Niveau
                $pdf->SetFont('Arial', '', 12);
                $pdf->SetX($marginLeft);
                $pdf->Cell(0, $cellHeight, fixTextEncoding($language['language'] . ': ' . $language['level']), 0, 1);
            }
        }

        // Ajouter un espace supplémentaire entre les sections
        $pdf->Ln(10);

        // Guardar PDF
        $pdf->Output('I', 'cv_' . $this->getFirst_name() . '_' . $this->getLast_name() . '.pdf');
    }
}
