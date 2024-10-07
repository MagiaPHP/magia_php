<?php

class Invoices {

    public $_id;
    public $_office_id;
    public $_counter;
    public $_sender; //
    public $_budget_id;
    public $_credit_note_id;
    public $_client_id;
    public $_client; //
    public $_title;
    public $_seller_id;
    public $_addresses_billing; // estas son estaticas en formato json
    public $_addresses_delivery; // estas son estaticas en formato json
    public $_date;
    public $_date_registre;
    public $_date_expiration;
    public $_total;
    public $_tax;
    public $_advance;
    public $_balance;
    public $_comments;
    public $_comments_private;
    public $_r1;
    public $_r2;
    public $_r3;
    public $_fc;
    public $_date_update;
    public $_days;
    public $_ce;
    public $_code;
    public $_type;
    public $_status;
    //
    //
    public $_totals = array();
    //
    public $_lines = array();
    //
    public $_export = array();
    // 
    public $_import_errors = array();
    public $_control_code = null;

    function __construct() {
        
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getId_formatted($format_template) {
        // Desglosamos la fecha en año, mes y día
        $year = date('Y', strtotime($this->_date));
        $month = date('m', strtotime($this->_date));
        $day = date('d', strtotime($this->_date));

        // Trimestre basado en el mes
        $trimestre = ceil($month / 3);

        // Placeholder con valores
        $placeholders = [
            '{year}' => $year,
            '{month}' => $month,
            '{day}' => $day,
            '{trimestre}' => $trimestre,
            '{office_id}' => $this->_office_id,
            '{seller_id}' => $this->_seller_id ?? 0,
            '{type}' => $this->_type ?? 0,
            '{counter}' => str_pad($this->_counter, 4, '0', STR_PAD_LEFT), // Añadimos ceros a la izquierda en el counter
            '{id}' => $this->_id
        ];

        // Definir los placeholders válidos
        $valid_placeholders = ['{year}', '{month}', '{day}', '{trimestre}', '{office_id}', '{counter}', '{id}'];

        // Verificar si el formato proporcionado contiene solo placeholders válidos
        $isValidFormat = false;
        foreach ($valid_placeholders as $placeholder) {
            if (strpos($format_template, $placeholder) !== false) {
                $isValidFormat = true;
                break;
            }
        }

        // Si el formato no es válido, usamos un formato por defecto (por ejemplo, solo el ID)
        if (!$isValidFormat) {
            return (string) $this->_id; // Retorna solo el ID si el formato es incorrecto
        }

        // Reemplazamos los placeholders en la plantilla con los valores correspondientes
        $formatted_id = str_replace(array_keys($placeholders), array_values($placeholders), $format_template);

        return $formatted_id;
    }

    function getOffice_id() {
        return $this->_office_id;
    }

    function getCounter() {
        return $this->_counter;
    }

    function getSender() {
        return $this->_sender;
    }

    function getBudget_id() {
        return $this->_budget_id;
    }

    function getCredit_note_id() {
        return $this->_credit_note_id;
    }

    function getClient_id() {
        return $this->_client_id;
    }

    function getClient() {
        return $this->_client;
    }

    function getTitle() {
        return $this->_title;
    }

    function getSeller_id() {
        return $this->_seller_id;
    }

    function getAddresses_billing() {
        return $this->_addresses_billing;
    }

    function getAddresses_delivery() {
        return $this->_addresses_delivery;
    }

    function getDate() {
        return $this->_date;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getDate_expiration() {
        return $this->_date_expiration;
    }

    function getTotal() {
        return $this->_total;
    }

    function getTax() {
        return $this->_tax;
    }

    function getAdvance() {
        return $this->_advance;
    }

    function getBalance() {
        return $this->_balance;
    }

    function getComments() {
        return $this->_comments;
    }

    function getComments_private() {
        return $this->_comments_private;
    }

    function getR1() {
        return $this->_r1;
    }

    function getR2() {
        return $this->_r2;
    }

    function getR3() {
        return $this->_r3;
    }

    function getFc() {
        return $this->_fc;
    }

    function getDate_update() {
        return $this->_date_update;
    }

    function getDays() {
        return $this->_days;
    }

    function getCe() {
        return $this->_ce;
    }

    function getCode() {
        return $this->_code;
    }

    function getType() {
        return $this->_type;
    }

    function getStatus() {
        return $this->_status;
    }

    function getLines() {
        return $this->_lines;
    }

    function getExport() {
        return $this->_export;
    }

    function getImportErrors() {
        return $this->_import_errors;
    }

    function getControlCode() {
        return $this->_control_code;
    }

    // Linea de totales por tax
    function getTotals($tax) {
        return $this->_totals;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setOffice_id($id) {
        $this->_office_id = $id;
    }

    function setCounter($counter) {
//        $this->_counter = invoices_counter_by_invoice_year($this->_id, 2022);
        $this->_counter = $counter;
    }

    function setBudget_id($budget_id) {
        $this->_budget_id = $budget_id;
    }

    function setCredit_note_id($credit_note_id) {
        $this->_credit_note_id = $credit_note_id;
    }

    function setClient_id($client_id) {
        $this->_client_id = $client_id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setSeller_id($seller_id) {
        $this->_seller_id = $seller_id;
    }

    function setAddresses_billing($addresses_billing) {
        $this->_addresses_billing = $addresses_billing;
    }

    function setAddresses_delivery($addresses_delivery) {
        $this->_addresses_delivery = $addresses_delivery;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setDate_expiration($date_expiration) {
        $this->_date_expiration = $date_expiration;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setAdvance($advance) {
        $this->_advance = $advance;
    }

    function setBalance($balance) {
        $this->_balance = $balance;
    }

    function setComments($comments) {
        $this->_comments = $comments;
    }

    function setComments_private($comments_private) {
        $this->_comments_private = $comments_private;
    }

    function setR1($r1) {
        $this->_r1 = $r1;
    }

    function setR2($r2) {
        $this->_r2 = $r2;
    }

    function setR3($r3) {
        $this->_r3 = $r3;
    }

    function setFc($fc) {
        $this->_fc = $fc;
    }

    function setDate_update($date_update) {
        $this->_date_update = $date_update;
    }

    function setDays($days) {
        $this->_days = $days;
    }

    function setCe($ce) {
        $this->_ce = $ce;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setLines($invoice_id) {

        $this->_lines = array_merge($this->_lines, invoice_lines_list_by_invoice_id($invoice_id));
    }

    function setControlCode($control_code) {
        $this->_control_code = $control_code;
    }

    // Linea de totales por tax
    function setTotals($tva, $key, $val) {
        $this->_export['totals'][$tva][$key] = $val;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    function setInvoice($id) {
        $invoices = invoices_details($id);

        $this->_id = $invoices["id"];
        $this->_office_id = $invoices["office_id"];

        $this->_sender = new Company();
        $this->_sender->setCompany(1022);

        $this->_budget_id = $invoices["budget_id"];
        $this->_credit_note_id = $invoices["credit_note_id"];
        $this->_client_id = $invoices["client_id"];
        $this->_client = new Company();
        $this->_client->setCompany($invoices["client_id"]);

        $this->_title = $invoices["title"];
        $this->_seller_id = $invoices["seller_id"];

//        $this->_addresses_billing = json_decode($invoices["addresses_billing"], true);
//        $this->_addresses_delivery = json_decode($invoices["addresses_delivery"], true);
//        
        $this->_addresses_billing = new Addresses();
        $this->_addresses_billing->setAddresses(json_decode_to_array($invoices["addresses_billing"], true)['id']);

        $this->_addresses_delivery = new Addresses();
        $addresses_delivery = json_decode_to_array($invoices["addresses_delivery"], true);
        $addresses_delivery_id = ($addresses_delivery) ? $addresses_delivery['id'] : false;
        $this->_addresses_delivery->setAddresses($addresses_delivery_id);

        $this->_date = $invoices["date"];
        $this->_date_registre = $invoices["date_registre"];
        $this->_date_expiration = $invoices["date_expiration"];
        $this->_total = $invoices["total"];
        $this->_tax = $invoices["tax"];
        // lo que se cobro
        $this->_advance = $invoices["advance"];
        $this->_balance = $invoices["balance"];
        $this->_comments = $invoices["comments"];
        $this->_counter = $invoices["counter"];

        $this->_comments_private = $invoices["comments_private"];
        $this->_r1 = $invoices["r1"];
        $this->_r2 = $invoices["r2"];
        $this->_r3 = $invoices["r3"];
        $this->_fc = $invoices["fc"];
        $this->_date_update = $invoices["date_update"];
        $this->_days = $invoices["days"];
        $this->_ce = $invoices["ce"];
        $this->_code = $invoices["code"];
        $this->_type = $invoices["type"];
        $this->_status = $invoices["status"];
        $this->setAdvance(balance_total_pay_by_invoice($this->getId()));
        $this->setLines($invoices["id"]);
//      $this->setTotals();
//      invoice_lines_sum_lines_by_tax($id, $tax['value']) - invoice_lines_sum_lines_discounts_by_tax($id, $tax['value'])
//        $this->setExport();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function export($format, $version = 1) {
        switch ($format) {
            case 'json':
                return $this->exportJson($version);
                break;
            case 'xml':
                return $this->exportXML($version);
                break;
            case 'peppol':
                return $this->exportPeppol($version);
                break;

            default:
                break;
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    function exportJson($version = 1) {

        // https://stackoverflow.com/questions/42981409/php7-1-json-encode-float-issue
        // Para el problema en los float    
        // Finalmente lo mejor es preguntar si es numerico en lugar de Float
        // Asi se resuelve el problema que da, al mostar solo 120 en lugar de 120.00
        //


        switch ($version) {
            case 1:
                return json_encode($this->_export);
                break;
            default:
                return json_encode($this->_export);
                break;
        }
    }

    function setExport() {
        global $config_factux;

        $this->_export['factux']['version'] = $config_factux['version'];
        $this->_export['factux']['url'] = $config_factux['url'];
        $this->_export['factux']['date'] = date("Y-m-d");
        $this->_export['factux']['time'] = date("H:i:s");
        $this->_export['factux']['network'] = array();
        $this->_export['factux']["network"]['doc'] = 'invoices';
        $this->_export['factux']["network"]['id'] = $this->_sender->getTva() . "INV" . $this->getId();
        $this->_export['factux']["network"]['sender'] = $this->_sender->getTva();
        $this->_export['factux']["network"]['reciver'] = $this->_client->getTva();
        $this->_export['factux']["network"]['cloud'] = false;
//        $this->_export['factux']['email'] = $config_factux['email'];

        $this->_export['document']['controller'] = 'invoices';
        $this->_export['document']['id'] = (int) $this->_id;
        $this->_export['document']['office_id'] = (int) $this->_office_id;
        $this->_export['document']['budget_id'] = ($this->getBudget_id()) ? (int) $this->getBudget_id() : null;
        $this->_export['document']['credit_note_id'] = ($this->getCredit_note_id()) ? (int) $this->getCredit_note_id() : null;
//        $this->_export['document']['client_id'] = $this->getClient_id();
        $this->_export['document']['title'] = $this->_title;
        $this->_export['document']['seller_id'] = ($this->getSeller_id()) ? (int) $this->getSeller_id() : null;
        $this->_export['document']['date'] = $this->getDate();
//        $this->_export['document']['date_registre'] = $this->getDate_registre();
        $this->_export['document']['date_expiration'] = $this->getDate_expiration();
        $this->_export['document']['total'] = ($this->getTotal()) ? (float) ($this->getTotal()) : null;
        $this->_export['document']['tax'] = ($this->getTax()) ? (float) $this->getTax() : null;
        $this->_export['document']['advance'] = ($this->getAdvance()) ? (float) $this->getAdvance() : null;
//      $this->_export['document']['balance'] = ($this->getBalance())?  (int)$this->getBalance()        : null;
        $this->_export['document']['comments'] = ($this->getComments()) ? $this->getComments() : null;
        $this->_export['document']['r1'] = ($this->getR1()) ? $this->getR1() : null;
        $this->_export['document']['r2'] = ($this->getR2()) ? $this->getR2() : null;
        $this->_export['document']['r3'] = ($this->getR3()) ? $this->getR3() : null;
//        $this->_export['document']['fc'] = $this->getFc();
//        $this->_export['document']['date_update'] = $this->getDate_update();
//        $this->_export['document']['days'] = $this->getDays();
        $this->_export['document']['ce'] = ($this->getCe()) ? $this->getCe() : null;
        $this->_export['document']['code'] = $this->getCode();
        $this->_export['document']['type'] = ($this->getType()) ? $this->getType() : null;
        $this->_export['document']['status'] = ($this->getStatus()) ? (int) $this->getStatus() : null;
//        $this->_export['document']['status_description'] = invoice_status_by_status($this->getStatus());
//
        $this->_export['reciver']['client_id'] = (int) $this->_client->getId();
//        $this->_export['reciver']['owner_id'] = (int) $this->_client->getOwner_id();
//        $this->_export['reciver']['type'] = $this->_client->getType();
        $this->_export['reciver']['title'] = ($this->_client->getTitle()) ? $this->_client->getTitle() : null;
        $this->_export['reciver']['name'] = $this->_client->getName();
        $this->_export['reciver']['lastname'] = ($this->_client->getLastname()) ? $this->_client->getLastname() : null;
//        $this->_export['reciver']['birthdate'] = $this->_client->getBirthdate();
        $this->_export['reciver']['vat'] = ($this->_client->getTva()) ? $this->_client->getTva() : null;
//        $this->_export['reciver']['billing_method'] = $this->_client->getBilling_method();
//        $this->_export['reciver']['discounts'] = $this->_client->getDiscounts();
//        $this->_export['reciver']['code'] = $this->_client->getCode();
        $this->_export['reciver']['language'] = ($this->_client->getLanguage()) ? $this->_client->getLanguage() : null;
        //
        $ba = ($this->_addresses_billing);
        $this->_export['reciver']['addresses']['Billing']['address'] = $ba->getAddress();
        $this->_export['reciver']['addresses']['Billing']['number'] = $ba->getNumber();
        $this->_export['reciver']['addresses']['Billing']['postcode'] = $ba->getPostcode();
        $this->_export['reciver']['addresses']['Billing']['neighborhood'] = $ba->getBarrio();
        $this->_export['reciver']['addresses']['Billing']['sector'] = $ba->getSector();
        $this->_export['reciver']['addresses']['Billing']['ref'] = $ba->getRef();
        $this->_export['reciver']['addresses']['Billing']['city'] = $ba->getCity();
        $this->_export['reciver']['addresses']['Billing']['province'] = $ba->getProvince();
        $this->_export['reciver']['addresses']['Billing']['region'] = $ba->getRegion(); // no puede ser null
        $this->_export['reciver']['addresses']['Billing']['country'] = $ba->getCountry();
//        $this->_export['reciver']['addresses']['Billing']['country'] = countries_country_by_country_code($ba->getCountry());
        //
        $da = ($this->_addresses_delivery);
        $this->_export['reciver']['addresses']['Delivery']['address'] = $da->getAddress();
        $this->_export['reciver']['addresses']['Delivery']['number'] = $da->getNumber();
        $this->_export['reciver']['addresses']['Delivery']['postcode'] = $da->getPostcode();
        $this->_export['reciver']['addresses']['Delivery']['neighborhood'] = $da->getBarrio();
        $this->_export['reciver']['addresses']['Delivery']['sector'] = $da->getSector();
        $this->_export['reciver']['addresses']['Delivery']['ref'] = $da->getRef();
        $this->_export['reciver']['addresses']['Delivery']['city'] = $da->getCity();
        $this->_export['reciver']['addresses']['Delivery']['province'] = $da->getProvince();
        $this->_export['reciver']['addresses']['Delivery']['region'] = $da->getRegion(); // No puede ser null
        $this->_export['reciver']['addresses']['Delivery']['country'] = $da->getCountry();

//        $this->_export['reciver']['addresses']['Delivery']['country'] = countries_country_by_country_code($da->getCountry());
        //
        // El contacto que sea como gerente 
        // lista de todos los contactos con cargos de Manager
        // los manager son los gerentes de la empresa
        //employees_list_by_company_owner_ref($this->getId(), 'Manager');
//        $i = 0;
//        foreach (employees_list_by_company_cargo($this->getId(), 'Manager') as $key => $manager) {
//            $this->_export['reciver']['contact'][$i]['title'] = contacts_field_id('title', $manager['contact_id']);
//            $this->_export['reciver']['contact'][$i]['name'] = contacts_field_id('name', $manager['contact_id']);
//            $this->_export['reciver']['contact'][$i]['lastname'] = contacts_field_id('lastname', $manager['contact_id']);
//            $i++;
//        }
        //
        //
//        $this->_export['sender']['id'] = $this->_sender->getId();
//        $this->_export['sender']['type'] = $this->_sender->getType();
//        $this->_export['sender']['title'] = $this->_sender->getTitle(); // esto es la empresa, tonces null
        $this->_export['sender']['name'] = $this->_sender->getName();
//        $this->_export['sender']['lastname'] = $this->_sender->getLastname();
//        $this->_export['sender']['birthdate'] = $this->_sender->getBirthdate();
        $this->_export['sender']['vat'] = $this->_sender->getTva();
//        $this->_export['sender']['billing_method'] = $this->_sender->getBilling_method();
//        $this->_export['sender']['discounts'] = $this->_sender->getDiscounts();
//        $this->_export['sender']['code'] = $this->_sender->getCode();
        $this->_export['sender']['language'] = ($this->_sender->getLanguage()) ? $this->_sender->getLanguage() : null;

        $sender_ba = ($this->_sender->getAddresses('Billing'));

        //vardump($sender_ba);

        $this->_export['sender']['addresses']['Billing']['address'] = $sender_ba->getAddress() ?? null;
        $this->_export['sender']['addresses']['Billing']['number'] = $sender_ba->getNumber();
        $this->_export['sender']['addresses']['Billing']['postcode'] = $sender_ba->getPostcode();
        $this->_export['sender']['addresses']['Billing']['neighborhood'] = $sender_ba->getBarrio();
        $this->_export['sender']['addresses']['Billing']['sector'] = $sender_ba->getSector();
        $this->_export['sender']['addresses']['Billing']['ref'] = $sender_ba->getRef();
        $this->_export['sender']['addresses']['Billing']['city'] = $sender_ba->getCity();
        $this->_export['sender']['addresses']['Billing']['province'] = $sender_ba->getProvince();
        $this->_export['sender']['addresses']['Billing']['region'] = $sender_ba->getRegion(); // no puede ser null
        $this->_export['sender']['addresses']['Billing']['country'] = $sender_ba->getCountry();
//        $this->_export['sender']['addresses']['Billing']['country'] = countries_country_by_country_code($sender_ba->getCountry());
        //
        // SENDER BANK
        $bank_sender = banks_get_account_for_invoices($this->_sender->getId());
        //
        $this->_export['sender']['bank']['name'] = $bank_sender['bank']; // obligatorios
        $this->_export['sender']['bank']['account_number'] = $bank_sender['account_number']; // obligatorios
        $this->_export['sender']['bank']['bic'] = $bank_sender['bic']; // obligatorios
        $this->_export['sender']['bank']['iban'] = $bank_sender['iban']; // obligatorios
        //}
        //
        foreach (directory_names_list() as $key => $dir_value) {
            $this->_export['sender']['directory'][$dir_value[1]] = $this->_sender->_directory[$dir_value[1]];
        }


        $i = 1;
        foreach ($this->_lines as $key => $line) {
            $this->_export['lines'][$i]['code'] = $line['code'];
            $this->_export['lines'][$i]['quantity'] = (int) $line['quantity'];
            $this->_export['lines'][$i]['description'] = $line['description'];
            $this->_export['lines'][$i]['price'] = (float) $line['price'];
            $this->_export['lines'][$i]['discounts'] = (int) $line['discounts'];
            $this->_export['lines'][$i]['discounts_mode'] = $line['discounts_mode'];
            $this->_export['lines'][$i]['tax'] = (int) $line['tax'];
            $this->_export['lines'][$i]['subtotal'] = (float) $line['subtotal'];
            $this->_export['lines'][$i]['totaldiscounts'] = (float) $line['totaldiscounts'];
            $this->_export['lines'][$i]['totaltax'] = (float) $line['totaltax'];
            $this->_export['lines'][$i]['total'] = (float) ( $line['subtotal'] + $line['totaltax']);
            $i++;
        }


        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

        foreach ($tax_by_country as $key => $tax_list) {
            $this->setTotals($tax_list['value'], 'items', invoice_lines_total_items_by_tax($this->getId(), $tax_list['tax']));
            $this->setTotals($tax_list['value'], 'total', invoice_lines_sum_lines_by_tax($this->getId(), $tax_list['tax']));
            $this->setTotals($tax_list['value'], 'discounts', invoice_lines_sum_lines_by_tax($this->getId(), $tax_list['tax']) - invoice_lines_sum_lines_discounts_by_tax($this->getId(), $tax_list['tax']));
            $this->setTotals($tax_list['value'], 'taxable_base', invoice_lines_sum_lines_discounts_by_tax($this->getId(), $tax_list['tax']));
            $this->setTotals($tax_list['value'], '%vat', (int) $tax_list['tax']);
            $this->setTotals($tax_list['value'], 'total_tva', invoice_lines_total_by_tax($this->getId(), $tax_list['tax']));
        }
    }

    //
    function setImportErrors($error) {
        array_push($this->_import_errors, $error);
    }

    // cojo el json de una factura y la importo
    function importFromJson($json) {

        $invoice = json_decode($json, true);

        // verifica que sea la version 1
        if ($invoice['factux']['version'] !== 1) {
            array_push($this->_import_errors, 'factux > version: must be 1');
        }
        // Tipo de documento
//        vardump($invoice['document']['controller']);
        if ($invoice['document']['controller'] !== 'invoices') {
            array_push($this->_import_errors, 'document > controller: must be string "invoices"');
        }
        // Tipo de documento
        //var_dump($invoice['document']['id']);

        if (!is_id($invoice['document']['id'])) {
            array_push($this->_import_errors, 'document > id: must be id format');
        }
        // puede ser null o id
        if (!is_id($invoice['document']['budget_id']) && $invoice['document']['budget_id'] != null) {
            array_push($this->_import_errors, 'document > budget_id: must be null or id format');
        }
        // puede ser null o id
        if (!is_id($invoice['document']['credit_note_id']) && $invoice['document']['credit_note_id'] != null) {
            array_push($this->_import_errors, 'document > credit_note_id: must be null or id format');
        }
        // puede ser null o id
//        if (!is_id($invoice['document']['client_id'])) {
//            array_push($this->_import_errors, 'client_id: must be id format');
//        }
        // puede ser '' o string
        if (!is_string($invoice['document']['title'])) {
            array_push($this->_import_errors, 'document > title: must be a string');
        }
        // puede ser '' o string
        if (!is_id($invoice['document']['seller_id']) && $invoice['document']['seller_id'] !== null) {
            array_push($this->_import_errors, 'document > seller_id: must be id format or null');
        }
        if (!is_date($invoice['document']['date'])) {
            array_push($this->_import_errors, 'document > date: must be date');
        }
        if (!is_date($invoice['document']['date_expiration'])) {
            array_push($this->_import_errors, 'document > date_expiration: must be a date');
        }
        if (!is_numeric($invoice['document']['total']) && $invoice['document']['total'] !== null) {
            array_push($this->_import_errors, 'document > total: must be a number or null');
        }
        if (!is_numeric($invoice['document']['tax']) && $invoice['document']['tax'] !== null) {
            array_push($this->_import_errors, 'document > tax: must be a number or null');
        }
        if (!is_numeric($invoice['document']['advance']) && $invoice['document']['advance'] !== null) {
            array_push($this->_import_errors, 'document > advance: must be a number or null');
        }
        if (isset($invoice['document']['balance']) && (!is_numeric($invoice['document']['balance']) && $invoice['document']['balance'] !== null)) {
            array_push($this->_import_errors, 'document > balance: must be a number or null');
        }
        if (!is_string($invoice['document']['comments']) && $invoice['document']['comments'] !== null) {
            array_push($this->_import_errors, 'document > comments: must be string or null');
        }
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        // Tambien la fecha debe ser superior la la fecha de expiracion de la facura 
        if (!is_date($invoice['document']['r1']) && $invoice['document']['r1'] !== null) {
            array_push($this->_import_errors, 'document > r1: must be a date or null');
            //
            if ($invoice['document']['r1'] <= $invoice['document']['date_expiration']) {
                array_push($this->_import_errors, 'document > r1: must be a date later than the expiration date');
            }
            //
        }
        // r2
        if ($invoice['document']['r1'] !== null) {
            if ($invoice['document']['r2'] <= $invoice['document']['r1']) {
                array_push($this->_import_errors, 'document > r2: must be a date later than the r1');
            }
        }
        if ($invoice['document']['r1'] == null) {
            if ($invoice['document']['r2'] !== null) {
                array_push($this->_import_errors, 'document > r2: If r2 exists, r1 must also exist');
            }
        }



        // r2 debe ser igual o superior a r1
        // r2 debe ser igual o superior a r1
        // r2 debe ser igual o superior a r1
        // r2 debe ser igual o superior a r1
        if (!is_date($invoice['document']['r2']) && $invoice['document']['r2'] !== null) {
            array_push($this->_import_errors, 'document > r2: must be a date or null');
        }
        // r3 debe ser igual o superior a r2
        // r3 debe ser igual o superior a r2
        // r3 debe ser igual o superior a r2
        // r3 debe ser igual o superior a r2
        if (!is_date($invoice['document']['r3']) && $invoice['document']['r3'] !== null) {
            array_push($this->_import_errors, 'document > r3: must be a date or null');
        }

        if (!is_string($invoice['document']['ce']) && $invoice['document']['ce'] !== null) {
            array_push($this->_import_errors, 'document > ce: must be a string or null');
        }
        // Debe empezar por el tva del sender
        // Debe empezar por el tva del sender
        // Debe empezar por el tva del sender
        // Debe empezar por el tva del sender
        // Debe empezar por el tva del sender
//        if (!is_string($invoice['document']['code']) && !str_starts_with($invoice['document']['code'], $invoice['sender']['vat'])) {
        if (!is_string($invoice['document']['code'])) {
            array_push($this->_import_errors, 'document > code: must be a string');
        }

        switch ($invoice['document']['type']) {
            case "M":
            case "I":
            case null:
                break;
            default:
                array_push($this->_import_errors, 'document > type: must be I, M or null');
                break;
        }

//        if ($invoice['document']['type'] != 'I' && $invoice['document']['type'] != 'M' && $invoice['document']['type'] != null) {
//            array_push($this->_import_errors, 'document > type: must be I, M or null');
//        }
        if (!in_array($invoice['document']['status'], invoice_status_code_list())) {
            array_push($this->_import_errors, 'document > status: must be a status invoice code');
        }
        //----------------------------------------------------------------------
        // RECIVER
        // RECIVER
        // RECIVER
        if (!is_id($invoice['reciver']['client_id'])) {
            array_push($this->_import_errors, 'reciver > client_id: must be id format');
        }
        // El reciver y sender no pueden ser el mismo
        if ($invoice['reciver']['vat'] == $invoice['sender']['vat']) {
            array_push($this->_import_errors, 'reciver > vat: The one who receives cannot be the same one who sends');
        }
        // Debe ser null o parte de los titulos que existen
        // 
        if (!in_array($invoice['reciver']['title'], contacts_titles_list_title()) && $invoice['reciver']['title'] !== null) {
            array_push($this->_import_errors, 'reciver > title: must be a contacts title code or null');
        }
        if (!contacts_is_name($invoice['reciver']['name'])) {
            array_push($this->_import_errors, 'reciver > name: must be a string and with a maximum of 50 characters including spaces');
        }
        if (!contacts_is_lastname($invoice['reciver']['lastname']) && $invoice['reciver']['lastname'] !== null) {
            array_push($this->_import_errors, 'reciver > lastname: must be a string and with a maximum of 50 characters including spaces');
        }
        // en la versio 1
        // solo los que tienen TVA
        //
        if (!is_string($invoice['reciver']['vat'])) {
            array_push($this->_import_errors, 'reciver > vat: must be string or null');
        }
        if (!in_array($invoice['reciver']['language'], _languages_list_languages()) && $invoice['reciver']['language'] !== null) {
            array_push($this->_import_errors, 'reciver > language: must be language code or null');
        }
        // Direccion de facturacion 
        // Direccion de facturacion 
        // Direccion de facturacion 
        // Direccion de facturacion 
        if (!is_string($invoice['reciver']['addresses']['Billing']['address'])) {
            array_push($this->_import_errors, 'reciver > Billing addresses: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Billing']['number'])) {
            array_push($this->_import_errors, 'reciver > Billing addresses number: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Billing']['postcode'])) {
            array_push($this->_import_errors, 'reciver > Billing addresses postcode: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Billing']['city'])) {
            array_push($this->_import_errors, 'reciver > Billing addresses city: must be string');
        }
        if (!in_array($invoice['reciver']['addresses']['Billing']['country'], countries_list_languages())) {
            array_push($this->_import_errors, 'reciver > Billing addresses country: must be contry code');
        }
        //
        //
        // Direccion de entrega
        // Direccion de entrega
        // Direccion de entrega
        // Direccion de entrega
        if (!is_string($invoice['reciver']['addresses']['Delivery']['address'])) {
            array_push($this->_import_errors, 'reciver > Delivery addresses: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Delivery']['number'])) {
            array_push($this->_import_errors, 'reciver > Delivery addresses number: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Delivery']['postcode'])) {
            array_push($this->_import_errors, 'reciver > Delivery addresses postcode: must be string');
        }
        if (!is_string($invoice['reciver']['addresses']['Delivery']['city'])) {
            array_push($this->_import_errors, 'reciver > Delivery addresses city: must be string');
        }
        if (!in_array($invoice['reciver']['addresses']['Delivery']['country'], countries_list_languages())) {
            array_push($this->_import_errors, 'reciver > Delivery addresses country: must be contry code');
        }

        //----------------------------------------------------------------------
        // SENDER
        // SENDER
        // SENDER
        if (!contacts_is_name($invoice['sender']['name'])) {
            array_push($this->_import_errors, 'sender > name: must be a string and with a maximum of 50 characters including spaces');
        }

        if (!is_string($invoice['sender']['vat'])) {
            array_push($this->_import_errors, 'Sender > vat: must be string');
        }
        if (!in_array($invoice['sender']['language'], _languages_list_languages()) && $invoice['sender']['language'] !== null) {
            array_push($this->_import_errors, 'Sender > language: must be language code or null');
        }
        // Direccion de facturacion 
        // Direccion de facturacion 
        // Direccion de facturacion 

        if (!is_string($invoice['sender']['addresses']['Billing']['address'])) {
            array_push($this->_import_errors, 'Sender > Billing addresses: must be string');
        }
        if (!is_string($invoice['sender']['addresses']['Billing']['number'])) {
            array_push($this->_import_errors, 'Sender > Billing addresses number: must be string');
        }
        if (!is_string($invoice['sender']['addresses']['Billing']['postcode'])) {
            array_push($this->_import_errors, 'Sender > Billing addresses postcode: must be string');
        }
        if (!is_string($invoice['sender']['addresses']['Billing']['city'])) {
            array_push($this->_import_errors, 'Sender > Billing addresses city: must be string');
        }
        if (!in_array($invoice['sender']['addresses']['Billing']['country'], countries_list_languages())) {
            array_push($this->_import_errors, 'Sender > Billing addresses country: must be contry code');
        }


        // BANK name
        if (!is_string($invoice['sender']['bank']['name'])) {
            array_push($this->_import_errors, 'Sender > Bank name: must be string');
        }
        // account_number
        if (!is_string($invoice['sender']['bank']['account_number'])) {
            array_push($this->_import_errors, 'Sender > Bank Account number: must be string');
        }
        // bic
        if (!is_string($invoice['sender']['bank']['bic'])) {
            array_push($this->_import_errors, 'Sender > Bank BIC: must be string');
        }
        // iban
        if (!is_string($invoice['sender']['bank']['iban'])) {
            array_push($this->_import_errors, 'Sender > Bank IBAN: must be string');
        }
        //DIRECTORY
        foreach (directory_names_list_names() as $directory_item) {


            $sender_directory_val = ($invoice['sender']['directory'][$directory_item]);

            if ($sender_directory_val) {
                if (!directory_is_format_ok($directory_item, $sender_directory_val)) {
                    array_push($this->_import_errors, "Sender > $directory_item " . $sender_directory_val . " format error");
                }
            }
        }

        // LINEAS DE LA FACTURA
        // LINEAS DE LA FACTURA
        // LINEAS DE LA FACTURA
        // LINEAS DE LA FACTURA
        $i = 1;
        foreach ($invoice['lines'] as $key => $line) {
            $this->_export['lines'][$i]['code'] = $line['code']; // string | null
            $this->_export['lines'][$i]['quantity'] = (int) $line['quantity']; // int
            $this->_export['lines'][$i]['description'] = $line['description']; // string | null
            $this->_export['lines'][$i]['price'] = (float) $line['price']; // 0 | > 0
            $this->_export['lines'][$i]['discounts'] = (int) $line['discounts'];
            $this->_export['lines'][$i]['discounts_mode'] = $line['discounts_mode'];
            $this->_export['lines'][$i]['tax'] = (int) $line['tax'];
            $this->_export['lines'][$i]['subtotal'] = (float) $line['subtotal'];
            $this->_export['lines'][$i]['totaldiscounts'] = (float) $line['totaldiscounts'];
            $this->_export['lines'][$i]['totaltax'] = (float) $line['totaltax'];
            $this->_export['lines'][$i]['total'] = (float) ( $line['subtotal'] + $line['totaltax']);
            $i++;
        }



        // si hay error te mando lo errores, sino te regreso el json
        // return ($this->_import_errors) ? $this->_import_errors : $json;
        // importo contacto 
        // inporto factura 
//        
//            Tva esta en mis contactos?
//        Si
//            Factura esta e mi sistema
//                Si
//                    Entonces factura ya registrada xxx
//                No
//                    Registrar la factura ----
//        No
//            Factura esta en mi sistema
//                No
//                    Registrar contacto ---
//                    Registrar factura ---
//                si
//                    Hay un problema !!!
//        
//    
//        

        return 0;
    }

    function importFromJsonNewContact($json) {

        $data = json_decode($json, true);

        $res = array();

        $sender = ($data['_sender']);
        $lines = ($data['_lines']);
        $company = ($data['_sender']['_name']);
        $_addresses_billing = ($data['_addresses_billing']);
        $_addresses_delivery = ($data['_addresses_delivery']);
        $banks = ($data['_sender']['_banks']);
        $directory = ($data['_sender']['_directory']);

        $company = new Company();
        //$company->setContact(2475);

        $last_contact_id = $company->addNew($owner_id, $title, $name, $lastname);

        // vardump($last_contact_id);

        if (!$this->importCheckDocumentIsOk('documento')) {
            $this->setImportErrors('Documento error');
        }

        if (!$this->importCheckFactuxExportVersionIsOk('1')) {
            $this->setImportErrors('Version de exportacion de factux incompatible');
        }

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Existe sender?
        // si
        //      actualizo los datos (pregunto)
        // no     
        ////////////////////////////////////////////////////////////////////////
        // Add : 
        // Company
        // addresses company
        // directory company
        // banks company
        // Contact de company
        // 
        // agrego la factura como gasto 
        // agrego las lineas 
        // 
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //$contact = new Contacts();
        //$contact->setContact($this->_sender->getId());
//        $company_code = magia_uniqid();
//        contacts_add(
//                //$owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
//                1022,
//                1,
//                null,
//                magia_uniqid() . $this->_sender->getName(),
//                null,
//                '1901-01-01',
//                "",
//                $company_code,
//                1,
//                1
//        );
        ////////////////////////////////////////////////////////////////////////
        $last_company_id = contacts_field_code('id', $company_code);
        ////////////////////////////////////////////////////////////////////////
        contacts_update_owner_id($last_company_id, $last_company_id);
        ////////////////////////////////////////////////////////////////////////
        // addresess
        // 
        // 
        // vardump($_addresses_delivery);        


        foreach (addresses_name() as $addresse_name) {
            addresses_add(
                    $last_company_id,
                    $addresse_name,
                    $_addresses_delivery['_address'],
                    $_addresses_delivery['_number'],
                    $_addresses_delivery['_postcode'],
                    $_addresses_delivery['_barrio'],
                    $_addresses_delivery['_sector'],
                    $_addresses_delivery['_ref'],
                    $_addresses_delivery['_city'],
                    $_addresses_delivery['_province'],
                    $_addresses_delivery['_region'],
                    $_addresses_delivery['_country'],
                    magia_uniqid(),
                    1
            );
        }
        ////////////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $dir_value) {


            $directory_code = magia_uniqid();

            directory_add(
                    $last_company_id,
                    null,
                    $dir_value[1],
                    $directory[$dir_value[1]],
                    $directory_code,
                    1,
                    1
            );
        }
        ////////////////////////////////////////////////////////////////////////
        //Bancos
        //banks_add($contact_id, $bank, $account_number, $bic, $iban, $code, $status);
        //vardump($banks);

        foreach ($banks as $key => $bank) {
            banks_add(
                    $last_company_id,
                    $bank['_bank'],
                    $bank['_account_number'],
                    $bank['_bic'],
                    $bank['_iban'],
                    magia_uniqid(),
                    1
            );
        }


        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        vardump($contact);
        vardump($contact->getTitle());

        $contact_code = magia_uniqid();

        contacts_add(
                $last_company_id,
                0,
                $contact->getTitle(),
                $contact->getName(),
                $contact->getLastname(),
                '1901-01-01',
                null,
                $contact_code,
                1,
                1
        );
        ////////////////////////////////////////////////////////////////////////
        $last_contact_id = contacts_field_code('id', $contact_code);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $dir_value) {

            vardump($contact->_directory[$dir_value[1]]);

            if ($contact->_directory[$dir_value[1]]) {
                directory_add(
                        $last_contact_id,
                        null,
                        $dir_value[1],
                        $contact->_directory[$dir_value[1]],
                        //$contact_directory[$dir_value[1]],
                        magia_uniqid(),
                        1,
                        1
                );
            }
        }
        ////////////////////////////////////////////////////////////////////////
        employees_add(
                $last_company_id,
                $last_contact_id,
                null,
                date('Y-m-d'),
                'employee',
                1,
                1
        );
        ////////////////////////////////////////////////////////////////////////
        //Agrego la expense
        $expense_code = magia_uniqid();
        expenses_add_by_client_id($last_company_id, $expense_code, 10);
        ////////////////////////////////////////////////////////////////////////
        // Busco cual se agrego 
        $last_expense_id = expenses_field_code('id', $expense_code);
        ////////////////////////////////////////////////////////////////////////

        foreach ($lines as $key => $line) {
            expense_lines_add(
                    $last_expense_id,
                    $line['code'],
                    $line['quantity'],
                    $line['description'],
                    $line['price'],
                    $line['discounts'],
                    $line['discounts_mode'],
                    $line['tax'],
                    1,
                    10
            );
        }


        expenses_update_total_tax(
                $last_expense_id,
                expense_lines_totalHTVA($last_expense_id),
                expense_lines_totalTVA($last_expense_id)
        );

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////


        if ($this->_import_errors) {
            return $this->_import_errors;
        } else {
            return $last_expense_id;
        }
    }

    function importFromJsonContactExist($json) {

        $data = json_decode($json, true);

        $res = array();

        $lines = ($data['lines']);

        $company = ($data['sender']['company']);

        $tva = $this->importExistCompany($sender['company']['tva']);

        vardump($tva);

        $last_company_id = contacts_field_tva('id', $tva);

        ////////////////////////////////////////////////////////////////////////
        // 
        // agrego la factura como gasto 
        // agrego las lineas 
        // 
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Agrego la expense
        $expense_code = magia_uniqid();
        expenses_add_by_client_id($last_company_id, $expense_code, 10);
        ////////////////////////////////////////////////////////////////////////
        // Busco cual se agrego 
        $last_expense_id = expenses_field_code('id', $expense_code);
        ////////////////////////////////////////////////////////////////////////

        foreach ($lines as $key => $line) {
            expense_lines_add(
                    $last_expense_id,
                    $line['code'],
                    $line['quantity'],
                    $line['description'],
                    $line['price'],
                    $line['discounts'],
                    $line['discounts_mode'],
                    $line['tax'],
                    1,
                    10
            );
        }


        expenses_update_total_tax(
                $last_expense_id,
                expense_lines_totalHTVA($last_expense_id),
                expense_lines_totalTVA($last_expense_id)
        );

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////






        if ($this->_import_errors) {
            return $this->_import_errors;
        } else {
            return $last_expense_id;
        }
    }

    function importCheckDocumentIsOk($doc) {
        return true;
    }

    function importCheckFactuxExportVersionIsOk($version) {
        return true;
    }

    function importExistCompany($tva) {
        return contacts_field_tva('id', $tva);
    }
}

################################################################################
