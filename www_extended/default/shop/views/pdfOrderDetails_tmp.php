<?php

require "includes/qrcode/qrcode.class.php";
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
    public $pdf_alto_linea = 4.5;
    public $pdf_color1_r = "242";
    public $pdf_color1_g = "242";
    public $pdf_color1_b = "242";
    public $qr_position_x = 10;
    public $qr_position_y = 10;

    function setQr_position_x($x) {
        $this->qr_positions_x = $x;
    }

    function setQr_position_y($y) {
        $this->qr_positions_y = $y;
    }

    function getQr_position_x() {
        return $this->qr_position_x;
    }

    function getQr_position_y() {
        return $this->qr_position_y;
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

    function get_color1_r() {
        return $this->pdf_color1_r;
    }

    function get_color1_g() {
        return $this->pdf_color1_g;
    }

    function get_color1_b() {
        return $this->pdf_color1_b;
    }

    // En-tête
    function Header() {
        global
        $pdf_order, $pdf_order_remake, $pdf_order_date, $pdf_order_date_delivery, $dif_day, $config_company_name, $config_company_a_address, $config_company_a_number,
        $config_company_a_postal_code, $config_company_a_barrio,
        $config_company_tel,
        $config_company_url,
        $config_company_email,
        $config_company_logo;

        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(255, 200, 250);
        $this->Image($config_company_logo, 15, 14, -180);

        //$this->Image("qr.png", 167, 50, -180);
        //https://prgm.spipu.net/view/27
        //$this->Image("qr.php", 167, 50, -180);
        // $this->Image("img/QR/$id.png", 157, 48, 40);               
        $this->SetX(-10);
        $this->SetX(190);
        $qrcode = new QRcode("$pdf_order[id]" . "-" . $pdf_order["bac"], 'H');
        $qrcode->displayFPDF($this, $this->GetX() - 30, $this->GetY(), "40", array(255, 255, 255), array(0, 0, 0));

        $this->SetX(10);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_address $config_company_a_number", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_postal_code - $config_company_a_barrio", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: $config_company_tel", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);

        $this->Ln();

        $this->SetFont('Arial', 'B', 15);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", "", 0, 'C', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, _tr("Order N: ") . $pdf_order["id"] . "-" . $pdf_order["bac"], "", 1, 'R', 0);
        $this->Ln();

        ## TITULO CELDA
        ## TITULO CELDA
        ## TITULO CELDA
        $this->SetFillColor(255, 200, 250);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Ref"), 1, 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Express"), 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Bac"), 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Remake from"), 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Registre date"), 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Shipping date") . " (" . _tr("Ymd") . ")", 1, 1, 'L', 0);

        ## DATOS
        ## DATOS
        ## DATOS
        $this->SetFont('Arial', '', 10);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, $pdf_order["client_ref"], 1, 0, 'L', 0);

//        if ($pdf_order["express"]) {
//            $this->SetFillColor(248, 243, 43);
//            $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("Yes"), 1, 0, 'L', 1);
//        } else {
//            $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _tr("No"), 1, 0, 'L', 0);
//        }

        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, $pdf_order["bac"], 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, $pdf_order_remake, 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, "$pdf_order_date", 1, 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, "$pdf_order_date_delivery +$dif_day", 1, 1, 'L', 0);

        $this->Ln();

//        $this->Ln();
    }

    function Footer() {
        global $pdf_order, $dif_day;

        $dif_day_f = ($dif_day == 1) ? " +$dif_day" : "";

        // Positionnement à 1,5 cm du bas
        $this->SetY(-30);
        // Police Arial italique 8
        $this->SetFont('Arial', '', 10);
        // Numéro de page
        $this->Cell(($this->pdf_ancho / 10) * 4.8, 7, "" . $pdf_order['id'], 0, 0, 'R');

        // Positionnement à 1,5 cm du bas
        $this->SetY(-21);
        // Police Arial italique 8
        $this->SetFont('Arial', '', 25);
        // Numéro de page
        $this->Cell(($this->pdf_ancho / 2), 20, "Bac: " . $pdf_order['bac'] . " $dif_day_f", 0, 0, 'L');

        $qrcode = new QRcode("$pdf_order[id]", 'H');

        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 0), array(0, 0, 0));

        $this->SetX($this->GetX());
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(($this->pdf_ancho / 10) * 5, 7, 'coello.be', 0, 0, 'L');
        // $this->Cell(10, 7, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 7, 'Print: (Y m d) ' . date("Y m d H\hi"), 0, 0, 'R');
    }

    // Empresa
    function cell_empresa($id) {
//        global 
//        $pdf_order, 
//        $config_company_a_address ,
//        $config_company_a_number ,
//        $config_company_a_postal_code,
//        $config_company_a_barrio ,        
//        $config_company_tel,
//        $config_company_url,
//        $config_company_email;
//
//        $this->SetFont('Arial', 'I', 8);
//        $this->SetFillColor(255, 200, 250);
//        $this->Image("logo.jpg", 15, 50, -180);
//        //$this->Image("qr.png", 167, 50, -180);
//        //https://prgm.spipu.net/view/27
//        //$this->Image("qr.php", 167, 50, -180);
//      // $this->Image("img/QR/$id.png", 157, 48, 40);               
//        $this->SetX(-10);
//        $this->SetX(190);        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 30, $this->GetY(), "40", array(255, 255, 255), array(0, 0, 0));
//        
//        $this->SetX(10);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_address $config_company_a_number", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_postal_code - $config_company_a_barrio", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: $config_company_tel", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        
//
//
//        $this->Ln();
    }

    // Paciente
    function cell_patient($p) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());

        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _tr("Patient") . " - " . $p['id'], "LTR", 1, 'L', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 255, 255);
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

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());

        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _tr("Company") . " - " . $client['id'], "LTR", 1, 'L', 1);

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

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        $this->SetFont('Arial', 'B', 8);
        //   $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Left"), 1, 0, 'C', 1);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _tr("Items Right"), 1, 1, 'C', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());

        $x = $this->GetX();
        $y = $this->GetY();

        ########################################################################
        ########################################################################
        ########################################################################
        if ($pdf_items_s) {
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            //$this->SetFillColor(255, 200, 250);
            $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
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
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), strtoupper(_tr($key)), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_s_options) {
                    foreach ($pdf_items_s_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), strtoupper(_tr("Option")), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);

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



                $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
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
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_tr($key)), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_l_options) {
                    foreach ($pdf_items_l_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_tr("Option")), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            // una vez las lineas de left llegan al final se define este punto como final 
            $y_end_l = $this->GetY();
            ### END RIGHT ########################################################
            ### START LEFT ########################################################
            $i = 0;

            if ($pdf_items_r) {

                $this->SetX(120);
                $this->SetY($y);

                $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
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
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_tr($key)), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);
                    $i++;
                }



                if ($pdf_items_r_options) {
                    foreach ($pdf_items_r_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_tr('Option')), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode(_tr($value)), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            $y_end_r = $this->GetY();
            // una vez terminado la derecha, vemos cual es el mas largo 
            $y_end = ($y_end_l > $y_end_r) ? $y_end_l : $y_end_r;

            $this->SetY($y_end);

            ### END LEFT ########################################################
            //
        }
        ########################################################################
        ########################################################################
        ########################################################################
    }

//
//    function cell_extras() {
//        $this->SetFont('Arial', 'I', 12);
//
//        $this->SetFillColor(255, 200, 210);
//        $this->Cell($this->get_Pdf_ancho(), 10, _tr("Extras"), 1, 1, 'L', 1);
//    }

    function cell_comments() {
        global $pdf_order;
        $this->SetFont('Arial', 'I', 10);
        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        //$this->MultiCell($w, $h, $txt, $border, $align, $fill); 
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, _tr("Comments") . ": " . $pdf_order['comments'], 1, 'L', 1);
        //$this->Cell($this->get_Pdf_ancho(), 10, _tr("Comments") . ": " . $pdf_order['comments'], 1, 1, 'L', 1);
    }

    function cell_QR() {
        
    }
}

// Instanciation de la classe dérivée
$pdf = new PDF();

$pdf->SetFont('Times', '', 12);
for ($i = 1; $i <= 4000; $i++) {
    $pdf->Cell(0, 10, 'Impression de la ligne numero ' . $i, 0, 1);
}
$pdf->Output();
