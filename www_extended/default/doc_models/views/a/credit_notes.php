<?php

include pdf_template("a");

class PDF_CREDIT_NOTE extends A {

    public $_credit_note;

    function setPdfCredit_note($id) {
        $this->_credit_note = new Credit_notes($id);
//        $this->setA(1022);
    }

    function getCredit_note() {
        return $this->_credit_note;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {
        $this->addElements("body");
    }

    function Footer() {
        parent::Footer();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function items($translate = true, $line = null) {
        global $id;

        $params = json_decode($line['params'], true);
        $cell = $params['Cell'];

//        vardump($line);
//        vardump($params);
//        vardump($cell);
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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $totalitems = 0;
        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $discounts = 0;
        $discounts_mode = 0;
        $totaldiscounts = 0;
        $i = 1;
        ////////////////////////////////////////////////////////////////////////
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        foreach (credit_note_lines_list_by_credit_note_id($id) as $key => $ii) {


            $totalitems = $totalitems + ($ii['quantity'] );
            $totalprice = $totalprice + ($ii['value'] * $ii['quantity'] );
            $subtotal = $subtotal + $ii['subtotal'];
            $totaltax = $totaltax + $ii['totaltax'];
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]);
//            $totaldiscounts = $totaldiscounts + 0;
//            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "";
            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            // fill el color o no
            // fill el color o no

            $fill = (isset($cell['fill']) && $cell['fill'] ) ? true : false;

            $color = ( $i % 2 == 0 ) ? $fill : 0;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 05, $this->get_Pdf_alto_linea() * 0.7, $ii['quantity'], $border, 0, 'L', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 07, $this->get_Pdf_alto_linea() * 0.7, $ii['code'], $border, 0, "L", $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 85, $this->get_Pdf_alto_linea() * 0.7, '', $border, 0, "L", $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price']), $border, 0, 'R', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price'] * $ii['quantity']), $border, 0, 'R', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "$discounts_mode " . moneda($ii['totaldiscounts']), $border, 0, 'R', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal']), $border, 0, 'R', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['totaltax']) . " (" . $ii['tax'] . "%) ", $border, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal'] + $ii['totaltax']), $border, 1, 'R', $color);
// MULTI CELDA
            $this->SetY($this->GetY() - 3); // distancia desde arriba
            $this->SetX($this->GetX() + 22);
            $this->MultiCell(
                    (
                    $this->get_Pdf_ancho() / 100) * 35, // w
                    $this->get_Pdf_alto_linea() * 0.5, // h
                    pdf_textr($ii['description']), // text                    
                    $border, // border
                    'L', // align
                    $color
            );
            $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
            $i++;

            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
//            $PageNo = ( $this->PageNo() != $PageNo ) ? $this->PageNo() : $PageNo;
            if ($PageNo != $this->PageNo()) {
                $newpage = true;
                $PageNo = $this->PageNo();
            }

            if ($newpage) {
//                $this->Cell(50, 10, "Nueva pagina", 1, 1);
                $newpage = false;
            }
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
        }

        // La ultima linea de los items
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.15, 0, 0, 1, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.15, 0, 0, 1, 'R', 0);
//        $this->SetFont('Arial', '', 8);
        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
//        $this->Ln();
        ## TVA     
        ## TVA            
        ## TVA            
        ## TVA            
        ## TVA            
        ## TVA            
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 1, 0, "R", 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $lang), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Discounts", $lang), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Base taxable", $lang), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("% Tva", $lang), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Tva", $lang), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $lang), 1, 1, 'R', 0);
//
//        $total_items_all_tax = null;
//
//        foreach (tax_list() as $key => $tax) {
//
//            $total_items_by_tax = credit_note_lines_total_items_by_tax($id, $tax['value']);
//            $total_items_all_tax = $total_items_all_tax + $total_items_by_tax;
//
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', "L", 0, "R", 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(credit_note_lines_sum_lines_by_tax($id, $tax['value'])), "L", 0, "R", 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(0), "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(credit_note_lines_sum_lines_by_tax($id, $tax['value'])), "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[value] %", "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(credit_note_lines_sum_lines_by_tax($id, $tax['value'])), "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
//        }
//
//
//        ## Totales TVA
//        // $total_items_all_tax
//        // No pongo el total de articulos que da error en la suma
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS      
        // Total pago recibidos
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Advance", $lang), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($total_advance), 'LR', 1, 'R', 0);
//        ## Total a payer
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//
//        $this->SetFont('Arial', '', 15);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_tr("To pay", $lang), 0, 0, 'R', 0);
//
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda($tvac - $total_advance), "RLTB", 1, 'R', 0);

        $this->SetFont('Arial', '', 6);

        $this->Ln();
    }

    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Credit notes');

        $this->setTag('%id%', str_pad($this->getCredit_note()->getId(), 1, "0", STR_PAD_LEFT));
        $this->setTag('%xid%', str_pad($this->getCredit_note()->getId(), 2, "0", STR_PAD_LEFT));
        $this->setTag('%xxid%', str_pad($this->getCredit_note()->getId(), 3, "0", STR_PAD_LEFT));
        $this->setTag('%xxxid%', str_pad($this->getCredit_note()->getId(), 4, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxid%', str_pad($this->getCredit_note()->getId(), 5, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxid%', str_pad($this->getCredit_note()->getId(), 6, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxid%', str_pad($this->getCredit_note()->getId(), 7, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxid%', str_pad($this->getCredit_note()->getId(), 8, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxid%', str_pad($this->getCredit_note()->getId(), 9, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxxid%', str_pad($this->getCredit_note()->getId(), 10, "0", STR_PAD_LEFT));

        ########################################################################
        ########################################################################
        ########################################################################
        ########################################################################
        $office = new Company();
        $office->setCompany($this->getCredit_note()->getOffice_id());
        //
        $office_bank = ($office->getBankBydefault());
        //
        $ab = addresses_billing_by_contact_id($office->getId());
        $ad = addresses_delivery_by_contact_id($office->getId());

        
        $this->setTag('%office_id%', $this->getCredit_note()->getOffice_id());
        $this->setTag('%office_name%', $office->getName());
        $this->setTag('%office_logo%', logo_img());

        $this->setTag('%office_slogan%', $office->getName());
        $this->setTag('%office_tva%', contacts_field_id('tva', $office->getId())); // decreped
        $this->setTag('%office_vat%', contacts_field_id('tva', $office->getId()));

        foreach (directory_names_list() as $key => $mcd) {
            if ($mcd['name']) {
                $this->setTag('%office_' . strtolower($mcd['name']) . '%', directory_by_contact_name($office->getId(), $mcd['name']) ?? "");
            }
        }

        if ($ab) {
            $this->setTag('%office_address_billing_id%', $ab['id']);
            $this->setTag('%office_address_billing_address%', $ab['address']);
            $this->setTag('%office_address_billing_number%', $ab['number']);
            $this->setTag('%office_address_billing_postcode%', $ab['postcode']);
            $this->setTag('%office_address_billing_barrio%', $ab['barrio']);
            $this->setTag('%office_address_billing_sector%', $ab['sector']);
            $this->setTag('%office_address_billing_ref%', $ab['ref']);
            $this->setTag('%office_address_billing_city%', $ab['city']);
            $this->setTag('%office_address_billing_province%', $ab['province']);
            $this->setTag('%office_address_billing_region%', $ab['region']);
            $this->setTag('%office_address_billing_country_code%', $ab['country']);
            $this->setTag('%office_address_billing_country%', (isset($ab['country'])) ? countries_name($ab['country']) : '');
        }
        if ($ad) {
            $this->setTag('%office_address_delivery_id%', $ad['id']);
            $this->setTag('%office_address_delivery_address%', $ad['address']);
            $this->setTag('%office_address_delivery_number%', $ad['number']);
            $this->setTag('%office_address_delivery_postcode%', $ad['postcode']);
            $this->setTag('%office_address_delivery_barrio%', $ad['barrio']);
            $this->setTag('%office_address_delivery_sector%', $ad['sector']);
            $this->setTag('%office_address_delivery_ref%', $ad['ref']);
            $this->setTag('%office_address_delivery_city%', $ad['city']);
            $this->setTag('%office_address_delivery_province%', $ad['province']);
            $this->setTag('%office_address_delivery_region%', $ad['region']);
            $this->setTag('%office_address_delivery_country_code%', $ad['country']);
            $this->setTag('%office_address_delivery_country%', (isset($ab['country'])) ? countries_name($ad['country']) : '');
        }

        ////////////////////////////////////////////////////////////////////
        $this->setTag('%office_bank%', $office_bank['bank'] ?? '');
        $this->setTag('%office_bank_account_number%', $office_bank['account_number'] ?? '');
        $this->setTag('%office_bank_bic%', $office_bank['bic'] ?? '');
        $this->setTag('%office_bank_iban%', $office_bank['iban'] ?? '');

        ########################################################################
        ########################################################################
        ########################################################################
        ########################################################################
//
//
//
//
//        $this->setTag('%budget_id%', $this->getCredit_note()->getBudget_id());
//        $this->setTag("%credit_note_id%", $this->getCredit_note()->getId());
        $this->setTag("%client_id%", $this->getCredit_note()->getClient_id());
//        $this->setTag("%title%", $this->getCredit_note()->getTitle());
//        $this->setTag("%seller_id%", $this->getCredit_note()->getSeller_id());
//        $this->setTag("%date%", $this->getCredit_note()->getDate());
//        $this->setTag("%date_yy%", magia_dates_get_year_from_date($this->getCredit_note()->getDate())); // 1993 > 93        
//        $this->setTag("%date_yyyy%", magia_dates_get_year_from_date($this->getCredit_note()->getDate())); // 1993 > 1993
//        //
//        $this->setTag("%date_m%", $this->getCredit_note()->getDate()); // 5 > 5
//        $this->setTag("%date_mm%", $this->getCredit_note()->getDate()); // 5 > 05
//        $this->setTag("%date_mmm%", $this->getCredit_note()->getDate()); // 5 > May
//        //          
//        $this->setTag("%date_d%", $this->getCredit_note()->getDate()); // 3 > 3
//        $this->setTag("%date_dd%", $this->getCredit_note()->getDate()); // 3 > 03
//        $this->setTag("%date_ddd%", $this->getCredit_note()->getDate()); // 3 > Monday (dia segun la fecha completa)
        //
        $this->setTag("%date_registre%", substr($this->getCredit_note()->getDate_registre(), 0, 10));

        //
//        $this->setTag("%date_expiration%", $this->getCredit_note()->getDate_expiration());
//            
        $this->setTag("%total%", $this->getCredit_note()->getTotal());
        $this->setTag("%tax%", $this->getCredit_note()->getTax());
        $this->setTag("%returned%", $this->getCredit_note()->getReturned());
        //
//        $this->setTag("%total_to_pay%", moneda(($this->getCredit_note()->getTotal() + $this->getCredit_note()->getTax() - $this->getCredit_note()->getReturned())));
        $this->setTag("%total_to_pay%", $this->getCredit_note()->getTotal() + $this->getCredit_note()->getTax());

//        $this->setTag("%balance%", $this->getCredit_note()->getBalance());
        $this->setTag("%comments%", $this->getCredit_note()->getComments());
//        $this->setTag("%r1%", $this->getCredit_note()->getR1());
//        $this->setTag("%r2%", $this->getCredit_note()->getR2());
//        $this->setTag("%r3%", $this->getCredit_note()->getR3());
//        $this->setTag("%fc%", $this->getCredit_note()->getFc());
//        $this->setTag("%date_update%", $this->getCredit_note()->getDate_update());
//        $this->setTag("%days%", $this->getCredit_note()->getDays());
//        $this->setTag("%ce%", $this->getCredit_note()->getCe());
        $this->setTag("%code%", $this->getCredit_note()->getCode());
        $this->setTag("%status_code%", $this->getCredit_note()->getStatus());
//        $this->setTag("%status%", credit_notes_status($this->getCredit_note()->getStatusFormated()));
        ////////////////////////////////////////////////////////////////////
        $this->setTag('%client_id%', $this->getCredit_note()->getClient_id());
        $this->setTag('%client_tva%', $this->getCredit_note()->getClient()->getTva());
        $this->setTag("%client_name%", $this->getCredit_note()->getClient()->getName());
        $this->setTag("%client_lastname%", $this->getCredit_note()->getClient()->getLastname());
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%client_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getCredit_note()->getClient()->getId(), $mdnl['name']));
            }
        }



        ////////////////////////////////////////////////////////////////////////
        $ab = json_decode($this->getCredit_note()->getAddresses_billing(), true);
        $this->setTag("%client_ab_address%", $ab["address"] ?? '');
        $this->setTag('%client_ab_number%', $ab["number"] ?? '');
        $this->setTag('%client_ab_postcode%', $ab["postcode"] ?? '');
        $this->setTag('%client_ab_barrio%', $ab["barrio"] ?? '');
//        $this->setTag('%client_ab_sector%', $ab["sector"]  ?? '');
//        $this->setTag('%client_ab_ref%', $ab["ref"]  ?? '');
        $this->setTag('%client_ab_city%', $ab["city"] ?? '');
//        $this->setTag('%client_ab_province%', $ab["province"]  ?? '');
        $this->setTag('%client_ab_region%', $ab["region"] ?? '');
//        $this->setTag('%client_ab_country_code%', $ab["country"]  ?? '');
        $this->setTag('%client_ab_country%', (isset($ab["country"])) ? countries_country_by_country_code($ab["country"]) : '');
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        $ad = json_decode($this->getCredit_note()->getAddresses_billing(), true);
        $this->setTag("%client_ad_address%", $ad["address"] ?? '');
        $this->setTag('%client_ad_number%', $ad["number"] ?? '');
        $this->setTag('%client_ad_postcode%', $ad["postcode"] ?? '');
        $this->setTag('%client_ad_barrio%', $ad["barrio"] ?? '');
//        $this->setTag('%client_ad_sector%', $ad["sector"] ?? '');
//        $this->setTag('%client_ad_ref%', $ad["ref"]  ?? '');
        $this->setTag('%client_ad_city%', $ad["city"] ?? '');
//        $this->setTag('%client_ad_province%', $ad["province"] ?? '');
        $this->setTag('%client_ad_region%', $ad["region"] ?? '');
//        $this->setTag('%client_ad_country_code%', $ad["country"] ?? '');
        $this->setTag('%client_ad_country%', (isset($ad["country"])) ? countries_country_by_country_code($ad["country"]) : '');
        ////////////////////////////////////////////////////////////////////

        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;
        //$txt_tr = ($translate) ? pdf_tr($txt, '', 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }

        return pdf_textr($txt_tr);
    }
}
