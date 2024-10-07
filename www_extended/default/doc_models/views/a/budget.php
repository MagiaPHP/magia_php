<?php

include pdf_template("a");

class PDF_BUDGET extends A {

    public $_budget;

    function setPdfBudget($id) {
        $this->_budget = new Budgets();
        $this->_budget->setBudgets($id);
        $this->_budget->setSender(1022);
        $this->_budget->setClient(budgets_field_id('client_id', $id));

        $this->setA($this->_budget->getSender()->getId());
    }

    function getBudget() {
        return $this->_budget;
    }

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
    //// I T E M S /////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function items($translate = true, $line = null) {
        global $id;

        global $u_owner_id;

        $params = json_decode($line['params'], true);
        $cell = $params['Cell'];

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

        if ($debug_pdf) {
            $border = 1;
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
        $is_separator = false;
        $is_note = false;

        foreach (budget_lines_list_by_budget_id($id) as $key => $ii) {

            $is_separator = (strpos($ii['description'], '---') === false) ? 0 : 1;
            $is_note = (strpos($ii['description'], '***') === false) ? 0 : 1;

            $totalitems = $totalitems + ($ii['quantity'] );
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] );
            $subtotal = $subtotal + $ii['subtotal'];
            $totaltax = $totaltax + $ii['totaltax'];
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]);
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "";

            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            $color = ( $i % 2 == 0 ) ? $cell['fill'] : 0;

            //vardump($cell); 
            ////////////////////////////////////////////////////////////////////
//            if ($is_separator) {
//                $this->Cell(00, 5, $ii['description'], 1, 0, 'L', $color);
//            } else {
            ////////////////////////////////////////////////////////////////////
//            $border = 1 ; 
            if ($is_separator || $is_note) {
                if ($is_separator) {
                    // despues del 3 caracter regresa la cadena
                    $description = substr($ii['description'], 3);
                    $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.7, pdf_textr($description), 'B', 1, 'C', 1);
                } else {
                    // despues del 3 caracter regresa la cadena
                    $description = substr($ii['description'], 3);
                    //$this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.7, pdf_textr($description), 'B', 1, 'L', 1);
                    $this->MultiCell(0, $this->get_Pdf_alto_linea() * 0.7, pdf_textr($description), $border, 'L', $fill);
                }
            } else {
                $this->Cell(($this->get_Pdf_ancho() / 100) * 03.00, $cell['h'], $ii['quantity'], $border, 0, 'L', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 40.00, $cell['h'], '', $border, 0, "R", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 09.00, $cell['h'], moneda($ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 09.00, $cell['h'], moneda($ii['quantity'] * $ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 09.00, $cell['h'], "$discounts_mode " . moneda($ii['totaldiscounts']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 09.00, $cell['h'], moneda($ii['subtotal']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 12.00, $cell['h'], moneda($ii['totaltax']) . " (" . $ii['tax'] . "%)", $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 09.00, $cell['h'], moneda($ii['subtotal'] + $ii['totaltax']), $border, 1, 'R', $color);
//                
//                
//                
                // MULTI CELDA
                $this->SetY($this->GetY() - 5); // distancia desde arriba
                $this->SetX($this->GetX() + 5); // desde la izquierda
                $this->MultiCell(
                        (
                        $this->get_Pdf_ancho() / 100) * 50, // w
                        $cell['h'], // h
                        pdf_textr($ii['description']), // text                    
                        $border, // border
                        'L', // align
                        $color
                );

                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell            
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
                $i++;
            }
        }

        // La ultima linea de los items
        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.15, "", 'T', 1, 'R', 0);

//        $this->SetFont('Arial', '', 8);
        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
//        $this->Ln();
        ## TVA     
        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr('Items')), 1, 0, "R", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Total", $this->getLang())), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Discounts", $this->getLang())), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Base taxable", $this->getLang())), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("% Tva", $this->getLang())), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Total Tva", $this->getLang())), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Total", $this->getLang())), 1, 1, 'R', 0);

        $total_items_all_tax = null;

        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

        foreach ($tax_by_country as $key => $tax) {

            $total_items_by_tax = budget_lines_total_items_by_tax($id, $tax['tax']);

            $total_items_all_tax = $total_items_all_tax + $total_items_by_tax;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, budget_lines_total_items_by_tax($id, $tax['tax']), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_sum_lines_by_tax($id, $tax['tax'])), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_sum_lines_by_tax($id, $tax['tax']) - budget_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[tax] %", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_total_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, $total_items_all_tax, 1, 0, 'R', 0);
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
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_textr(pdf_tr("Total Advance", $lang)), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($total_advance), 'LR', 1, 'R', 0);
        ## Total a payer
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

//        $this->SetFont('Arial', '', 15);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_textr(pdf_tr("Total", $lang)), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda($tvac - $total_advance), "RLTB", 1, 'R', 0);
        $this->SetFont('Arial', '', 6);

        $this->Ln();
    }

    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Budget');

        $this->setTag('%id%', str_pad($this->getBudget()->getId(), 1, "0", STR_PAD_LEFT));
        $this->setTag('%xid%', str_pad($this->getBudget()->getId(), 2, "0", STR_PAD_LEFT));
        $this->setTag('%xxid%', str_pad($this->getBudget()->getId(), 3, "0", STR_PAD_LEFT));
        $this->setTag('%xxxid%', str_pad($this->getBudget()->getId(), 4, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxid%', str_pad($this->getBudget()->getId(), 5, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxid%', str_pad($this->getBudget()->getId(), 6, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxid%', str_pad($this->getBudget()->getId(), 7, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxid%', str_pad($this->getBudget()->getId(), 8, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxid%', str_pad($this->getBudget()->getId(), 9, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxxid%', str_pad($this->getBudget()->getId(), 10, "0", STR_PAD_LEFT));
//
        $this->setTag('%invoice_id%', $this->getBudget()->getInvoice_id());
//        $this->setTag("%credit_note_id%", $this->getBudget()->getCredit_note_id());
        $this->setTag("%client_id%", $this->getBudget()->getClient_id());
//        $this->setTag("%title%", $this->getBudget()->getTitle());
        $this->setTag("%seller_id%", $this->getBudget()->getSeller_id());

        $this->setTag("%date%", $this->getBudget()->getDate());
        $this->setTag("%date_yy%", magia_dates_get_year_from_date($this->getBudget()->getDate())); // 1993 > 93        
        $this->setTag("%date_yyyy%", magia_dates_get_year_from_date($this->getBudget()->getDate())); // 1993 > 1993
        //
        $this->setTag("%date_m%", $this->getBudget()->getDate()); // 5 > 5
        $this->setTag("%date_mm%", $this->getBudget()->getDate()); // 5 > 05
        $this->setTag("%date_mmm%", $this->getBudget()->getDate()); // 5 > May
        //          
        $this->setTag("%date_d%", $this->getBudget()->getDate()); // 3 > 3
        $this->setTag("%date_dd%", $this->getBudget()->getDate()); // 3 > 03
        $this->setTag("%date_ddd%", $this->getBudget()->getDate()); // 3 > Monday (dia segun la fecha completa)
        //
        $this->setTag("%date_registre%", $this->getBudget()->getDate_registre());
//        $this->setTag("%date_expiration%", $this->getBudget()->getDate_expiration());
//            
        $this->setTag("%total%", moneda($this->getBudget()->getTotal()));
        $this->setTag("%tax%", moneda($this->getBudget()->getTax()));
        $this->setTag("%total_to_pay%", moneda(($this->getBudget()->getTotal() + $this->getBudget()->getTax())));
        $this->setTag("%balance%", moneda($this->getBudget()->getBalance()));
        $this->setTag("%comments%", ($this->getBudget()->getComments()));
        //$this->setTag("%r1%", $this->getBudget()->getR1());
        //$this->setTag("%r2%", $this->getBudget()->getR2());
        //$this->setTag("%r3%", $this->getBudget()->getR3());
//        $this->setTag("%fc%", $this->getBudget()->getFc());
        $this->setTag("%date_update%", $this->getBudget()->getDate_update());
        $this->setTag("%days%", $this->getBudget()->getDays());
        $this->setTag("%ce%", $this->getBudget()->getCe());
        $this->setTag("%code%", $this->getBudget()->getCode());
//        $this->setTag("%type%", $this->getBudget()->getType());
        $this->setTag("%status_code%", $this->getBudget()->getStatus());
        $this->setTag("%status%", budget_status_by_status($this->getBudget()->getStatus()));
        ////////////////////////////////////////////////////////////////////
        $this->setTag('%client_id%', $this->getBudget()->getClient()->getId());
        $this->setTag('%client_tva%', $this->getBudget()->getClient()->getTva());
        $this->setTag("%client_name%", $this->getBudget()->getClient()->getName());
        $this->setTag("%client_lastname%", $this->getBudget()->getClient()->getLastname());
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////

        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%client_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getBudget()->getClient()->getId(), $mdnl['name']));
            }
        }


        //////////////////////////////////////////////////////////////////

        $ab = json_decode($this->getBudget()->getAddresses_billing(), true);
        
        $this->setTag("%client_ab_address%", $ab["address"]);
        $this->setTag('%client_ab_number%', $ab["number"]);
        $this->setTag('%client_ab_postcode%', $ab["postcode"]);
        $this->setTag('%client_ab_barrio%', $ab["barrio"]);
        
//        $this->setTag('%client_ab_sector%', $ab["sector"]);
//        $this->setTag('%client_ab_ref%', $ab["ref"]);
        $this->setTag('%client_ab_city%', $ab["city"]);
//        $this->setTag('%client_ab_province%', $ab["province"]);
        $this->setTag('%client_ab_region%', $ab["region"]);
//        $this->setTag('%client_ab_country_code%', $ab["country"]);
        $this->setTag('%client_ab_country%', countries_country_by_country_code($ab["country"]));
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////

        $ad = json_decode($this->getBudget()->getAddresses_billing(), true);
        $this->setTag("%client_ad_address%", $ad["address"]);
        $this->setTag('%client_ad_number%', $ad["number"]);
        $this->setTag('%client_ad_postcode%', $ad["postcode"]);
        $this->setTag('%client_ad_barrio%', $ad["barrio"]);
//        $this->setTag('%client_ad_sector%', $ad["sector"]);
//        $this->setTag('%client_ad_ref%', $ad["ref"]);
        $this->setTag('%client_ad_city%', $ad["city"]);
//        $this->setTag('%client_ad_province%', $ad["province"]);
        $this->setTag('%client_ad_region%', $ad["region"]);
//        $this->setTag('%client_ad_country_code%', $ad["country"]);
        $this->setTag('%client_ad_country%', countries_country_by_country_code($ad["country"]));
        ////////////////////////////////////////////////////////////////////


        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }


        $txt_tr = str_replace('&amp;', '&', $txt_tr);
        $txt_tr = str_replace('&quot;', "'", $txt_tr);

        return pdf_textr($txt_tr);
    }
}
