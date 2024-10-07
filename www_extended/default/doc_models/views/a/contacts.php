<?php

include pdf_template("a");

class PDF_CONTACTS extends A {

    public $_contacts;

    function setPdfContacts($type = null) {
//        vardump($type);
//        si pongo sin comillas no coje la opcion 0
//        $type = Todos, empresas, particulares

        switch ($type) {
            case '1': // // Empresas si pongo sin comillas no coje la opcion 0
                $this->_contacts = contacts_list_with_tva();
                break;
            case '0': // Indiviculos si pongo sin comillas no coje la opcion 0
//                $this->_contacts = contacts_list_by_type(0);
                $this->_contacts = contacts_export_list_individual_only();
                break;

            case 'all': // si pongo sin comillas no coje la opcion 0
                $this->_contacts = contacts_list();
                break;

            default: // si pongo sin comillas no coje la opcion 0
                $this->_contacts = contacts_list();
                break;
        }
//        $this->setA(1022);
    }

    function getContacts() {
        return $this->_contacts;
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
    function items_header($translate = true, $line = null) {
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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }
        ////////////////////////////////////////////////////////////////////////
        // Se muestra el conor o no?
        $color = ( $cell['fill'] ) ? 1 : 0;
        // L, C, R aliniamiento
        $align = $cell['align'];
        $h = ($cell['h']) ? $cell['h'] : 5;
        $ln = ($cell['ln']) ? $cell['ln'] : 0;

        ##############################################################
        ##############################################################
        $this->Cell(10, $h, '#', $border, $ln, $align, $color);
        $this->Cell(12, $h, pdf_tr("Id"), $border, $ln, $align, $color);
        $this->Cell(12, $h, pdf_tr("Owner"), $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr('Type'), $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr('Title'), $border, $ln, $align, $color);
        $this->Cell(78, $h, pdf_tr('Name'), $border, $ln, $align, $color);
        $this->Cell(78, $h, pdf_tr('Lastname'), $border, $ln, $align, $color);
        $this->Cell(40, $h, pdf_tr('Vat'), $border, $ln, $align, $color);
        $this->Cell(00, $h, pdf_tr('Discounts'), $border, 1, $align, $color);
        ##############################################################
        ##############################################################
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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $i = 1;
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        $fill = ( $cell['fill'] ) ? 1 : 0;

        foreach ($this->getContacts() as $key => $contact) {

            $h = ($cell['h']) ? $cell['h'] : 5;
            $ln = ($cell['ln']) ? $cell['ln'] : 0;
            $align = $cell['align'];
            ////////////////////////////////////////////////////////////////////
            $id = ($contact['id']);
            $owner_id = $contact["owner_id"];
            $type = $contact["type"];
            $title = $contact["title"];
            $name = contacts_formated_name($contact["name"]);
            $lastname = contacts_formated_lastname($contact["lastname"]);
            $tva = $contact["tva"];
            $discounts = ($contact["discounts"] != 0) ? $contact["discounts"] . " %" : null;

            // una linea a la vez y a condicion que sedesee llenar
            $color = ( $i % 2 == 0 && $fill ) ? 1 : 0;

            $this->Cell(10, $h, $i, $border, $ln, $align, $color);
            $this->Cell(12, $h, $id, $border, $ln, $align, $color);
            $this->Cell(12, $h, $owner_id, $border, $ln, $align, $color);
            $this->Cell(10, $h, $type, $border, $ln, $align, $color);
            $this->Cell(10, $h, $title, $border, $ln, $align, $color);
            $this->Cell(78, $h, $name, $border, $ln, $align, $color);
            $this->Cell(78, $h, $lastname, $border, $ln, $align, $color);
            $this->Cell(40, $h, $tva, $border, $ln, $align, $color);
            $this->Cell(00, $h, $discounts, $border, 1, $align, $color);

//            $this->Cell(00, 05, '', $border, 1, 'R', $color);

            $i++;
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
        }

        // La ultima linea de los items
        $this->Cell(0, 2.3, "", '1', 1, 'R', 0);

        $this->Ln();
    }

    function xxxtemplate($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Contacts');

        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;
        ////////////////////////////////////////////////////////////////////////
        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ??'', $txt_tr));
            }
        }

        return pdf_textr($txt_tr);
    }
}
