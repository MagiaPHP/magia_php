<?php

require "includes/qrcode/qrcode.class.php";
require('includes/fpdf185/fpdf.php');

class A extends FPDF {

    public $pdf_ancho = 190;
    public $pdf_ancho_largo = 275;
    public $pdf_alto_linea = 5;
    public $_doc_model;
    public $_doc;
    public $_section;
    public $_lang = "en_GB";
    public $_cell_selected = null;
    public $qr_position_x = 10;
    public $qr_position_y = 10;
    public $_PageNo; // the current page number. 
    public $_my_company;
    public $_tag = array();
    var $angle = 0;
    var $grid = false;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        parent::__construct($orientation, $unit, $size);
        $this->setA(1022);
        $this->setGrid();
    }

    function setTag($t, $val) {

        if (isset($val)) {
            $this->_tag[$t] = $val;
        } else {
            $this->_tag[$t] = null;
        }
    }

    function getTag($tag) {
        return $this->_tag[$tag];
    }

    function setQr_position_x($x) {
        $this->qr_positions_x = $x;
    }

    function setQr_position_y($y) {
        $this->qr_positions_y = $y;
    }

    function setA($id) {
        $this->_my_company = new Company();
        $this->_my_company->setCompany($id);
    }

    function getMyCompany() {
        return $this->_my_company;
    }

    function set_Pdf_Ancho() {
        return $this->GetPageWidth() - 20;
    }

    function setDocModele($doc_model) {
        $this->_doc_model = $doc_model;
    }

    function setDoc($doc) {
        $this->_doc = $doc;
    }

    function setSection($section) {
        $this->_section = $section;
    }

    function setLang($lang) {
        $this->_lang = $lang;
    }

    function setCell_selected($cell_selected) {
        $this->_cell_selected = $cell_selected;
    }

    function setGrid() {

        $pdf_grid = _options_option('config_pdf_grid') ? true : false;

        if ($pdf_grid) {
            $this->grid = true;
        } else {
            $this->grid = false;
        }
    }

    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    function getQr_position_x() {
        return $this->qr_position_x;
    }

    function getQr_position_y() {
        return $this->qr_position_y;
    }

    function get_Pdf_ancho() {
        return $this->pdf_ancho;
    }

    function get_Pdf_ancho_largo() {
        return $this->pdf_ancho_largo;
    }

    function get_Pdf_alto_linea() {
        return $this->pdf_alto_linea;
    }

    function getDocModele() {
        return $this->_doc_model;
    }

    function getDoc() {
        return $this->_doc;
    }

    function getSection() {
        return $this->_section;
    }

    function getLang() {
        return $this->_lang;
    }

    function getCell_selected() {
        return $this->_cell_selected;
    }

    function Header() {
        if ($this->grid) {
            $this->DrawGrid();
        }
        $this->addElements('header');
    }

######################################################################
######################################################################
//    public    function Rect($x, $y, $w, $h, $style = '') {
//        $this->RoundedRect($x, $y, $w, $h, $r, $corners, $style); 
//    }
######################################################################
######################################################################

    // celda co ntexto tachado
    function CellWithStrike($w, $h, $text, $border, $ln, $align, $fill, $link = null) {
        // Guardar la posición actual
        $x = $this->GetX();
        $y = $this->GetY();

        // Dibujar el texto normal en blanco
//        $this->SetTextColor(255, 255, 255);
        $this->Cell($w, $h, $text, $border, $ln, $align, $fill, $link);

        // Restaurar la posición
//        $this->SetXY($x, $y);
        // Dibujar una línea sobre el texto para simular el tachado en negro
        $this->SetDrawColor(0, 0, 0);
        $this->Line($x, $y + $h / 2, $x + $w, $y + $h / 2);

        // Restaurar el color de texto predeterminado
//        $this->SetTextColor(0, 0, 0);
    }

//    function cuadricula($params) {
//
//        if ($params['guideLines'] == 1) {
//
//            $this->SetDrawColor(250, 236, 236);
//            $this->SetFont('Arial', '', 7);
//            $this->SetTextColor(0, 0, 228);
//
//            $this->SetXY(10, 7.5);
//
//            if ($params['guideLinesNumbers'] == 1) {
//
//                $i = 1;
//                for ($h = 10;
//                        $h < 300;
//                        $h = $h + 5) {
//                    $this->Cell(195, 5, $h, 0, 1, 'R');
//                    $i++;
//                }
//
//                $this->SetXY(2.50, 6.5);
//
//                $i = 1;
//                for ($v = 5;
//                        $v < 210;
//                        $v = $v + 5) {
//                    $this->Cell(5, 5, $v, 0, 0, 'C');
//                    $i++;
//                }
//            }
//
//            $i = 1;
//            for ($h = 10;
//                    $h < 295;
//                    $h = $h + 5) {
//                $this->Line(10, $h, 200, $h);
//                $i++;
//            }
//
//            $i = 1;
//            for ($v = 10;
//                    $v < 205;
//                    $v = $v + 5) {
//                $this->Line($v, 10, $v, 290);
//                $i++;
//            }
//
//// regreso los valores al inicio
//            $this->SetXY(10, 10);
//        }
//    }
//
//
//
//
    function template($txt, $translate = true): string {
        global $u_id;
        global $u_owner_id;

        $my_company = new Company();
        $my_company->setCompany($u_owner_id);
        //
        $my_company_bank = ($my_company->getBankBydefault());
        //
        $ab = addresses_billing_by_contact_id($my_company->getId());
        $ad = addresses_delivery_by_contact_id($my_company->getId());
        //
        //
        //%dd% %mm% %yy% %yyyy% %day% %month%
        // %my_company_address_billing_barrio%, %day% %dd% %month% %yyyy%
        //
        $this->setTag('%pdf_title%', 'Factuz pdf');
        $this->setTag('%ip%', get_user_ip());
        $this->setTag('%ref1%', date('dmYHis'));
        $this->setTag('%ref2%', date('dmYHis'));
        $this->setTag('%ref3%', date('dmYHis'));
        $this->setTag('%today%', date('d m Y'));
        $this->setTag('%now%', date('Y-m-d H\hi:s'));

        $this->setTag('%dd%', date('d'));
        $this->setTag('%mm%', date('m'));
        $this->setTag('%yy%', date('y'));
        $this->setTag('%yyyy%', date('Y'));

        $this->setTag('%day%', date('l')); // Lunes, Martes, Miercoles, Jueves, ...
        $this->setTag('%month%', date('F')); //Enero 
        $this->setTag('%year%', date('Y'));

        $this->setTag('%PageNo%', $this->PageNo());
        $this->setTag('%nb%', '{nb}');
        //
        $this->setTag('%my_company_name%', $my_company->getName());
        $this->setTag('%my_company_logo%', logo_img());

        $this->setTag('%my_company_slogan%', $my_company->getName());
        $this->setTag('%my_company_tva%', contacts_field_id('tva', $my_company->getId())); // decreped
        $this->setTag('%my_company_vat%', contacts_field_id('tva', $my_company->getId()));

        foreach (directory_names_list() as $key => $mcd) {
            if ($mcd['name']) {
                $this->setTag('%my_company_' . strtolower($mcd['name']) . '%', directory_by_contact_name($my_company->getId(), $mcd['name']));
            }
        }
        //
        if ($ab) {
            $this->setTag('%my_company_address_billing_id%', $ab['id']);
            $this->setTag('%my_company_address_billing_address%', $ab['address']);
            $this->setTag('%my_company_address_billing_number%', $ab['number']);
            $this->setTag('%my_company_address_billing_postcode%', $ab['postcode']);
            $this->setTag('%my_company_address_billing_barrio%', $ab['barrio']);
            $this->setTag('%my_company_address_billing_sector%', $ab['sector']);
            $this->setTag('%my_company_address_billing_ref%', $ab['ref']);
            $this->setTag('%my_company_address_billing_city%', $ab['city']);
            $this->setTag('%my_company_address_billing_province%', $ab['province']);
            $this->setTag('%my_company_address_billing_region%', $ab['region']);
            $this->setTag('%my_company_address_billing_country_code%', $ab['country']);
            $this->setTag('%my_company_address_billing_country%', (isset($ab['country'])) ? countries_name($ab['country']) : '');
        }
        if ($ad) {
            $this->setTag('%my_company_address_delivery_id%', $ad['id']);
            $this->setTag('%my_company_address_delivery_address%', $ad['address']);
            $this->setTag('%my_company_address_delivery_number%', $ad['number']);
            $this->setTag('%my_company_address_delivery_postcode%', $ad['postcode']);
            $this->setTag('%my_company_address_delivery_barrio%', $ad['barrio']);
            $this->setTag('%my_company_address_delivery_sector%', $ad['sector']);
            $this->setTag('%my_company_address_delivery_ref%', $ad['ref']);
            $this->setTag('%my_company_address_delivery_city%', $ad['city']);
            $this->setTag('%my_company_address_delivery_province%', $ad['province']);
            $this->setTag('%my_company_address_delivery_region%', $ad['region']);
            $this->setTag('%my_company_address_delivery_country_code%', $ad['country']);
            $this->setTag('%my_company_address_delivery_country%', (isset($ad['country'])) ? countries_name($ad['country']) : '');
        }

        ////////////////////////////////////////////////////////////////////
        $this->setTag('%my_company_bank%', $my_company_bank['bank']);
        $this->setTag('%my_company_bank_account_number%', $my_company_bank['account_number']);
        $this->setTag('%my_company_bank_bic%', $my_company_bank['bic']);
        $this->setTag('%my_company_bank_iban%', $my_company_bank['iban']);

        $this->setTag('%my_id%', (contacts_field_id('id', $u_id)));
        $this->setTag('%my_owner_id%', (contacts_field_id('owner_id', $u_id)));
        $this->setTag('%my_type%', (contacts_field_id('type', $u_id)));
        $this->setTag('%my_title%', (contacts_field_id('title', $u_id)));
        $this->setTag('%my_name%', contacts_formated_name(contacts_field_id('name', $u_id)));
        $this->setTag('%my_lastname%', contacts_formated_lastname(contacts_field_id('lastname', $u_id)));
        $this->setTag('%my_birthdate%', (contacts_field_id('birthdate', $u_id)));
        $this->setTag('%my_language%', (contacts_field_id('language', $u_id)));

        // en la tabla empleados
        $this->setTag('%my_cargo%', employees_field_by_contact_id('cargo', $u_id));

        foreach (directory_names_list() as $key => $mdnl) {
//            if ($mdnl['name']) {
            $this->setTag('%my_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($u_id, $mdnl['name']));
//            }
        }

        ////////////////////////////////////////////////////////////////////
        $this->setTag('%powered_by%', "Powered by Factuz.com");
//        $this->setTag('%{cp}%', $this->PageNo());
//        $this->setTag('%{nb}%', "{nb}");
        $this->setTag('%cgv%', _options_option('config_cgv'));

        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        ////////////////////////////////////////////////////////////////////////
        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp && $txt_tr) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }

        return ($txt_tr);
    }

    //
    //

    function getTagList() {
        return $this->_tag;
    }

//    function encabezados() {
//
//        $border = 0;
//
//        $this->SetFont('Arial', 'B', 10);
//        $this->SetFillColor(200, 239, 239);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, pdf_tr("Qty"), $border, 0, 'L', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, pdf_tr("Code"), $border, 0, 'L', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 1, pdf_tr("Description"), $border, 0, 'L', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("Price"), $border, 0, 'R', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("Sub total"), $border, 0, 'R', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("Discount"), $border, 0, 'R', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("HTVA"), $border, 0, 'R', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("TVA"), $border, 0, 'R', 1);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("TVAC"), $border, 1, 'R', 1);
//        $this->SetFont('Arial', '', 8);
//    }
//    function lineasVacias($coloreada) {
////$color = ( $i % 2 == 0 ) ? 1 : 0 ;
//        $color = ( $coloreada ) ? 1 : 0;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, "-", 0, 0, 'L', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 41, $this->get_Pdf_alto_linea() * 1, "", 0, 0, "L", $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', $color);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "", 0, 1, 'R', $color);
//    }
//    function completarLineas($x) {
//        for ($i = 0;
//                $i < $x;
//                $i++) {
//            $this->lineasVacias($coloreada);
//        }
//    }

    function tags($line = null) {

        $i = 1;
        $color = '0';
        foreach ($this->getTagList() as $tag => $value) {

            if ($i % 2 == 0) {
                $color = '1';
            }

            $this->Cell(8, 5, $i, 0, 0, 'C', $color, 0);
            $this->Cell(90, 5, $tag, 0, 0, 'L', $color, 0);
            $this->Cell(0, 5, $value, 0, 1, 'L', $color, 0);
            $i++;

            $color = '0';
        }
    }

    function items_header() {
        
    }

    function items_code($cell, $code = 1) {

        $this->Cell($cell['w'], $cell['h'], '202020', 1, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
    }

    function items_quantity($cell, $quantity) {

        $this->Cell($cell['w'], $cell['h'], $quantity, $border, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
    }

//    function pdf_lines() {
//
//        $ln = 0;
//        $cols = 100;
//        $lines = 100;
//        $label = '';
//
//        $this->SetDrawColor(200, 200, 200);
//        $this->SetX(0);
//        $this->SetY(5);
//
//        for ($i = 1; $i <= $lines; $i++) {
//            for ($j = 1; $j <= $cols; $j++) {
//                if ($j == $cols) {
//                    $ln = 1;
//                }
//                if ($i == 1) {
//                    $label = $j;
//                }
//                if ($j == 1) {
//                    $label = $i;
//                }
//                $this->Cell(5, 5, $label, '1', $ln, 'L', 0, false);
//                $ln = 0;
//                $label = '';
//            }
//        }
//
//        $this->SetDrawColor(0);
//    }

    function items($translate = true, $line = null) {

        global $u_owner_id;

// esto es el encabeado
//        $this->encabezados();
        // envio la linea entera
        $this->SetFillColor(249, 249, 249);
        $this->SetFont('Arial', '', 6);

        $totalitems = 0;
        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $discounts = 0;
        $discounts_mode = 0;
        $totaldiscounts = 0;

        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }

        ////////////////////////////////////////////////////////////////////////


        $i = 1;
        foreach (invoice_lines_list_by_invoice_id($invoices['id']) as $key => $ii) {

// Esto es el la parte de arriba
//            if ($this->GetY() > 300) {
//                $this->AddPage();
//               // $this->bodyDate($invoices);
//                $this->Ln();
//                $this->encabezados();
//            }


            $totalitems = $totalitems + ($ii['quantity'] );
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] );
            $subtotal = $subtotal + $ii['subtotal'];
            $totaltax = $totaltax + $ii['totaltax'];
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]);
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "";

// MUESTRO SOLO SI TIENE PRECIO O ....
            if (
                    $ii['price'] > 0 ||
                    $ii['code'] == "PAT" ||
                    $ii['code'] == "ORDER" ||
                    $ii['code'] == "SIDEL" ||
                    $ii['code'] == "SIDER"
            ) {

                $color = ( $i % 2 == 0 ) ? 1 : 0;

// si es order agregamos un espacio 
                if ($ii['code'] == 'ORDER') {
//   $this->Ln();
                }


                if ($ii['code'] == 'ORDER') {

                    $order_id = (int) filter_var($ii['description'], FILTER_SANITIZE_NUMBER_INT);
                    $client_ref = orders_field_id('client_ref', $order_id);
                    $office_id = (orders_field_id("company_id", $order_id));
                    $office_name = contacts_formated(orders_field_id("company_id", $order_id));

// id cliente | nombre de empresa | referencia dela empresa 
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.7
                            , "$office_id  $office_name / " . pdf_tr("Your reference", $lang) . " : $client_ref"
                            , 'B', 1, 'L', $color);
                }



// si el precio es cero, no puestro nada 
// sino muestro con precios
//if( $ii['price'] > 0 ){  //              
                if (1 == 1) {  //      
//                    $border = 0;
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 05, $this->get_Pdf_alto_linea() * 0.7, $ii['quantity'], $border, 0, 'L', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 07, $this->get_Pdf_alto_linea() * 0.7, $ii['code'], $border, 0, "L", $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 0.7, '', $border, 0, "L", $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price']), $border, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price'] * $ii['quantity']), $border, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "$discounts_mode " . moneda($ii['totaldiscounts']), $border, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal']), $border, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['totaltax']) . " (" . $ii['tax'] . "%) ", $border, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal'] + $ii['totaltax']), $border, 1, 'R', $color);
                } else {


                    $this->Cell(($this->get_Pdf_ancho() / 100) * 05, $this->get_Pdf_alto_linea() * 0.7, $ii['quantity'], 0, 0, 'L', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 07, $this->get_Pdf_alto_linea() * 0.7, $ii['code'], 0, 0, "L", $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 0.7, '', 0, 0, "L", $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, '', 0, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "", 0, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "", 0, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "", 0, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "", 0, 0, 'R', $color);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "", 0, 1, 'R', $color);
                }
//// MULTI CELDA
                $this->SetY($this->GetY() - 3); // distancia desde arriba
                $this->SetX($this->GetX() + 22);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 28,
                        $this->get_Pdf_alto_linea() * 0.5,
                        pdf_textr($ii['description']),
                        0,
                        'T',
                        0
                );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
//$this->Ln();
// MULTI CELDA

                $i++;
            }
        }

        $this->SetFont('Arial', '', 8);

// Esto necesita de un espacio minimo de 
// X si es inferior agregamos un apagina 
//        if ($this->GetY() > 178) {
//
//            while ($this->GetY() < 265) {
//                $color = ( $i++ % 2 == 0 ) ? 1 : 0;
//                $this->lineasVacias($color);
//            }
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, ">>>", "T", 1, 'R', 0);
//            $this->AddPage();
//        }
// 
//        if ($this->GetY() < 100) {
//            while ($this->GetY() < 180) {
//                $color = ( $i++ % 2 == 0 ) ? 1 : 0;
//                $this->lineasVacias($color);
//            }
//        }
//        //////////////////////////////////////////////////////////////////////
//        //////////////////////////////////////////////////////////////////////
//        //////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
        $this->Ln();
        ## TVA        

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 1, 0, "R", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $lang), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Discounts", $lang), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Base taxable", $lang), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("% Tva", $lang), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Tva", $lang), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $lang), 1, 1, 'R', 0);

        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

        foreach ($tax_by_country as $key => $tax) {
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($invoices['id'], $tax['tax'])), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($invoices['id'], $tax['tax']) - invoice_lines_sum_lines_discounts_by_tax($invoices['id'], $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_discounts_by_tax($invoices['id'], $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[tax] %", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_total_by_tax($invoices['id'], $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS      
        // Total pago recibidos
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Advance", $lang), 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($total_advance), 'LR', 1, 'R', 0);
        ## Total a payer
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

        $this->SetFont('Arial', '', 15);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_tr("To pay", $lang), 0, 0, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda($tvac - $total_advance), "RLTB", 1, 'R', 0);

        $this->SetFont('Arial', '', 6);
    }

    function cell_QR() {
        $qrcode = new QRcode("2020", 'H');
        $qrcode->displayFPDF($this, $x, $y, "40", array(255, 255, 255), array(0, 0, 0));
    }

    function Footer() {
        $this->SetY(-15);
        $this->addElements('footer');
    }

    function addElements($section) {

        $modele = $this->getDocModele();
        $doc = $this->getDoc();

        // $doc_models_lines = doc_models_lines_search_by_modele_doc_section($modele, $doc, $section);


        switch ($section) {
            case 'header':
                $doc_models_lines_default = doc_models_lines_search_by_modele_doc_header($modele, 'default', $section);
                $doc_models_lines_document = doc_models_lines_search_by_modele_doc_header($modele, $doc, $section);
                $doc_models_lines = ($doc_models_lines_document) ? $doc_models_lines_document : $doc_models_lines_default;
                break;

            case 'footer':
                // si no hay en el documento, cojo el footer de default
                $doc_models_lines_default = doc_models_lines_search_by_modele_doc_footer($modele, 'default', $section);
                $doc_models_lines_document = doc_models_lines_search_by_modele_doc_footer($modele, $doc, $section);
                $doc_models_lines = ($doc_models_lines_document) ? $doc_models_lines_document : $doc_models_lines_default;
                break;

            default: // todos los demas 
                $doc_models_lines = doc_models_lines_search_by_modele_doc($modele, $doc, $section);

                break;
        }

        $i = 0;
        foreach ($doc_models_lines as $line) {




            switch ($line['element']) {
                case 'Cell':
                    $this->block_cell($line);
                    break;
                case 'MultiCell':
                    $this->block_multicell($line);
                    break;
                case 'Image':
                    $this->block_image($line);
                    break;
                case 'QR':
                    $this->block_QR($line);
                    break;
                case 'Line':
                    $this->block_line($line);
                    break;
                case 'Link':
                    $this->block_link($line);
                    break;
                case 'Ln':
                    $this->block_ln($line);
                    break;
                case 'Rect':
                    $this->block_rect($line);
                    break;
                case 'Text':
                    $this->block_text($line);
                    break;
                case 'Write':
                    $this->block_write($line);
                    break;
                case 'AddPage':
                    $this->block_addpage($line);
                    break;
                default:
                    $this->block_cell($line);
                    break;
            }
            $i++;
        }
    }

    function block($b) {
        $this->block_cell($b);
    }

    //
    function block_cell($line) {
        global $invoices;

        //vardump($this->getCell_selected()); 

        $params = json_decode($line['params'], true);

        $cell = $params['Cell'];

        $translate = ( isset($cell['translate']) && $cell['translate'] ) ? true : false;

        $cell['w'] = (float) $cell['w'];
        $cell['h'] = (float) $cell['h'];
        $cell['ln'] = ($cell['ln'] == 0 || $cell['ln'] == 1 || $cell['ln'] == 2 ) ? $cell['ln'] : null;
        $cell['align'] = ($cell['align'] == 'L' || $cell['align'] == 'C' || $cell['align'] == 'R') ? $cell['align'] : 'L';
        $cell['fill'] = (isset($cell['fill']) && $cell['fill'] != null && $cell['fill'] != 0 ) ? true : false; // true o false
        $cell['link'] = ( isset($cell['link'])) ? $cell['link'] : null;

        $label = $this->template($cell['label'], $translate);

// escondido
        $cell['hidden'] = (isset($cell['hidden'])) ? $cell['hidden'] : 0;
//

        $dash_black = (isset($cell['dash']['black'])) ? $cell['dash']['black'] : false;
        $dash_white = (isset($cell['dash']['white'])) ? $cell['dash']['white'] : false;
//


        if (!$cell['hidden']) {
// ubicamos en la hoja
            if ($cell['x']) {
                $this->setX($cell['x']);
            }
            if ($cell['x'] && $cell['y']) {
// regreso los valores al inicio
                $this->SetXY($cell['x'], $cell['y']);
            }
            ##############################################################
            ##############################################################
            ##############################################################
            $SetFont = $params['SetFont'];
            $SetTextColor = $params['SetTextColor'];
            $SetDrawColor = $params['SetDrawColor'];
            $SetFillColor = $params['SetFillColor'];
            ////////////////////////////////////////////////////////////////////
            if ($SetFont) {
                $format = "";
                foreach ($SetFont['format'] as $key => $f) {
                    if ($f == 'R') {
                        $f = "";
                    }
                    $format = $format . $f;
                }
                $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
            }
            ////////////////////////////////////////////////////////////////////
            if ($SetTextColor) {
                $this->SetTextColor((int) $SetTextColor['r'], (int) $SetTextColor['g'], (int) $SetTextColor['b']);
            }
            if ($SetDrawColor) {
                $this->SetDrawColor((int) $SetDrawColor['r'], (int) $SetDrawColor['g'], (int) $SetDrawColor['b']);
            }
            if ($SetFillColor) {
                $this->SetFillColor((int) $SetFillColor['r'], (int) $SetFillColor['g'], (int) $SetFillColor['b']);
            }
            ##############################################################
            ##############################################################
            ##############################################################
            ////////////////////////////////////////////////////////////////////////
            $border = 0;
            if (isset($cell['border'])) {
                foreach ($cell['border'] as $key_border => $b) {
                    $border = $border . $b;
                }
            }

            $debug_pdf = _options_option('config_pdf_debug') ?? false;
            $debug_number_line = _options_option('config_debug_number_line') ?? false;

            if ($debug_number_line) {
                $label = $line['order_by'] . ' ' . $line['name'];
            }

            if ($debug_pdf) {
                $border = 1;
            }
            /////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////
            switch ($cell['label']) {
                case '%items_header%':
                    $this->items_header($invoices, $line);
                    break;

                case '%items_start%':
                    $this->items_start($invoices, $line);
                    break;

                case '%items%':
                    $this->items($invoices, $line);
                    break;

                case '%items_end%':
                    $this->items_end($invoices, $line);
                    break;

                case '%pdf_lines%':
                    $this->pdf_lines();
                    break;

                case '%items_code%':
                    $this->items_code($cell, $code);
                    break;

                case '%items_quantity%':
                    $this->items_quantity($cell, $quantity);
                    break;

                case '%items_description%':
                    $this->items_description($cell, $description);
                    break;

                case '%items_price%':
                    $this->items_price($cell, $price);
                    break;

                case '%items_discounts%':
                    $this->items_discounts($cell, $discounts);
                    break;

                case '%items_discounts_mode%':
                    $this->items_discounts_mode($cell, $discounts_mode);
                    break;

                case '%items_tax%':
                    $this->items_tax($cell, $tax);
                    break;

                case '%items_order_by%':
                    $this->items_order_by($cell, $order_by);
                    break;

                case '%items_status%':
                    $this->items_status($cell, $status);
                    break;

                case '%tags%':
                    $this->tags();
                    break;

                default:
                    $this->SetDash($dash_black, $dash_white); //4mm on, 2mm off  
                    ############################################################
                    ############################################################
                    // esto es para colorear la celda en la que estamos trabajando
                    if ((int) $this->getCell_selected() == (int) $line['id']) {
                        $border = 1;
                        $cell['fill'] = 1;
                        $this->SetFillColor(243, 243, 117);
                        $this->SetDash(2, 2);
                    }
                    ############################################################
                    ############################################################
                    $this->Cell($cell['w'], $cell['h'], ($label), $border, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
                    $this->SetDash(); //restores no dash
                    break;
            }
        }
    }

    // No se traduce el contenido de una muti celda 
    // pero si se remplaza los %tags%
    function block_multicell($line) {

        $params = json_decode($line['params'], true);
        $MultiCell = $params['MultiCell'];
        
        $dash_black = (isset($MultiCell['dash']['black'])) ? $MultiCell['dash']['black'] : false;
        $dash_white = (isset($MultiCell['dash']['white'])) ? $MultiCell['dash']['white'] : false;

//        $label_lang = $this->template($MultiCell['label']['language'][$this->_lang], false);

        if (
                isset($MultiCell['label']) && is_array($MultiCell['label']) && // Verifica que 'label' existe y es un array
                isset($MultiCell['label']['language']) && is_array($MultiCell['label']['language']) && // Verifica que 'language' existe y es un array
                isset($MultiCell['label']['language'][$this->_lang])  // Verifica que el índice del idioma existe
        ) {
            $label_lang = $this->template($MultiCell['label']['language'][$this->_lang], false);
        } else {
            // Maneja el caso de error si la estructura no es como se espera
            $label_lang = 'en_GB';  // Mensaje o valor predeterminado
            error_log('Error:  Estructura de datos inesperada en $MultiCell para la clave "label" o "language", file '. __FILE__.', linea '. __LINE__.'.');
        }



        $MultiCell['w'] = (float) $MultiCell['w'];
        $MultiCell['h'] = (float) $MultiCell['h'];
        $MultiCell['align'] = ($MultiCell['align'] == 'L' || $MultiCell['align'] == 'C' || $MultiCell['align'] == 'R' || $MultiCell['align'] == 'J') ? $MultiCell['align'] : 'J';
        $MultiCell['fill'] = (isset($MultiCell['fill']) && $MultiCell['fill'] != null && $MultiCell['fill'] != 0 ) ? true : false; // true o false
        $MultiCell['hidden'] = (isset($MultiCell['hidden'])) ? $MultiCell['hidden'] : 0;

        if (!$MultiCell['hidden']) {
            ##############################################################
            ##############################################################
            ##############################################################
            $SetFont = $params['SetFont'];
            $SetTextColor = $params['SetTextColor'];
            $SetDrawColor = $params['SetDrawColor'];
            $SetFillColor = $params['SetFillColor'];
            ////////////////////////////////////////////////////////////////////
            if ($SetFont) {
                $format = "";
                foreach ($SetFont['format'] as $key => $f) {
                    if ($f == 'R') {
                        $f = "";
                    }
                    $format = $format . $f;
                }
                $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
            }
            ////////////////////////////////////////////////////////////////////
            if ($SetTextColor) {
                $this->SetTextColor((int) $SetTextColor['r'], (int) $SetTextColor['g'], (int) $SetTextColor['b']);
            }
            if ($SetDrawColor) {
                $this->SetDrawColor((int) $SetDrawColor['r'], (int) $SetDrawColor['g'], (int) $SetDrawColor['b']);
            }
            if ($SetFillColor) {
                $this->SetFillColor((int) $SetFillColor['r'], (int) $SetFillColor['g'], (int) $SetFillColor['b']);
            }
            ##############################################################
            ##############################################################
            ##############################################################

            $border = 0;
            if (isset($MultiCell['border'])) {
                foreach ($MultiCell['border'] as $key_border => $b) {
                    $border = $border . $b;
                }
            }
            $debug_pdf = _options_option('config_pdf_debug') ?? false;
            if ($debug_pdf) {
                $border = 1;
            }
            $this->SetDash($dash_black, $dash_white); //4mm on, 2mm off  
            ############################################################
            ############################################################
            // esto es para colorear la celda en la que estamos trabajando
            if ((int) $this->getCell_selected() == (int) $line['id']) {
                $border = 1;
                $MultiCell['fill'] = 1;
                $this->SetDash(2, 2);
            }
            ############################################################
            ############################################################


            $this->MultiCell($MultiCell['w'], $MultiCell['h'], ($label_lang), $border, $MultiCell['align'], $MultiCell['fill']);
            $this->SetDash(); //restores no dash
        }
    }

    function block_image($line) {

        $params = json_decode($line['params'] ?? '', true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            // Manejar error de JSON aquí
            throw new Exception('Error decodificando JSON: ' . json_last_error_msg());
        }

        if (!is_array($params)) {
            throw new Exception('Error: No se pudo decodificar JSON en un array.');
        }



        $Image = $params['Image'];
        $Image['file'] = ($Image['file']) ? $Image['file'] : null;
        $Image['x'] = (float) $Image['x'];
        $Image['y'] = (float) $Image['y'];
        $Image['w'] = (float) $Image['w'];
        $Image['h'] = (float) $Image['h'];
        $Image['link'] = ($Image['link']) ? $Image['link'] : null;
        $image_to_put = 'www/gallery/img/noimage.jpg';
        if ($Image['file'] === '%logo%') {
//            $image_to_put = "www/gallery/img/_local/factux.jpg";//logo_img();
            $image_to_put = logo_img();
        }

        $Image['hidden'] = (isset($Image['hidden'])) ? $Image['hidden'] : 0;
        $angle = (isset($Image['angle'])) ? $Image['angle'] : 0;
        if (!$Image['hidden']) {
            $this->RotatedImage($image_to_put, $Image['x'], $Image['y'], $Image['w'], $Image['h'], $angle);
        }
    }

    function block_QR($line) {
        $params = json_decode($line['params'], true);
        $QR = $params['QR'];
        $QR_bg = $params['QR_background'];
        $QR_color = $params['QR_color'];
        $QR_content = $this->template($params['QR_content']);
        if ($QR_content == '') {
            $QR_content = 'Get this invoice in others format: json, xml, peppol, etc here: https://factuz.com';
        }
        $QR['hidden'] = (isset($QR['hidden'])) ? $QR['hidden'] : 0;
        if (!$QR['hidden']) {
            $this->SetX(-10);
            $this->SetY(10);
            $qrcode = new QRcode($QR_content, 'L'); // L M Q H
            $qrcode->displayFPDF($this, $QR['x'], $QR['y'], $QR['w'], array($QR_bg['r'], $QR_bg['g'], $QR_bg['b']), array($QR_color['r'], $QR_color['g'], $QR_color['b']));
//            $this->Image($image_to_put, $Image['x'], $Image['y'], $Image['w'], $Image['h'], $Image['type']);
        }
    }

    function block_line($row) {
        $params = json_decode($row['params'], true);
        $Line = $params['Line'];
        $hidden = (isset($Line['hidden'])) ? $Line['hidden'] : 0;
        $dash_black = (isset($Line['dash']['black'])) ? $Line['dash']['black'] : false;
        $dash_white = (isset($Line['dash']['white'])) ? $Line['dash']['white'] : false;
        if (!$hidden) {
//            //Gruezo de la linea
            if ($Line['width']) {
                $this->SetLineWidth($Line['width']);
            }
//            // Color de la linea
            if ($params['SetDrawColor']) {
                $this->SetDrawColor($params['SetDrawColor']['r'], $params['SetDrawColor']['g'], $params['SetDrawColor']['b']);
            }
            $this->SetDash($dash_black, $dash_white); //4mm on, 2mm off                  
            $this->Line($Line['x1'], $Line['y1'], $Line['x2'], $Line['y2']);
            $this->SetDash(); //restores no dash
//            // RESET
            if ($params['SetDrawColor']) {
                $this->SetDrawColor(null);
            }
            if ($Line['width']) {
                $this->SetLineWidth(0.2);
            }
        }
    }

    function block_link($row) {
        
    }

    function block_ln($line) {

        $params = json_decode($line['params'], true);
        $Ln = $params['Ln'];

        $hidden = (isset($Ln['hidden'])) ? $Ln['hidden'] : 0;

        if (!$hidden) {
            $this->Ln($Ln['h']);
        }
    }

    function block_rect($line) {
        $params = json_decode($line['params'], true);
        $Rect = $params['Rect'];
        $style_array = $params['Rect']['style'];
        $hidden = (isset($Rect['hidden']) && $Rect['hidden'] == 1 ) ? 1 : 0;
        $dash_black = (isset($Rect['dash']['black'])) ? $Rect['dash']['black'] : false;
        $dash_white = (isset($Rect['dash']['white'])) ? $Rect['dash']['white'] : false;
        $corners_array = (isset($params['Rect']['corners'])) ? $params['Rect']['corners'] : array("1234");
        $corners = "";
        foreach ($corners_array as $key => $corner) {
            $corners = $corners . $corner;
        }
        $radius = (isset($params['Rect']['corners']['radius'])) ? $params['Rect']['corners']['radius'] : 0;
        ////////////////////////////////////////////////////////////////////////
        if (!$hidden) {
            $style = "";
            foreach ($style_array as $key => $s) {
                $style = $style . $s;
            }


            $SetDrawColor = $params['SetDrawColor'];
            $SetFillColor = $params['SetFillColor'];

            if ($SetDrawColor) {
                $this->SetDrawColor($SetDrawColor['r'], $SetDrawColor['g'], $SetDrawColor['b']);
            }
            if ($SetFillColor) {
                $this->SetFillColor($SetFillColor['r'], $SetFillColor['g'], $SetFillColor['b']);
            }

            $this->SetDash($dash_black, $dash_white); //4mm on, 2mm off                     
            //$this->Rect($Rect['x'], $Rect['y'], $Rect['w'], $Rect['h'], $style);

            $this->RoundedRect($Rect['x'], $Rect['y'], $Rect['w'], $Rect['h'], $radius, $corners, $style);

            $this->SetDash(); //restores no dash
            //

            if ($SetDrawColor) {
                $this->SetDrawColor(0, 0, 0);
            }

            if ($SetFillColor) {
                $this->SetFillColor(0, 0, 0);
            }
        }
    }

    function block_text($line) {

        $params = json_decode($line['params'], true);
        $Text = $params['Text'];
        $Text['hidden'] = (isset($Text['hidden']) && $Text['hidden']) ? 1 : 0;
        $translate = (isset($Text['translate']) && $Text['translate']) ? 1 : 0;
        $dash_black = (isset($Text['dash']['black'])) ? $Text['dash']['black'] : false;
        $dash_white = (isset($Text['dash']['white'])) ? $Text['dash']['white'] : false;
        $angle = (isset($Text['angle'])) ? $Text['angle'] : 0;
        $label = $this->template($Text['label'], $translate);
        if (!$Text['hidden']) {

            ##############################################################
            ##############################################################
            ##############################################################
            $SetFont = $params['SetFont'];
            $SetTextColor = $params['SetTextColor'];
            $SetDrawColor = $params['SetDrawColor'];
            $SetFillColor = $params['SetFillColor'];
            ////////////////////////////////////////////////////////////////////
            if ($SetFont) {
                $format = "";
                foreach ($SetFont['format'] as $key => $f) {
                    if ($f == 'R') {
                        $f = "";
                    }
                    $format = $format . $f;
                }
                $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
            }
            ////////////////////////////////////////////////////////////////////
            if ($SetTextColor) {
                $this->SetTextColor((int) $SetTextColor['r'], (int) $SetTextColor['g'], (int) $SetTextColor['b']);
            }
            if ($SetDrawColor) {
                $this->SetDrawColor((int) $SetDrawColor['r'], (int) $SetDrawColor['g'], (int) $SetDrawColor['b']);
            }
            if ($SetFillColor) {
                $this->SetFillColor((int) $SetFillColor['r'], (int) $SetFillColor['g'], (int) $SetFillColor['b']);
            }
            ##############################################################
            ##############################################################
            ##############################################################
            $this->RotatedText($Text['x'], $Text['y'], $label, $angle);

            if ($SetTextColor) {
                $this->SetTextColor(0, 0, 0);
            }
            if ($SetDrawColor) {
                $this->SetDrawColor(0, 0, 0);
            }
            if ($SetFillColor) {
                $this->SetFillColor(0, 0, 0);
            }
        }
    }

    function block_write($line) {

        $params = json_decode($line['params'], true);
        $Write = $params['Write'];

        $label = $this->template($Write['label']);

        $hidden = (isset($Write['Write']['hidden'])) ? $Write['Write']['hidden'] : 0;

        $dash_black = (isset($Write['dash']['black'])) ? $Write['dash']['black'] : false;
        $dash_white = (isset($Write['dash']['white'])) ? $Write['dash']['white'] : false;

        if (!$hidden) {

            ##############################################################
            ##############################################################
            ##############################################################
            $SetFont = $params['SetFont'];
            $SetTextColor = $params['SetTextColor'];

            ////////////////////////////////////////////////////////////////////
            if ($SetFont) {
                $format = "";
                foreach ($SetFont['format'] as $key => $f) {
                    if ($f == 'R') {
                        $f = "";
                    }
                    $format = $format . $f;
                }
                $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
            }
            ////////////////////////////////////////////////////////////////////
            if ($SetTextColor) {
                $this->SetTextColor((int) $SetTextColor['r'], (int) $SetTextColor['g'], (int) $SetTextColor['b']);
            }
            ##############################################################
            ##############################################################
            ##############################################################

            $this->SetDash($dash_black, $dash_white); //4mm on, 2mm off               
            $this->Write($Write['h'], $label, $Write['link']);
            $this->SetDash(); //restores no dash
            /////////////////////////////////////////////////////////////////////
            if ($SetTextColor) {
                $this->SetTextColor(0, 0, 0);
            }

            ////////////////////////////////////////////////////////////////////
        }
    }

    function block_addpage($line) {

        $params = json_decode($line['params'], true);
        $AddPage = $params['AddPage'];

        $hidden = (isset($params['AddPage']['hidden'])) ? $params['AddPage']['hidden'] : 0;

        if (!$hidden) {
            $this->AddPage($AddPage['orientation'], $AddPage['size'], $AddPage['rotation']);
        }
    }

    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################

    function Rotate($angle, $x = -1, $y = -1) {
        if ($x == -1)
            $x = $this->x;
        if ($y == -1)
            $y = $this->y;
        if ($this->angle != 0)
            $this->_out('Q');
        $this->angle = $angle;
        if ($angle != 0) {
            $angle *= M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    function _endpage() {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

    function RotatedText($x, $y, $txt, $angle) {
//Rotation du texte autour de son origine
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

    function RotatedImage($file, $x, $y, $w, $h, $angle) {
//Rotation de l'image autour du coin supérieur gauche
        $this->Rotate($angle, $x, $y);
        $this->Image($file, $x, $y, $w, $h);
        $this->Rotate(0);
    }

// http://www.fpdf.org/fr/script/script35.php
    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '') {
        $k = $this->k;
        $hp = $this->h;
        if ($style == 'F')
            $op = 'f';
        elseif ($style == 'FD' || $style == 'DF')
            $op = 'B';
        else
            $op = 'S';
        $MyArc = 4 / 3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m', ($x + $r) * $k, ($hp - $y) * $k));

        $xc = $x + $w - $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - $y) * $k));
        if (strpos($corners, '2') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $y) * $k));
        else
            $this->_Arc($xc + $r * $MyArc, $yc - $r, $xc + $r, $yc - $r * $MyArc, $xc + $r, $yc);

        $xc = $x + $w - $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $yc) * $k));
        if (strpos($corners, '3') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - ($y + $h)) * $k));
        else
            $this->_Arc($xc + $r, $yc + $r * $MyArc, $xc + $r * $MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x + $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - ($y + $h)) * $k));
        if (strpos($corners, '4') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - ($y + $h)) * $k));
        else
            $this->_Arc($xc - $r * $MyArc, $yc + $r, $xc - $r, $yc + $r * $MyArc, $xc - $r, $yc);

        $xc = $x + $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $yc) * $k));
        if (strpos($corners, '1') === false) {
            $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $y) * $k));
            $this->_out(sprintf('%.2F %.2F l', ($x + $r) * $k, ($hp - $y) * $k));
        } else
            $this->_Arc($xc - $r, $yc - $r * $MyArc, $xc - $r * $MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3) {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1 * $this->k, ($h - $y1) * $this->k,
                        $x2 * $this->k, ($h - $y2) * $this->k, $x3 * $this->k, ($h - $y3) * $this->k));
    }

    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
//http://www.fpdf.org/en/script/script33.php

    function SetDash($black = null, $white = null) {
        if ($black !== null)
            $s = sprintf('[%.3F %.3F] 0 d', $black * $this->k, $white * $this->k);
        else
            $s = '[] 0 d';
        $this->_out($s);
    }

    #############################################################################
    ############################################################################
    ############################################################################

    // http://www.fpdf.org/en/script/script100.php
    function DrawGrid() {

        if ($this->grid === true) {
            $spacing = 5;
        } else {
            $spacing = $this->grid;
        }
        $this->SetDrawColor(204, 255, 255);
        $this->SetLineWidth(0.35);
        for ($i = 0; $i < $this->w; $i += $spacing) {
            $this->Line($i, 0, $i, $this->h);
        }
        for ($i = 0; $i < $this->h; $i += $spacing) {
            $this->Line(0, $i, $this->w, $i);
        }
        $this->SetDrawColor(0, 0, 0);

        $x = $this->GetX();
        $y = $this->GetY();
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(204, 204, 204);
        for ($i = 20; $i < $this->h; $i += 20) {
            $this->SetXY(1, $i - 3);
            $this->Write(4, $i);
        }
        for ($i = 20; $i < (($this->w) - ($this->rMargin) - 10); $i += 20) {
            $this->SetXY($i - 1, 1);
            $this->Write(4, $i);
        }
        $this->SetXY($x, $y);
    }

    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
}
