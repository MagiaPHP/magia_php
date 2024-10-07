<?php

//require('admin/translater.php');
require "includes/phpqrcode/qrlib.php";
require('includes/fpdf/fpdf.php');

class PDF extends FPDF {

    public $id;
    public $via;
    public $date;
    public $company_id;
    public $client_ref;
    public $address_billing;
    public $address_delivery;
    public $patient_id;
    public $bac;
    public $price;
    public $comments;
    public $status;
    /**/
    public $pdf_ancho = 190;
    public $pdf_alto_linea = 5;

    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(10, 10, 'coello.be', 0, 0, 'L');
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, 'Print: (d/m/y) ' . date("d/m/Y"), 0, 0, 'R');
    }

    function setId($id) {
        return $this->id = $id;
    }

    function setVia($via) {
        return $this->via = $via;
    }

    function setDate($date) {
        return $this->date = $date;
    }

    function SetCompany_id($company_id) {
        return $this->company_id = $company_id;
    }

    function setClient_ref($client_ref) {
        $this->client_ref = $client_ref;
    }

    function set_Pdf_Ancho() {
        return $this->GetPageWidth() - 20;
    }

    /*     * *********************************************************************** */

    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function get_Pdf_ancho() {
        return $this->pdf_ancho;
    }

    function get_Pdf_alto_linea() {
        return $this->pdf_alto_linea;
    }

    function get_Pdf_patient_name() {
        return $this->pdf_patiente_name;
    }

    function get_Pdf_patient_lastname() {
        return $this->pdf_patiente_Lastname;
    }

    function get_Pdf_patient_birthdate() {
        return $this->pdf_patiente_birthdate;
    }

    // En-tête
    function Header() {
        global $pdf_order,
        $pdf_order_remake,
        $pdf_order_date,
        $config_company_name;

        $this->SetFont('Arial', 'B', 15);

        $this->SetFillColor(255, 200, 210);

        $this->SetFont('Arial', 'B', 15);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "$config_company_name", "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", "TB", 0, 'C', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, _tr("Order N: ") . $pdf_order["id"], "TRB", 1, 'R', 0);

        $this->SetFont('Arial', 'B', 10);
        $this->Ln();

        if ($pdf_order["express"]) {
            $this->SetFillColor(248, 243, 43);
            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, _tr("EXPRESS"), 1, 0, 'L', 1);
        } else {
            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", 1, 0, 'L', 0);
        }



        $this->SetFillColor(255, 200, 250);

        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", 1, 0, 'C', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, _tr("Date") . "(yyyy-mm-dd): " . $pdf_order_date, 1, 1, 'R', 0);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "REF: " . $pdf_order["client_ref"], 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "Remake from: " . $pdf_order_remake, 1, 0, 'C', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "BAC: " . $pdf_order['bac'], 1, 1, 'R', 0);

        $this->Ln();

//        $this->Ln();
    }

    // Empresa
    function cell_empresa($id) {
        global
        $config_company_a_address,
        $config_company_a_number,
        $config_company_a_postal_code,
        $config_company_a_barrio,
        $config_company_tel,
        $config_company_url,
        $config_company_email;

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);

        $this->Image("logo.jpg", 15, 50, -180);
        //$this->Image("qr.png", 167, 50, -180);
        //https://prgm.spipu.net/view/27
        //$this->Image("qr.php", 167, 50, -180);
        // $this->Image("img/QR/$id.png", 157, 48, 40);

        $this->SetX(10);

        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LTR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_address $config_company_a_number", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_postal_code - $config_company_a_barrio", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: $config_company_tel", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LBR", 2, 'C', 0);

        $this->Ln();
    }

    // Paciente
    function cell_patient($p) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _tr("Patient"), "LTR", 1, 'L', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _tr("Name"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _tr("Lastname"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _tr("Birthdate"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _tr("Nationa Number"), "LTR", 1, 'L', 0);

        $this->SetFillColor(255, 200, 250);
        //$this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _tr("Name"), "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), "$p[name]", "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), "$p[lastname]", "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), "$p[bd]", "LTRB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), "$p[nn]", "LTRB", 1, 'L', 0);

        $this->Ln();
    }

    function cell_client($client) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);

        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _tr("Company"), "LTR", 1, 'L', 1);

        $this->SetFont('Arial', '', 8);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _tr("Name"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[name]", "T", 0, 'R', 0);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _tr("Delivery address") . " [$client[da_id]]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _tr("Billing address") . " [$client[ba_id]]", 1, 1, 'R', 0);
        $this->SetFont('Arial', '', 8);

        //2
        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _tr("Id Company"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[id]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_number] - $client[da_address]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_number] - $client[ba_address]", 1, 1, 'R', 0);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "LT", 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[client_ref]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_postcode] - $client[da_barrio]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_postcode] - $client[ba_barrio] ", 1, 1, 'R', 0);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "LBT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "TB", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_city] - $client[da_country]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_city] - $client[ba_city]", 1, 1, 'R', 0);
        $this->Ln();
    }

    // items
    function cell_items($pdf_items_l, $pdf_items_l_options, $pdf_items_r, $pdf_items_r_options, $pdf_items_s, $pdf_items_s_options) {

        $this->SetFillColor(255, 200, 250);
        $this->SetFont('Arial', 'B', 8);
        //   $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Left"), 1, 0, 'C', 1);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Right"), 1, 1, 'C', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 200, 250);

        $x = $this->GetX();
        $y = $this->GetY();

        ########################################################################
        ########################################################################
        ########################################################################
        if ($pdf_items_s) {
            ### START STEREO ########################################################

            $this->SetFillColor(255, 200, 250);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea(), _tr("STEREO"), 1, 1, 'C', 1);
            $this->SetFont('Arial', '', 8);

            $i = 0;
            if ($pdf_items_s) {
                foreach ($pdf_items_s as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_s_options) {
                    foreach ($pdf_items_s_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), strtoupper("option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END STEREO ########################################################
        } else {
            //
            ### START RIGHT ########################################################

            $i = 0;
            if ($pdf_items_l) {



                $this->SetFillColor(255, 200, 250);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Left"), 1, 1, 'C', 1);

                //$this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                //$this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Right"), 1, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);

                foreach ($pdf_items_l as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_l_options) {
                    foreach ($pdf_items_l_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper("Option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END RIGHT ########################################################
            ### START LEFT ########################################################
            $i = 0;

            if ($pdf_items_r) {

                $this->SetX(120);
                $this->SetY($y);

                $this->SetFillColor(255, 200, 250);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), "", 0, 0, 'C', 0);

                $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Right"), 1, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);

                foreach ($pdf_items_r as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }

                    $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }



                if ($pdf_items_r_options) {
                    foreach ($pdf_items_r_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper("Option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END LEFT ########################################################
            //
        }
        ########################################################################
        ########################################################################
        ########################################################################
    }

    function cell_extras() {
        $this->SetFont('Arial', 'I', 12);

        $this->SetFillColor(255, 200, 210);
        $this->Cell($this->get_Pdf_ancho(), 10, _tr("Extras"), 1, 1, 'L', 1);
    }

    function cell_comments() {
        global $pdf_order;
        $this->SetFont('Arial', 'I', 10);
        $this->SetFillColor(255, 200, 210);
        //$this->MultiCell($w, $h, $txt, $border, $align, $fill); 
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, _tr("Comments") . ": " . $pdf_order['comments'], 1, 'L', 1);
        //$this->Cell($this->get_Pdf_ancho(), 10, _tr("Comments") . ": " . $pdf_order['comments'], 1, 1, 'L', 1);
    }

    function cell_QR() {
        
    }
}
