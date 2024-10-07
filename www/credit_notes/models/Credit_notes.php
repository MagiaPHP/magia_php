<?php

################################################################################

class Credit_notes {

    public $_id;
    public $_id_formatted;
    public $_office_id;
    public $_office_id_counter_year;
    public $_office_id_counter_year_month;
    public $_office_id_counter_year_trimestre;
    public $_office_id_counter;
    public $_client_id;
    public $_client;
    public $_invoice_id;
    public $_addresses_billing;
    public $_addresses_delivery;
    public $_date;
    public $_date_registre;
    public $_total;
    public $_tax;
    public $_returned;
    public $_comments;
    public $_year;
    public $_code;
    public $_status;
    //
    public $_lines = array();
    //
    public $_can_be_edit;
    public $_why_can_not_be_edit = array();

    function __construct($id) {
        $credit_notes = credit_notes_details($id);

        $this->_id = $credit_notes["id"];
        $this->_office_id = $credit_notes["office_id"];

        $this->_office_id_counter_year = $credit_notes["office_id_counter_year"];
        $this->_office_id_counter_year_month = $credit_notes["office_id_counter_year_month"];
        $this->_office_id_counter_year_trimestre = $credit_notes["office_id_counter_year_trimestre"];
        $this->_office_id_counter = $credit_notes["office_id_counter"];
        $this->_client_id = $credit_notes["client_id"];

        $this->setClient($credit_notes["client_id"]); // Creamos un objeto 
        $this->_invoice_id = $credit_notes["invoice_id"];
        //$this->_addresses_billing = $credit_notes["addresses_billing"];
        //$this->_addresses_delivery = $credit_notes["addresses_delivery"];
        $this->setAddresses_billing($credit_notes["addresses_billing"]);
        $this->setAddresses_delivery($credit_notes["addresses_delivery"]);

        $this->_date = $credit_notes["date"];
        $this->_date_registre = $credit_notes["date_registre"];
        $this->_total = $credit_notes["total"];
        $this->_tax = $credit_notes["tax"];
        $this->_returned = $credit_notes["returned"];
        $this->_comments = $credit_notes["comments"];

        $this->_year = $credit_notes["year"];
        $this->_code = $credit_notes["code"];
        $this->_status = $credit_notes["status"];
        $this->setId_formatted();

        // saco la fecha segun el $id de la factura
//        $date = credit_notes_field_id('date_registre', $id);
//        $date = credit_notes_field_id('date_registre', $id);
        //$year = magia_dates_get_year_from_date($this->_date_registre);
        //$counter = credit_notes_counter_by_credit_note_year($id, $year);
        //$this->_counter = $counter;

        $this->setWhyCanNotBeEdit();
        $this->setCanBeEdit();
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    private function getPlaceholders() {

        /**
         * Si se cambia aca, cambiar en config tambien 
         * Si se cambia aca, cambiar en config tambien 
         * Si se cambia aca, cambiar en config tambien 
         * Si se cambia aca, cambiar en config tambien 
         * Si se cambia aca, cambiar en config tambien 
         */
        $placeholders = [
            '{id}' => str_pad($this->_id, 4, '0', STR_PAD_LEFT),
            '{year}' => date('Y', strtotime($this->_date)),
            '{month}' => date('m', strtotime($this->_date)),
            '{day}' => date('d', strtotime($this->_date)),
            '{trimestre}' => ceil(date('m', strtotime($this->_date)) / 3),
            '{office_id}' => $this->_office_id,
            '{office_id_counter}' => str_pad($this->_office_id_counter, 4, '0', STR_PAD_LEFT),
            '{office_id_counter_year}' => str_pad($this->_office_id_counter_year, 4, '0', STR_PAD_LEFT),
            '{office_id_counter_year_month}' => str_pad($this->_office_id_counter_year_month, 4, '0', STR_PAD_LEFT),
            '{office_id_counter_year_trimestre}' => str_pad($this->_office_id_counter_year_trimestre, 4, '0', STR_PAD_LEFT),
            '{client_id}' => $this->_client_id,
            '{invoice_id}' => str_pad($this->_office_id_counter, 4, '0', STR_PAD_LEFT),
            '{seller_id}' => $this->_seller_id ?? 0,
                //'{type}' => $this->_type ?? 0,
                //'{counter}' => str_pad($this->_counter, 4, '0', STR_PAD_LEFT),
        ];

        // Definir los placeholders válidos
        $valid_placeholders = array_keys($placeholders);

        return [$placeholders, $valid_placeholders];
    }

    function getId_formatted() {

        // Obtener los placeholders y los valid placeholders
        list($placeholders, $valid_placeholders) = $this->getPlaceholders();

        // Verificar si el formato proporcionado contiene solo placeholders válidos
        $isValidFormat = false;
        foreach ($valid_placeholders as $placeholder) {
            if (strpos($this->_id_formatted, $placeholder) !== false) {
                $isValidFormat = true;
                break;
            }
        }

        // Si el formato no es válido, usamos un formato por defecto (por ejemplo, solo el ID)
        if (!$isValidFormat) {
            return (string) $this->_id; // Retorna solo el ID si el formato es incorrecto
        }

        // Reemplazamos los placeholders en la plantilla con los valores correspondientes
        $formatted_id = str_replace(array_keys($placeholders), array_values($placeholders), $this->_id_formatted);

        return $formatted_id;
    }

    function getOffice_id() {
        return $this->_office_id;
    }

    function getOffice_id_counter_year() {
        return $this->_office_id_counter_year;
    }

    function getOffice_id_counter_year_month() {
        return $this->_office_id_counter_year_month;
    }

    function getOffice_id_counter_year_trimestre() {
        return $this->_office_id_counter_year_trimestre;
    }

    function getOffice_id_counter() {
        return $this->_office_id_counter;
    }

    function getClient_id() {
        return $this->_client_id;
    }

    function getClient() {
        return $this->_client;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
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

    function getTotal() {
        return $this->_total;
    }

    function getTax() {
        return $this->_tax;
    }

    function getReturned() {
        return $this->_returned;
    }

    function getYear() {
        return $this->_year;
    }

    // Método para obtener el contador formateado
    function getCounter_formated() {

        // Asegúrate de que el contador tenga siempre 3 dígitos, rellenando con ceros a la izquierda si es necesario
        $formattedCounter = str_pad($this->_counter, 4, '0', STR_PAD_LEFT);

        if (IS_MULTI_VAT) {
            return $this->_year . '-' . $formattedCounter;
        } else {
            return $this->_year . '-' . $formattedCounter;
        }
    }

    function getComments() {
        return $this->_comments;
    }

    function getCode() {
        return $this->_code;
    }

    function getStatus() {
        return $this->_status;
    }

    //--------------------------------------------------------------------------
    function getIdFormated() {
        return $this->_id;
    }

    function getStatusFormated() {
        return credit_notes_status_by_status($this->_status);
    }

    function getCanBeEdit() {
        return $this->_can_be_edit;
    }

    function getWhyCanNotBeEdit() {

        return $this->_why_can_not_be_edit;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setId_formatted() {


        // si no hay aun un formato, se pone el id coo formato 

        $format = _options_option('config_credit_notes_id_format') ?? $this->_id;

        $this->_id_formatted = $format;
    }

    function setOffice_id_counter_year($counter) {
        return $this->_office_id_counter_year = $counter;
    }

    function setOffice_id_counter_year_month($counter) {
        return $this->_office_id_counter_year_month = $counter;
    }

    function setOffice_id_counter_year_trimestre($counter) {
        return $this->_office_id_counter_year_trimestre = $counter;
    }

    function setOffice_id_counter($counter) {
        return $this->_office_id_counter = $counter;
    }

    function setClient_id($client_id) {
        $this->_client_id = $client_id;
    }

    function setClient($client_id) {
        $this->_client = new Company();
        $this->_client->setCompany($client_id);
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setAddresses_billing($addresses_billing) {
        //$this->_addresses_billing = $addresses_billing;

        //$array_data = is_json($addresses_billing) ? json_decode($addresses_billing, true) : [];

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

    function setTotal($total) {
        $this->_total = $total;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setReturned($returned) {
        $this->_returned = $returned;
    }

    function setComments($comments) {
        $this->_comments = $comments;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    //--------------------------------------------------------------------------
    function setCanBeEdit() {
        $this->_can_be_edit = ($this->_why_can_not_be_edit) ? false : true;
    }

    function setWhyCanNotBeEdit() {

        if ($this->_invoice_id) {
            array_push($this->_why_can_not_be_edit, "The credit note come from a invoice");
        }


        if ((int) balance_total_total_by_credit_note($this->_id) != 0) {
            array_push($this->_why_can_not_be_edit, "Payments have already been made");
        }

        if ($this->_status != 10) {
            array_push($this->_why_can_not_be_edit, "The status of the document does not allow editing");
        }
    }

    function hola() {
        echo "<p>hola credit note standar</p>";
    }
}

################################################################################
